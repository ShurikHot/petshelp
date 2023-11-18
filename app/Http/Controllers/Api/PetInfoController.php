<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetInfoController extends Controller
{
    public function countAll()
    {
        return Pet::query()->get()->count();
    }

    public function countAdopted()
    {
        return Pet::query()->where('adopted', 1)->get()->count();
    }
}
