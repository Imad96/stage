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

    public function getVol()
    {
      // code...
      //
      //
      return view('agent.modification');
    }

    public function postVol()
    {
      // code...
      //
      //

    }

    public function getList()
    {
      // code...
      //
      //
      return view('agent.extraction');
    }

    public function getHistoryEmploye()
    {
      // code...
      //
      //
      return view('agent.historique_employe');
    }

    public function getHistoryVol()
    {
      // code...
      //
      //
      return view('agent.historique_vol');
    }


}
