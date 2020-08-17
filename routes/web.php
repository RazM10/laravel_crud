<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'CrudController@test');

Route::get('/crud', 'CrudController@show');

Route::get('/crud/add', 'CrudController@addUser')->name('crud.add'); //name is optional. used for link

Route::post('/crud/add', 'CrudController@saveUser')->name('crud.save');