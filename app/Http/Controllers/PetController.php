<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index()
    {
        $frontPets = Pet::query()->get()->where('adopted', '=', '0')->random(8); // в ідеалі популярні тварини
        $randomPet = Pet::query()->get()->where('adopted', '=', '0')->random(1);
        $already = Pet::query()->get()->where('adopted', '=', '1')->count();
        $sliders = Slider::query()->where('is_active', '=', '1')->get();

        return view('front.index', compact('frontPets', 'randomPet', 'already', 'sliders'));
    }

    public function show($species)
    {
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
        return view('front.pets', compact('pets', 'species'));
    }

    public function single($id)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $fav = $user->pets->pluck('id')->toArray();
            $is_fav = in_array($id, $fav);
        } else {
            $is_fav = false;
        }

        $pet = Pet::query()->find($id);
        $related = Pet::query()->where('species', '=', $pet->species)->where('adopted', '=', '0')->get()->random(4);
        return view('front.single', compact('pet', 'related', 'is_fav'));
    }
}
