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
Route::post('/annonce/store','AnnonceController@store');
Route::get('/annonce/create','AnnonceController@create');
Route::get('/annoncel','AnnonceController@index');
Route::get('/annonce/{annonce}','AnnonceController@show');
Route::get('/annonce/{annonce}/edit','AnnonceController@edit');
Route::put('/annonce/{annonce}/update','AnnonceController@update');
Route::get('/annonce/{annonce}/destroy','AnnonceController@destroy');
Route::get('/annonces','AnnonceController@annoncescreated');
Route::get('/user/edit','UserController@edit');
Route::put('/user/{id}/update','UserController@update');









