<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VolRequest;
use App\Repositories\VolRepository;
use App\Repositories\AgentRepository;

class MainController extends Controller
{
    public function __construct(){
      //This function is called in 'tableau_de_bord' with ajax
        $this->middleware('ajax')->only('getVolInformation');
    }

    public function index(VolRepository $volRepo,AgentRepository $agentRepo)
    {
      //Returns the numbre of flights having 'Depart' 'Destination' == 'HME
      $nbrDepart = $volRepo->getNumberDepart('HME')  ;
      $nbrArrive = $volRepo->getNumberArrive('HME') ;
      //déterminer la date de samedi et vendredi de cette semaine (pour récupérer le nombre entre le samedi et vendredi)
      $saturdayOfThisWeek = date('D',strtotime('today')) == 'Sat' ? date('Y-m-d',strtotime('today')): date('Y-m-d',strtotime('last saturday')) ;
      $fridayOfThisWeek = date('D',strtotime('today')) == 'Fri' ? date('Y-m-d',strtotime('today')): date('Y-m-d',strtotime('next friday')) ;
      //récupérer le nombre de partants et d'arrivants entre samedi de cette semaine et le prochain vendredi
      $nbrArrivant = $agentRepo->nbrArrivant($saturdayOfThisWeek,$fridayOfThisWeek) ;
      $nbrPartant =  $agentRepo->nbrPartant($saturdayOfThisWeek,$fridayOfThisWeek) ;

      $vols = $volRepo->getWeekVols() ;

      return view('agent.tableau_de_bord',compact('vols','nbrDepart','nbrArrive','nbrArrivant','nbrPartant'));

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

    public function getList(VolRepository $volRepo)
    {
      //récupérer les numéro des vols 
      $vols = $volRepo->getVolNums() ;  
      //récupérer les jours 
      $days = $volRepo->getVolDays() ; 
      //récupérer les départs == destinations 
      $departs = $volRepo->getVolDestinations() ; 
      //retourner la page d'extraction agent/extraction 
      return view('agent.extraction',compact('vols','days','departs'));
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
