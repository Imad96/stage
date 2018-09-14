<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VolRequest;
use App\Repositories\VolRepository;

class MainController extends Controller
{
    public function index()
    {
      // code..
      //
      //

      return view('agent.tableau_de_bord');

    }

    public function getVol(VolRepository $volRepo)
    {
      $primaryKey= $volRepo->getPrimaryKey();
      return view('agent.modification',compact('primaryKey'));
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
