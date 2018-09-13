<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InsertAccountRequest;
use App\Repositories\AccountRepository;

class AdminController extends Controller
{
    /**
     * Function that redirect to the admin main page "admin.accueil"
     */
    public function index(AccountRepository $accountRepo){
       //Récuprer les comptes existants

        $accounts = $accountRepo->getAll() ;

        return view('admin.accueil',compact('accounts')) ;

    }

    public function addAccount(){
        //


        return view('admin.ajouter_compte') ;

    }

    public function insertAccount(InsertAccountRequest $request,
                                                     AccountRepository $accountRepo)
    {
        $newUser =  $accountRepo->addAccount($request->all()) ;

        return redirect()->route('add.account')->withOk("L'utilisateur ".$newUser->name." a été créé avec succès." ) ;
    }
}
