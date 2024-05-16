<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', 'PetController@index')->name('home');
    Route::get('/pets/{id}', 'PetController@single')->name('single')->where(['id' => '[0-9]+']);
    Route::get('/pets/{species}', 'PetController@show')->name('pets');

    Route::post('/pets/{id}/favorite', 'UserController@addFavorite')->name('addFavorite')->where(['id' => '[0-9]+']);
    Route::post('/pets/{id}/remove', 'UserController@remFavorite')->name('remFavorite')->where(['id' => '[0-9]+']);
    Route::any('/account/{item}', 'UserController@account')->name('account');
});

Route::view('/guardianship', 'front.pages.guardianship', ['cust_title' => ' :: Опікунство'])->name('guardianship');
Route::view('/volunteer', 'front.pages.volunteer', ['cust_title' => ' :: Волонтерство'])->name('volunteer');
Route::view('/about', 'front.pages.about', ['cust_title' => ' :: Про нас'])->name('about');
Route::view('/partners', 'front.pages.partners', ['cust_title' => ' :: Партнери'])->name('partners');
Route::view('/contacts', 'front.pages.contacts', ['cust_title' => ' :: Контакти'])->name('contacts');

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::get('/users/patrons', 'PatronController@index')->name('users.patrons');
    Route::resource('/users', 'UserController');
    Route::get('/users/{user}/lock', 'UserController@lock')->name('users.lock');
    Route::resource('/pets', 'PetController');
    Route::get('/pets/{species}', 'PetController@show')->name('pets.species');
    Route::resource('/sliders', 'SliderController');
});

Route::group(['middleware' => 'guest', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('register', 'UserController@create')->name('register.create');
    Route::post('register', 'UserController@store')->name('register.store');
    Route::get('login', 'UserController@loginForm')->name('login.create');
    Route::post('login', 'UserController@login')->name('login');
});
Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout')->middleware('auth');

/* API-practice */
Route::post('/weather', 'App\Http\Controllers\Api\TestApiController@weatherApi');
Route::any('/spotify/{id}', 'App\Http\Controllers\Api\TestApiController@spotifyApi');
