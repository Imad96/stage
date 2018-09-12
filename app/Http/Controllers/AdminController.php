<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Function that redirect to the admin main page "admin.accueil"
     */
    public function index(){
        //...

        return view('admin.accueil') ;

    }

    public function addAccount(){
        //


        return view('admin.ajouter_compte') ;

    }

    public function insertAccount(Request $request){
        //

        return redirect()->route('accueil.admin') ; 
    }
}
