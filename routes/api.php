<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['pets' => \App\Http\Controllers\Api\PetController::class]);
Route::get('count/all', [\App\Http\Controllers\Api\PetInfoController::class, 'countAll']);
Route::get('count/adopted', [\App\Http\Controllers\Api\PetInfoController::class, 'countAdopted']);
