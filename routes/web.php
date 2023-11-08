<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\PetController@index')->name('home');
Route::get('/pets/{id}', 'App\Http\Controllers\PetController@single')->name('single')->where(['id' => '[0-9]+']);
Route::get('/pets/{species}', 'App\Http\Controllers\PetController@show')->name('pets');

Route::post('/pets/{id}/favorite', 'App\Http\Controllers\UserController@addFavorite')->name('addFavorite')->where(['id' => '[0-9]+']);
Route::post('/pets/{id}/remove', 'App\Http\Controllers\UserController@remFavorite')->name('remFavorite')->where(['id' => '[0-9]+']);
//Route::match(['get', 'put'], '/profile', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::any('/account/{item}', 'App\Http\Controllers\UserController@account')->name('account');

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
