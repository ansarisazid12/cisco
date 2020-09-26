<?php

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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/crud/add/', 'CrudController@addcrud');
Route::resource('/crud','CrudController');
//Route::get('/items/create', 'ItemController@create');
//Route::get('/items/index', 'ItemController@index');
//Route::get('/items/edit', 'ItemController@edit');
