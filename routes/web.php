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
    return view('home');
});

// Une route pour le test de la BD
Route::get('/testOracle',"TestController@test");

// La route par default lors de la connexion, affiche le tableau de bord
Route::get('/home', ['uses' => 'MainController@index', 'as' => 'main']);
