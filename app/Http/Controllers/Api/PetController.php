<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Resources\PetResource;
use App\Models\Pet;
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
    public function store(StoreRequest $request)
    {
        $request->validated();

        Pet::boolParams($request);

        $data = $request->all();
        $pet = Pet::query()->create($data);

//        return PetResource::make($pet);
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
        return new PetResource($pet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return PetResource
     */
    public function update(StoreRequest $request, Pet $pet)
    {
        $request->validated();

        Pet::boolParams($request);

        $data = $request->all();

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
        $pet->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
