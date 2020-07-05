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
//route d'affichage des notifications
Route::get('/notifications','AnnonceController@notifications');
//route du suppression d'une notification
Route::get('/notifications/destroy{id}','AnnonceController@destroyNotifiation');
//route du marquage d'une notification comme lu
Route::get('/notifications/MarkAsRead{id}','AnnonceController@MarkAsReadNotifiation');
//route du marquage d'une notification comme non lu
Route::get('/notifications/MarkAsUnread{id}','AnnonceController@MarkAsUnreadNotifiation');
//route pour envoyer un message d'aprés la page d'une annonce
Route::post('/message/store','MessageController@store');
//route d'affichage des messages du user connectée
Route::get('/messages','MessageController@index');
//route d'affichage la discussion avec un user
Route::get('/messages/{id}','MessageController@show');
//route pour envoyer un message dans la discussion
Route::post('/message/storeDescussion','MessageController@storeDiscussion');
//route qui permet d'effacer un message a travers la methode destroy
Route::get('/message/destroy/{id}','MessageController@destroy');
//route du marquage d'une notification de message comme lu
Route::get('/message/MarkAsRead{id}','MessageController@MarkAsReadNotifiation');
//route d'affichage de l'interface d'affichage du formulaire de vérification du mot de passe par la méthode affVerifMotDePasse
Route::get('/user/affVerifMotDePasse','UserController@affVerifMotDePasse');
//route de vérification du mot de passe par la méthode verifMotDePasse
Route::get('/user/verifMotDePasse','UserController@verifMotDePasse');
//route de mise a jour du mot de passe d'un utilisateur a travers la methode updateMotDePasse
Route::put('/user/updateMotDePasse','UserController@updateMotDePasse');
//affichage des données d'un user
Route::get('/user/show/{id}','UserController@show');









