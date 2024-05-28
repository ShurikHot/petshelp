<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;
use App\Models\Pet;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customTitle = ' :: Список тварин';
        $pets = Pet::query()->paginate(5);
        return view('admin.pets.index', compact('pets', 'customTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $customTitle = ' :: Нова тварина';
        $species = Pet::SPECIES;
        $genders = Pet::GENDERS;
        return view('admin.pets.create', compact('species', 'genders', 'customTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $request->validated();
        Pet::petParams($request);

        $data = $request->all();
        $data['photo'] = Pet::uploadPhoto($data);

        Pet::query()->create($data);
        $request->session()->flash('success', 'Тварину додано');
        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($species)
    {
        $pets = Pet::query();
        switch ($species) {
            case 'dog':
                $pets->where('species', 'dog');
                break;
            case 'cat':
                $pets->where('species', 'cat');
                break;
            case 'other':
                $pets->whereNotIn('species', ['dog', 'cat']);
                break;
            default:
                $species = '';
        }
        $pets = $pets->paginate(5);
        return view('admin.pets.index', compact('pets', 'species'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Pet $pet)
    {
        $customTitle = ' :: Редагування тварини ' . $pet->name;
        $species = Pet::SPECIES;
        $genders = Pet::GENDERS;
        return view('admin.pets.edit', compact('pet', 'species', 'genders', 'customTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreRequest $request, Pet $pet)
    {
        $request->validated();

        $pet->petParams($request);

        $data = $request->all();
        $data['photo'] = Pet::uploadPhoto($data);

        if ($pet->photo && !str_starts_with($data['base64image'], 'images')) {
            Storage::delete($pet->photo);
        }
        $pet->update($data);
        $request->session()->flash('success', 'Інформація оновлена');
//        return redirect()->route('pets.index'); // редирект на першу сторінку
        return redirect()->back(); // залишається на сторінці тварини
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pet $pet)
    {
        if ($pet->photo) {
            Storage::delete($pet->photo);
        }
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Тварину видалено');
    }
}
