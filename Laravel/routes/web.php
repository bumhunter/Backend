<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'StaticController@index');
Route::get('/about-us', 'StaticController@about');

Route::resource('articles', 'ArticlesController');

Auth::routes();

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('home');
