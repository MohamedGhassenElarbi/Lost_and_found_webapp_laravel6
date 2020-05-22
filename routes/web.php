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
//route du page d'acceuil
Route::get('/', function () {
    return view('welcome');
});
//routes d'authentification
Auth::routes();
//route d'ajout d'une annonce a travers la methode store
Route::post('/annonce/store','AnnonceController@store');
//route d'affichage de l'inteface d'ajout d'une annonce a travers la methode create
Route::get('/annonce/create','AnnonceController@create');
//route d'affichage des annonces(lost/found) a travers la methode index
Route::get('/annoncel','AnnonceController@index');
//route d'affichage des donnés d'une annonce selon son id a travers la methode show
Route::get('/annonce/{annonce}','AnnonceController@show');
//route d'affichage de l'interface de mise a jour d'une annonce a travers la methode edit
Route::get('/annonce/{annonce}/edit','AnnonceController@edit');
//route de mise a jour d'une annonce a travers la methode update
Route::put('/annonce/{annonce}/update','AnnonceController@update');
//route d'effacement d'une annonce a travers la methode destroy
Route::get('/annonce/{annonce}/destroy','AnnonceController@destroy');
//route d'affichage des données des annonces créer par l'utilisateur connecté a travers la methode annoncescreated
Route::get('/annonces','AnnonceController@annoncescreated');
//route d'affichage de l'interface de mise a jour de l'utilisateur a travers la methode edit
Route::get('/user/edit','UserController@edit');
//route de mise a jour d'un utilisateur a travers la methode update
Route::put('/user/{id}/update','UserController@update');
//route d'affichage de l'image d'une annonce
Route::get('annonce_affichage/fetch_image/{id}', 'AnnonceController@fetch_image');
//route de recherche d'une annonce
Route::get('/search', 'AnnonceController@search');
//route d'affichage des gouvernorats travers la methode index
Route::get('/gouvernorat','GouvernoratController@index');











