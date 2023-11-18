<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;
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
        $cust_title = ' - Список тварин';
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
        $cust_title = ' - Нова тварина';
        return view('admin.pets.create', compact('cust_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request['sterilization'] = isset($request['sterilization']);
        $request['vaccination'] = isset($request['vaccination']);
        $request['special'] = isset($request['special']);
        $request['guardianship'] = isset($request['guardianship']);
        $request['adopted'] = isset($request['adopted']);
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'age_month' => 'required|integer',
            'species' => 'required|in:"Собака", "Кіт", "Гризун", "Пташка", "Інше"',
            'sex' => 'required|in:"Самець","Самиця"',
            'breed' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sterilization' => 'boolean',
            'vaccination' => 'boolean',
            'special' => 'boolean',
            'guardianship' => 'boolean',
            'city' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|size:13', // !!!формат +380987654321
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);

        $data = $request->all();
        $data['photo'] = Pet::uploadPhoto($data);

        Pet::query()->create($data);
        $request->session()->flash('success', 'Тварину додано');

        return redirect()->route('pets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $pet = Pet::query()->find($id);
        $cust_title = ' - Редагування тварини ' . $pet->name;
        return view('admin.pets.edit', compact('pet', 'cust_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request['sterilization'] = isset($request['sterilization']);
        $request['vaccination'] = isset($request['vaccination']);
        $request['special'] = isset($request['special']);
        $request['guardianship'] = isset($request['guardianship']);
        $request['adopted'] = isset($request['adopted']);
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'age_month' => 'required|integer',
            'species' => 'required|in:"Собака", "Кіт", "Гризун", "Пташка", "Інше"',
            'sex' => 'required|in:"Самець","Самиця"',
            'breed' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sterilization' => 'boolean',
            'vaccination' => 'boolean',
            'special' => 'boolean',
            'guardianship' => 'boolean',
            'city' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|size:13', // !!!формат +380987654321
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);

        $data = $request->all();
        $pet = Pet::query()->find($id);
        $data['photo'] = Pet::uploadPhoto($data);

        if ($pet->photo && !str_starts_with($data['base64image'], 'images')) Storage::delete($pet->photo);

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
    public function destroy($id)
    {
        $pet = Pet::query()->find($id);
        if ($pet->photo) Storage::delete($pet->photo);
        Pet::destroy($id);
        return redirect()->route('pets.index')->with('success', 'Тварину видалено');
    }
}
