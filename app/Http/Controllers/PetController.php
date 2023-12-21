<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Rating;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class PetController extends Controller
{
    public function index()
    {
        $rating = Rating::ratingTable();

        $petsWithRating = Pet::query()->where('adopted', '=', '0')->whereIn('id', array_keys($rating))->paginate(8);

        if (count($petsWithRating) < 8) {
            try {
                $addedFrontPets = Pet::query()
                    ->get()
                    ->where('adopted', '=', '0')
                    ->whereNotIn('id', array_keys($rating))
                    ->random(8 - count($petsWithRating));
            } catch (InvalidArgumentException $e) {
                $addedFrontPets = Pet::query()
                    ->where('adopted', '=', '0')
                    ->whereNotIn('id', array_keys($rating))
                    ->paginate(8 - count($petsWithRating));
            }
            $frontPets = $petsWithRating->merge($addedFrontPets);
        } else {
            $frontPets = $petsWithRating;
        }

        try {
            $randomPet = Pet::query()->get()->where('adopted', '=', '0')->random(1);
        } catch (InvalidArgumentException $e) {
            $randomPet = Pet::query()->where('adopted', '=', '0')->paginate(1);
        }

        $already = Pet::query()->get()->where('adopted', '=', '1')->count();
        $sliders = Slider::query()->where('is_active', '=', '1')->get();

        return view('front.index', compact('frontPets', 'randomPet', 'already', 'sliders'));
    }

    public function show($species)
    {
        $cust_title = ' :: Пошук друга';
        switch ($species) {
            case 'all':
                $pets = Pet::query()->where('adopted', '=', '0')->paginate(12);
                break;
            case 'dog':
                $pets = Pet::query()->where('species', '=', 'Собака')->where('adopted', '=', '0')->paginate(12);
                break;
            case 'cat':
                $pets = Pet::query()->where('species', '=', 'Кіт')->where('adopted', '=', '0')->paginate(12);
                break;
            case 'rodent':
                $pets = Pet::query()->where('species', '=', 'Гризун')->where('adopted', '=', '0')->paginate(12);
                break;
            case 'bird':
                $pets = Pet::query()->where('species', '=', 'Пташка')->where('adopted', '=', '0')->paginate(12);
                break;
            default:
                $pets = Pet::query()->where('adopted', '=', '0')->paginate(12);
                $species = '';
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
            $related = Pet::query()->where('species', '=', $pet->species)->where('adopted', '=', '0')->get()->random(4);
        } catch (InvalidArgumentException $e) {
            $related = Pet::query()->where('species', '=', $pet->species)->where('adopted', '=', '0')->paginate(4);
        }

        Rating::upRating($id);

        return view('front.single', compact('pet', 'related', 'is_fav', 'cust_title'));
    }
}
