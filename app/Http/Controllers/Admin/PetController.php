<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $pets = Pet::query()->paginate(1);
        return view('admin.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.pets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'age_month' => 'required|integer',
            'species' => 'required|in:"Собака","Кіт","Інше"',
            'sex' => 'required|in:"Самець","Самка"',
            'breed' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sterilization' => 'boolean',
            'vaccination' => 'boolean',
            'city' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|size:13',
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);
        Pet::query()->create($request->all());
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
        return view('admin.pets.edit', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$request->validate([
            'name' => 'required|string|max:255|min:2',
            'age_month' => 'required|integer',
            'species' => 'required|in:"Собака","Кіт","Інше"',
            'sex' => 'required|in:"Самець","Самка"',
            'breed' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sterilization' => 'boolean',
            'vaccination' => 'boolean',
            'city' => 'required|string|max:255|min:2',
            'phone_number' => 'required|string|size:13',
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);
        Pet::query()->update($request->all());
        $request->session()->flash('success', 'Тварину додано');

        return redirect()->route('pets.index');*/
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
