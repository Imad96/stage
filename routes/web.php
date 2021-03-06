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

  Route::get('/', function ()
  {
    if(!Auth::check()){
      return view('login');
    }
    else {
      return redirect()->route('main');
    }
  })->name('login.page');

  // La route par default lors de la connexion, affiche le tableau de bord
  Route::get('/home', ['uses' => 'MainController@index', 'as' => 'main']);

  // Une route GET vers la page de modification qui retourne le formulaire de choix du vol
  Route::get('/modification','MainController@getVolForm')->name('modif.get')->middleware('ModificationMiddleware');
  // Une route POST vers la page de modification qui retourne le formulaire de MAJ d'un vol donné
  Route::post('/modification','MainController@modifVol')->name('modif.vol')->middleware('ModificationMiddleware');
  // Une route POST vers la page de modification pour le maj d'un vol
  Route::post('/modification/update','MainController@updateVol')->name('modif.update')->middleware('ModificationMiddleware');
  // Une route vers la page d'extraction de la liste des employés
  Route::get('/extraction','MainController@getList')->name('list');
  // Une route vers la page d'hitorique par employe
  Route::get('/historique/employe','MainController@getHistoryEmploye')->name('his.employe');
  // Une route POST vers la page d'hisorique d'un employe
  Route::post('/historique/employe','MainController@searchHistory')->name('his.employe.search');
  // Une route vers la page d'hitorique par vol
  Route::get('/historique/vol','MainController@getHistoryVol')->name('his.vol');
  // Une route vers la fonction qui récupère les données d'un vol et les retourne en ajax
  Route::post('/home','MainController@getVolInformation')->name('vol.information') ;
  // Une fonction qui retourne des informations sur les vols ayant le numéro selectionnée dans la page agent/extraction
  Route::post('/extraction','MainController@searchVol')->name('search.vol') ;
  Route::post('/modification/search','MainController@searchVol')->name('search.vol.2')->middleware('ModificationMiddleware');
  // Une fonction qui extrait les liste des employes d'un vol donnée
  Route::post('/extraction/extraire','MainController@extraireVol')->name('vol.extract') ;
  // Une route qui retourne toutes les dates d'un vol donnée
  Route::post('/historique/vol','MainController@dateVol')->name('vol.date') ;
  // Une route qui retourne la liste des employées ayant pris un vol à une date donnée
  Route::post('/historique/vol/date','MainController@listeParDate')->name('liste.date') ;
  // Une route vers une fonction qui fait l'Autocomplete
  Route::get('/historique/employe/autocomplete', 'MainController@autocomplete')->name('auto.fill');


 
  // Une route vers la page d'accueil de l'admin
  Route::get('/admin','AdminController@index')->name('accueil.admin') ;
  // Une route vers la page d'ajout d'un compte de l'admin  "page de saisie"
  Route::get('/admin/ajouter_compte','AdminController@addAccount')->name('add.account') ;
  // Une route vers le controller qui insère un compte dans le base de donnée
  Route::post('/admin/ajouter_compte','AdminController@insertAccount')->name('insert.account') ;
  // Une route vers le controller qui modifie les information d'un compte donnée et retourne vers la page d'accueil
  Route::post('/admin/modifier_compte','AdminController@updateAccount')->name('update.account') ;
  // Une route vers le controller qui modifie le mot de passe d'un compte
  Route::post('/admin/modifier_password','AdminController@updatePassword')->name('update.password') ;
  // Une route vers le controlelr qui supprime le un compte
  Route::delete('/admin/supprimer_compte/{id}','AdminController@deleteAccount')->name('delete.account') ;


  // route to show the login form
  Route::get('/login', array('uses' => 'LoginController@showLogin'));
  // route to logout
  Route::get('/logout', array('uses' => 'LoginController@doLogout', 'as' => 'logout'));
  // route to process the form
  Route::post('/logIn', array('uses' => 'LoginController@doLogin', 'as' => 'logIn'));

  Auth::routes();
