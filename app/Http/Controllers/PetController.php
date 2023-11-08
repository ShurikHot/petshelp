<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function index()
    {
        $frontPets = Pet::query()->get()->random(8); // в ідеалі популярні тварини
        $randomPet = Pet::query()->get()->random(1);

        return view('front.index', compact('frontPets', 'randomPet'));
    }

    public function show($species)
    {
        switch ($species) {
            case 'all':
                $pets = Pet::query()->paginate(12);
                break;
            case 'dog':
                $pets = Pet::query()->where('species', '=', 'Собака')->paginate(12);
                break;
            case 'cat':
                $pets = Pet::query()->where('species', '=', 'Кіт')->paginate(12);
                break;
            case 'rodent':
                $pets = Pet::query()->where('species', '=', 'Гризун')->paginate(12);
                break;
            case 'bird':
                $pets = Pet::query()->where('species', '=', 'Пташка')->paginate(12);
                break;
            default:
                $pets = Pet::query()->paginate(12);
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
        $related = Pet::query()->where('species', '=', $pet->species)->get()->random(4);
        return view('front.single', compact('pet', 'related', 'is_fav'));
    }
}
