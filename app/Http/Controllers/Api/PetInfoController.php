<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetInfoController extends Controller
{
    public function countAll()
    {
        $data = Pet::query()->get()->count();
        return response()
            ->json([
                'count_all' => $data,
            ])
            ->setStatusCode(200);
    }

    public function countAdopted()
    {
        $data = Pet::query()->where('adopted', 1)->get()->count();
        return response()
            ->json([
                'count_adopted' => $data,
            ])
            ->setStatusCode(200);
    }
}
