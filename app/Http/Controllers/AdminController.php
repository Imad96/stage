<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InsertAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
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

    public function insertAccount(
        InsertAccountRequest $request,
        AccountRepository $accountRepo)
    {
      $newUser =  $accountRepo->addAccount($request->all()) ; 

        return redirect()->route('add.account')->withOk("L'utilisateur ".$newUser->name." a été créé avec succès." ) ; 
    }

    public function updateAccount(
        UpdateAccountRequest $request,
        AccountRepository $accountRepo){
        
        $userUpdated = $accountRepo->updateAccount($request->all()); 

        return redirect()->route('accueil.admin')->with('update','Le compte de '.$userUpdated->name.' a été modifié avec succes') ; 
    }
}
