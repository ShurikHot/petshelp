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
        $cust_title = ' :: Список тварин';
        $pets = Pet::query()->paginate(5);
        return view('admin.pets.index', compact('pets', 'cust_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $cust_title = ' :: Нова тварина';
        return view('admin.pets.create', compact('cust_title'));
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
        switch ($species) {
            case 'dog':
                $pets = Pet::query()->where('species', '=', 'Собака')->paginate(5);
                break;
            case 'cat':
                $pets = Pet::query()->where('species', '=', 'Кіт')->paginate(5);
                break;
            case 'other':
                $pets = Pet::query()->whereNotIn('species', ['Кіт', 'Собака'])->paginate(5);
                break;
            default:
                $pets = Pet::query()->paginate(5);
                $species = '';
        }
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
        $cust_title = ' :: Редагування тварини ' . $pet->name;
        return view('admin.pets.edit', compact('pet', 'cust_title'));
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
