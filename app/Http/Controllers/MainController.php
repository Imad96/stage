<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VolRequest;
use App\Repositories\VolRepository;

class MainController extends Controller
{
    public function __construct(){
      //This function is called in 'tableau_de_bord' with ajax
        $this->middleware('ajax')->only('getVolInformation');
    }

    public function index(VolRepository $volRepo)
    {
      $vols = $volRepo->getWeekVols() ; 

      return view('agent.tableau_de_bord',compact('vols'));

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

    public function getVolInformation(Request $request, VolRepository $volRepo){
      $data = $volRepo->getInfo($request->all()) ; 
      return response()->json(['data'=>$data])  ;
    }


}
