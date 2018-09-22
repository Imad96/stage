<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VolRequest;
use App\Http\Requests\VolUpdateRequest;
use App\Repositories\VolRepository;
use App\Repositories\AgentRepository;

class MainController extends Controller
{
    public function __construct(){
      //This function is called in 'tableau_de_bord' with ajax

        $this->middleware('ajax',['only'=>['getVolInformation','searchVol','autocomplete','extraireVol','modifVol','searchHistory']]);

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

    public function getVolForm(VolRepository $volRepo)
    {
      $volNums= $volRepo->getVolNums();
      $destinations = $volRepo->getVolDestinations();
      return view('agent.modification',compact('volNums', 'destinations'));
    }

    public function updateVol(VolUpdateRequest $request, VolRepository $volRepo)
    {

    //    $primaryKey = ['jour'=>$request['jour_vol4'], 'nvol'=>$request['numero_vol4'],
      //                    'depart'=>$request['depart_vol4'], 'dest'=>$request['destination_vol4'] ];
        $vol=$volRepo->storeVol($request->all());
        return redirect()->route('modif.get')->withOk("Le vol numéro ".$request['numero_vol4']." a été mis à jour avec succès." ) ;

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

   public function getHistoryEmploye(AgentRepository $agentRepo)
    {
      $agent =$agentRepo->getAgentInfo();
      return view('agent.historique_employe',compact('agent'));
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
      if($request['numero_vol'] != '0' || $request['jour_vol'] != '0'|| $request['depart_vol'] != '0' || $request['destination_vol'] != '0' )
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



    public function modifVol(Request $volRequest, VolRepository $volRepo)
    {
      $request = array();
      $request['nvol']= $volRequest['numero_vol2'];
      $request['depart']= $volRequest['depart_vol2'];
      $request['dest']= $volRequest['destination_vol2'];
      $request['jour'] = $volRequest['jour_vol2'];
      $volInfo=$volRepo->getInfo($request);
      return response()->json($volInfo) ;

    }

    public function extraireVol(Request $request,VolRepository $volRepo){

      $day = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat') ;
      $dateVol = $day[$request->all()['jour_vol']-1] ;
      $date = date('dmy',strtotime('this '.$dateVol)) ;


      $list = $volRepo->volList($request->all()) ;
      $newRequest['jour'] = $request['jour_vol'] ;
      $newRequest['nvol'] = $request['numero_vol'] ;
      $newRequest['depart'] = $request['depart_vol'] ;
      $newRequest['dest'] = $request['destination_vol'] ;
      $infoVol = $volRepo->getInfo($newRequest) ;
      //en réalité il y a un seul vol
     foreach($infoVol as $info ){
       $nbrFirstClass = $info['vol_np_c_first'];
     }

     /***Début de traitement du champs CLASSE  */
      $i = 0;
      $listLenght = count($list)  ;
     while(($nbrFirstClass != 0) && ($i<$listLenght)){
        if(($list[$i]->cpc == '35')){
            $list[$i]->classe = 'C'  ;
        }
        $i++;
        $nbrFirstClass-- ;
      }
      $i=0;
      while(($nbrFirstClass != 0) && ($i<$listLenght)){
        if(($list[$i]->type == 'CSCE')){
            $list[$i]->classe = 'C'  ;
        }
        $i++;
        $nbrFirstClass-- ;
      }
      $i=0;
      while($i<$listLenght){
        if(($list[$i]->classe != 'C') ){
          $list[$i]->classe = 'Y' ;
          $i++;
        }
      }
      /**Fin de traitement du champs CLASSE */
      /**Préparation de la forme du fichier */
      $corpsFichier = "" ;
      for($i=0;$i<$listLenght;$i++){
        $corpsFichier .= $list[$i]->matricule."|".$list[$i]->sexe."|".$list[$i]->nom."|".$list[$i]->prenom. "|"."DP-HMD"."|".$list[$i]->compteanal."|".str_replace(" ","",$list[$i]->email)."|".$list[$i]->fonction."|".$list[$i]->classe."|".$list[$i]->numerovol."|".date('d/m/Y',strtotime($list[$i]->datevol))."|".$list[$i]->destination."|".
        "
" ;
      }

      return response()->json(['data'=>$corpsFichier,'file_name'=>'SF'.$request['numero_vol'].'-'.$request['depart_vol'].'-'.$request['destination_vol'].'-'.$date.'.txt']) ;
    }

    public function autocomplete(Request $request, AgentRepository $agentRepo)
    {

      $matricule = $request->matricule;
      $results = $agentRepo->getName($matricule);
      return Response()->json($results);

   }

   public function searchHistory(Request $request, AgentRepository $agentRepo)
   {

         $matricule = $request['matricule'];
         $data = $agentRepo->getHistory($matricule);
         $history= array();
         if(count($data) != 0){
                  foreach ($data as $value) {

                  $history[] = ['nvol'=>$value['nvol'],
                                'depart'=>$value['depart'], 'destin'=>$value['destin'],
                                 'dateDebut'=>date('Y-m-d',strtotime($value['date_debut'])),
                                 'dateFin'=>date('Y-m-d',strtotime($value['date_fin'])) ];
                   }
         return response()->json(['data' =>$history, 'found'=> true]) ;
         }
         return response()->json(['data' =>null, 'found'=> false]) ;

   }
}
