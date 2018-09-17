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
        $this->middleware('ajax',['only'=>['getVolInformation','searchVol']]);

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
      $volNums= $volRepo->getVolNums();
      $destinations = $volRepo->getVolDestinations();
      return view('agent.modification',compact('volNums', 'destinations'));
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
      //récupérer les départs == destinations
      $departs = $volRepo->getVolDestinations() ;
      //retourner la page d'extraction agent/extraction
      return view('agent.extraction',compact('vols','departs'));
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

    /**
     *
     */
    public function searchVol(Request $request, VolRepository $volRepo){
      // Verify wether data is set or not
      if($request['numero_vol'] != '0' || $request['jour_vol'] != '0'
                     || $request['depart_vol'] != '0' || $request['destination_vol'] != '0' )
      {
        $data = $volRepo->searchVol($request->all()) ;

        if(count($data) != 0)
        {
          return response()->json(['found'=>true,'data'=>$data]);
        }else{
          return response()->json(['found'=>false,'data'=>$data]) ;
        }

      }
      //dans le cas d'eereur de saisi de l'utilisateur
      return response()->json(['found'=>false,'data'=>null]) ;

    }

    /**
     * Function that extracts vol list
     */
    public function extraireVol(Request $reques){
     // var_dump($reques) ; 
    }

}
