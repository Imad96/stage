<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InsertAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Repositories\AccountRepository;

class AdminController extends Controller
{
    /**
     * Function that redirects to the admin main page "admin.accueil"
     */
    public function index(AccountRepository $accountRepo){
       //Récuprer les comptes existants

        $accounts = $accountRepo->getAll() ;

        return view('admin.accueil',compact('accounts')) ;

    }

    /**
     * Function that redirects to the adding User
     */
    public function addAccount(){
        //


        return view('admin.ajouter_compte') ;

    }


    /**
     * Function that inserts a new User
     */
    public function insertAccount(
        InsertAccountRequest $request,
        AccountRepository $accountRepo)
    {
        $newUser =  $accountRepo->addAccount($request->all()) ;

        return redirect()->route('add.account')->withOk("L'utilisateur ".$newUser->name." a été créé avec succès." ) ;
    }


    /**
     * Function that updates 'Name', 'email' and 'type' of an exesting User
     */
    public function updateAccount(
        Request $request,
        AccountRepository $accountRepo){
            /**
             * Validation Rules
             * Je les ai fait ici au lieu de faire une classe request car il faut passer des arguments à cette validation
             * 
             */
            $this->validate($request,[
                'name' => 'bail|required|between:3,20|unique:users,name,'.$request['id'],
                'email' => 'bail|required|email|unique:users,email,'.$request['id']
            ]) ; 
        
        $userUpdated = $accountRepo->updateAccount($request->all()); 

        return redirect()->route('accueil.admin')->with('update','Le compte de '.$userUpdated->name.' a été modifié avec succes') ; 
    }


    /**
     * Function that updates 'password' of an exesting User
     */
    public function updatePassword(
        UpdatePasswordRequest $request,
        AccountRepository $accountRepo)
    {
        $userUpdated = $accountRepo->updatePassword($request->all()) ; 

        return redirect()->route('accueil.admin')->with('update','Le mot de passe de '.$userUpdated->name.' a été modifié avec succès') ; 
    }

    /***
     * Function that deletes an exesting user
     */
    public function deleteAccount(
        $id,
        AccountRepository $accountRepo
    ){
        $nameUserDeleted = $accountRepo->deleteAccount($id) ; 

        return redirect()->route('accueil.admin')->with('update','Le compte de '.$nameUserDeleted.' a été supprimé avec succès') ; 
    }


}
