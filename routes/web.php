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

Route::get('/', 'TestController@test');

// Une route pour le test de la BD
Route::get('/testOracle',"TestController@test");

// La route par default lors de la connexion, affiche le tableau de bord
Route::get('/home', ['uses' => 'MainController@index', 'as' => 'main']);

// Une route GET vers la page de modification
Route::get('/modification','MainController@getVol')->name('modif.get');
// Une route POST vers la page de modification
Route::post('/modification','MainController@postVol')->name('modif.post');
// Une route vers la page d'extraction de la liste des employés
Route::get('/extraction','MainController@getList')->name('list');
// Une route vers la page d'hitorique par employe
Route::get('/historique/employe','MainController@getHistoryEmploye')->name('his.employe');
// Une route vers la page d'hitorique par vol
Route::get('/historique/vol','MainController@getHistoryVol')->name('his.vol');
// Une route vers la page d'accueil de l'admin
Route::get('/admin','AdminController@index')->name('accueil.admin') ;
// Une route vers la page d'ajout d'un compte de l'admin  "page de saisie"  
Route::get('/admin/ajouter_compte','AdminController@addAccount')->name('add.account') ;
// Une route vers le controller qui insère un compte dans le base de donnée
Route::post('/admin/ajouter_compte','AdminController@insertAccount')->name('insert.account') ; 
// Une route vers le controller qui modifie les information d'un compte donnée et retourne vers la page d'accueil
Route::post('/admin/modifier_compte','AdminController@updateAccount')->name('update.account') ; 
