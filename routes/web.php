<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::get('/users/patrons', 'PatronController@index')->name('users.patrons');
    Route::resource('/users', 'UserController');
    Route::put('/users/{user}', 'UserController@lock')->name('users.lock');
    Route::resource('/pets', 'PetController');
});
