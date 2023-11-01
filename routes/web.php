<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.index');
})->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::get('/users/patrons', 'PatronController@index')->name('users.patrons');
    Route::resource('/users', 'UserController');
    Route::get('/users/{user}/lock', 'UserController@lock')->name('users.lock');
    Route::resource('/pets', 'PetController');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('register', 'App\Http\Controllers\UserController@create')->name('register.create');
    Route::post('register', 'App\Http\Controllers\UserController@store')->name('register.store');
    Route::get('login', 'App\Http\Controllers\UserController@loginForm')->name('login.create');
    Route::post('login', 'App\Http\Controllers\UserController@login')->name('login');
});

Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout')->middleware('auth');
