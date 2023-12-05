<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PetResource::collection(Pet::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return PetResource
     */
    public function store(Request $request)
    {
        $request['sterilization'] ? $request['sterilization'] = true : $request['sterilization'] = false;
        $request['vaccination'] ? $request['vaccination'] = true : $request['vaccination'] = false;
        $request['special'] ? $request['special'] = true : $request['special'] = false;
        $request['guardianship'] ? $request['guardianship'] = true : $request['guardianship'] = false;
        $request['adopted'] ? $request['adopted'] = true : $request['adopted'] = false;
        $data = $request->validate([
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
            'phone_number' => 'required|string|size:12', // !!!формат 380987654321
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);
        $pet = Pet::query()->create($data);

        return new PetResource($pet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return PetResource
     */
    public function show(Pet $pet)
    {
//        return new PetResource(Pet::query()->findOrFail($id));
        return new PetResource($pet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PetResource
     */
    public function update(Request $request, Pet $pet)
    {
        $request['sterilization'] ? $request['sterilization'] = true : $request['sterilization'] = false;
        $request['vaccination'] ? $request['vaccination'] = true : $request['vaccination'] = false;
        $request['special'] ? $request['special'] = true : $request['special'] = false;
        $request['guardianship'] ? $request['guardianship'] = true : $request['guardianship'] = false;
        $request['adopted'] ? $request['adopted'] = true : $request['adopted'] = false;
        $data = $request->validate([
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
            'phone_number' => 'required|string|size:12', // !!!формат 380987654321
            'story' => 'nullable|string|max:500',
            'peculiarities' => 'nullable|string|max:255',
            'wishes' => 'nullable|string|max:255',
            'patrons' => 'nullable|string',
            'adopted' => 'boolean',
        ]);

//        $pet = Pet::query()->find($id);
        $pet->update($data);
        return new PetResource($pet);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
//        $pet = Pet::query()->find($id);
        $pet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
