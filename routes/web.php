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

// For add data
Route::get('/crud/add', 'CrudController@addUser')->name('crud.add'); //name is optional. used for link
Route::post('/crud/add', 'CrudController@saveUser')->name('crud.save');

//For update data
Route::get('/crud/edit/{id}', 'CrudController@editCrud')->name('crud.edit');
Route::post('/crud/edit/{id}', 'CrudController@updateCrud')->name('crud.update');

//For Delete Data
Route::get('/crud/delete/{id}', 'CrudController@deleteCrud')->name('crud.delete');

//DropDown form
Route::get('/crud/ddform', 'CrudController@ddForm')->name('crud.ddForm');
Route::get('/crud/ajaxCall/{id}', 'CrudController@ajaxCall')->name('crud.ajaxCall');

//Test ajax
// Route::post('/getmsg','CrudController@index')->name('getmsg');
Route::get('/getmsg','CrudController@index')->name('getmsg');



//ajax
Route::get('/ajax',function() {
    return view('ajax');
});
Route::get('/ajax/cruds', 'CrudController@get_crud_data')->name('data');
Route::get('/ajax/addcrud', 'CrudController@store')->name('crud.store');
Route::get('/ajax/edit/{id}', 'CrudController@ajaxCall')->name('crud.edit');
Route::get('/ajax/updatecrud', 'CrudController@update')->name('crud.update');

Route::get('/company', 'CompanyController@view')->name('company.index');
// Route::get('/companies', 'CompanyController@get_company_data')->name('data');
Route::get('/addcompany', 'CompanyController@view')->name('company.view');
// Route::post('/addcompany', 'CompanyController@Store')->name('company.store');
Route::delete('/addcompany/{id}', 'CompanyController@destroy')->name('company.destroy');
// Route::get('/addcompany/{id}/edit', 'CompanyController@update')->name('company.update');