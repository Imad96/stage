<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
      // code..
      //
      //

      return view('agent.tableau_de_bord');

    }
}
