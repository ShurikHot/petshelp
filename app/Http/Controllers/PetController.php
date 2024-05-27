<?php

namespace App\Http\Controllers;

use App\Jobs\UpRaitingJob;
use App\Models\Pet;
use App\Models\Rating;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;

class PetController extends Controller
{
    public const FILTEREBLE = [
        'sex',
        'sterilization',
        'vaccination',
        'special',
        'guardianship',
    ];

    public function index()
    {
        $rating = Cache::remember('rating', 1800, function () {
            return Rating::ratingTable();
        });

        $petsWithRating = Cache::remember('petsWithRating', 1800, function () use ($rating) {
            return Pet::query()->notAdopted()->whereIn('id', array_keys($rating))->paginate(8);
        });

        $count = count($petsWithRating);

        if ($count < 8) {
            try {
                $addedFrontPets = Pet::query()
                    ->notAdopted()
                    ->get()
                    ->whereNotIn('id', array_keys($rating))
                    ->random(8 - $count);
            } catch (InvalidArgumentException $e) {
                $addedFrontPets = Pet::query()
                    ->notAdopted()
                    ->whereNotIn('id', array_keys($rating))
                    ->paginate(8 - $count);
            }
            $frontPets = $petsWithRating->merge($addedFrontPets);
        } else {
            $frontPets = $petsWithRating;
        }

        try {
            $randomPet = Pet::query()->notAdopted()->get()->random(1);
        } catch (InvalidArgumentException $e) {
            $randomPet = Pet::query()->notAdopted()->paginate(1);
        }

        $already = Cache::remember('already', 86400, function () {
            return Pet::query()->get()->where('adopted', '=', '1')->count();
        });

        $alreadyPlural = Pet::plural(['хвостик', 'хвостика', 'хвостиків'], $already);

        $slidersJson = Cache::get('sliders');
        if ($slidersJson) {
            $slidersArray = json_decode($slidersJson, true);
            $sliders = Slider::hydrate($slidersArray);
        } else {
            $sliders = Slider::query()->where('is_active', 1)->get();
            Cache::put('sliders', $sliders->toJson(), 3600);
        }

        return view('front.index', compact('frontPets', 'randomPet', 'already', 'alreadyPlural', 'sliders'));
    }

    public function show($species)
    {
        $cust_title = ' :: Пошук друга';
        $searchQuery = $_REQUEST['search'] ?? '';
        $filters = self::getFilters();

        if ($searchQuery) {
            $pets = Pet::search($searchQuery)->paginate(12);
        } else {
            $pets = Pet::query();
            if ($filters) {
                foreach ($filters as $key => $value) {
                    $pets->where($key, $value);
                }
            }

            switch ($species) {
                case 'dog':
                    $pets->where('species', '=', 'Собака');
                    break;
                case 'cat':
                    $pets->where('species', '=', 'Кіт');
                    break;
                case 'rodent':
                    $pets->where('species', '=', 'Гризун');
                    break;
                case 'bird':
                    $pets->where('species', '=', 'Пташка');
                    break;
                default:
                    $species = '';
            }
            $pets = $pets->notAdopted()->paginate(12);
        }
        return view('front.pets', compact('pets', 'species', 'cust_title'));
    }

    public function single($id)
    {
        $pet = Pet::query()->find($id);
        $cust_title = ' :: ' . $pet->name;

        if (Auth::user()) {
            $user = Auth::user();
            $fav = $user->pets->pluck('id')->toArray();
            $is_fav = in_array($id, $fav);
        } else {
            $is_fav = false;
        }

        try {
            $related = Pet::query()->where('species', '=', $pet->species)->notAdopted()->get()->random(4);
        } catch (InvalidArgumentException $e) {
            $related = Pet::query()->where('species', '=', $pet->species)->notAdopted()->paginate(4);
        }

        Rating::upRating($id);

        return view('front.single', compact('pet', 'related', 'is_fav', 'cust_title'));
    }

    public static function getFilters()
    {
        return array_intersect_key($_REQUEST, array_flip(self::FILTEREBLE));
    }
}
