<?php

namespace App\Repositories;

use App\Vol;

class VolRepository
{
  /* Here are the different columns of the table :
  VOL_JOUR |VOL_NVOL |VOL_DEPART	|VOL_DESTIN	 |VOL_NP_Y_ECO	|VOL_NP_C_FIRST
	VOL_CAPACITE	|VOL_TYPE	VOL_HEURDPR	|VOL_HEUTARV	|VOL_JOURASS	|VOL_NVOLASS
  VOL_DEPARTASS	|VOL_DESTINASS

  -----> The first 4 columns compose the primary key !
  */

  // 'Vol' is the model that represent the table H_VOLS
  protected $vol ;

  // we can't override primary key with multiple columns !!!
  //protected $primaryKey = ['VOL_JOUR', 'VOL_NVOL', 'VOL_DEPART',	'VOL_DESTIN'];

  // Construct that initialize the field "vol"
  public function __construct(Vol $vol){
      $this->vol = $vol ;
  }

  /**
   * Function that returns the Primary-key's columns
   */
  public function getPrimaryKey(){

      return Vol::select('VOL_JOUR', 'VOL_NVOL', 'VOL_DEPART',	'VOL_DESTIN')->get() ;
  }

  /**
   * Function that returns the week flights
   */
  public function getWeekVols(){
    return Vol::select('VOL_JOUR', 'VOL_NVOL', 'VOL_DEPART',	'VOL_DESTIN','VOL_HEURDPR')->get() ;
  }

    /**
     * Functions that returns informations about a specific flight
     */
  public function getInfo(Array $request){

    return Vol::where('VOL_JOUR','=',$request['jour'])
                  ->where('VOL_NVOL','=',$request['nvol'])
                  ->where('VOL_DEPART','=',$request['depart'])
                  ->where('VOL_DESTIN','=',$request['dest'])->get() ;
  }

  /**
   * Function that returns the number of flights having 'departure' == departure
   */
  public function getNumberDepart($departure){
    return Vol::where('VOL_DEPART','=',$departure)->count() ;
  }

  /**
   * Function that returns the number of flights having 'destination' == destination
   */
  public function getNumberArrive($destination){
    return Vol::where('VOL_DESTIN','=',$destination)->count() ;
  }

  /**
   * Function that returns vol numbres (all numbres of vols)
   */
  public function getVolNums(){
    return Vol::select('VOL_NVOL as numero')->distinct('numero')->orderby('numero')->get() ;
  }


  /**
   * Function that returns all flight destinations == Departure
   */
  public function getVolDestinations(){
    return Vol::select('VOL_DEPART as depart')->distinct('depart')->orderby('depart')->get() ;
  }

  /**
   *
   */
  public function searchVol(Array $request){

    return Vol::select('VOL_NVOL','VOL_DEPART','VOL_DESTIN','VOL_JOUR')
    ->where('VOL_NVOL',$request['numero_vol'] != "0" ?'=':'<>',$request['numero_vol'] != "0" ? $request['numero_vol']:"0")
    ->where('VOL_DESTIN',$request['destination_vol'] != "0" ?'=':'<>',$request['destination_vol'] != "0" ? $request['destination_vol']:'0')
    ->where('VOL_DEPART',$request['depart_vol'] != "0" ?'=':'<>',$request['depart_vol'] != "0" ? $request['depart_vol']:'0')
    ->where('VOL_JOUR',$request['jour_vol'] != "0" ?'=':'<>',$request['jour_vol'] != "0" ? $request['jour_vol']:'0')
    ->get()  ;

  }


  public function storeVol(Array $request)
  {

    $affectedRows = Vol::where('vol_jour', '=', $request['jour_vol4'])
                        ->where('vol_nvol', '=', $request['numero_vol4'])
                        ->where('vol_depart', '=', $request['depart_vol4'])
                        ->where('vol_destin', '=', $request['destination_vol4'])
                        ->update(['vol_np_y_eco' => $request['vol_y_number'],
                                  'vol_np_c_first' => $request['vol_c_number'],
                                  'vol_type' => $request['type_vol'],
                                  'vol_heurdpr' => $request['heure_depart_vol'],
                                  'vol_heutarv' => $request['heure_arrive_vol'],
                        ]);

    return $affectedRows;

  }
  /***
   * Function that returns a list of people concerned by the flight given
   */
  public function volList(Array $request){


    $day = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat') ;
    $dateVol = $day[$request['jour_vol']-1] ;
    return Vol
      ::join('H_VOLRELEVE',function($join){
          $join->on('H_VOLRELEVE.VRV_JOUR','=','H_VOLS.VOL_JOUR') ;
          $join->on('H_VOLRELEVE.VRV_NVOL','=','H_VOLS.VOL_NVOL') ;
          $join->on('H_VOLRELEVE.VRV_DEPART','=','H_VOLS.VOL_DEPART') ;
          $join->on('H_VOLRELEVE.VRV_DESTIN','=','H_VOLS.VOL_DESTIN') ; })
      ->join('H_CIRCADMIN',function($join){
          $join->on('H_CIRCADMIN.CAD_PAYS','=','H_VOLRELEVE.VRV_PAYS');
          $join->on('H_CIRCADMIN.CAD_CLIEU','=','H_VOLRELEVE.VRV_CLIEU') ; })
      ->join('HV01_LRELEVAGT',function($join){
        $join->on('HV01_LRELEVAGT.RVA_CPAYS','=','H_CIRCADMIN.CAD_PAYS');
        $join->on('HV01_LRELEVAGT.RVA_CLIEU','=','H_CIRCADMIN.CAD_CLIEU'); })
      ->join('H_AGENT',function($join){
        $join->on('H_AGENT.AGT_MATRICULE','=','HV01_LRELEVAGT.RVA_MATRICULE') ; })
      ->join('H_PLNGAGENT',function($join){
        $join->on('H_PLNGAGENT.PLA_MATRICULE','=','H_AGENT.AGT_MATRICULE') ; })
      ->join('H_FONCTIONS',function($join){
        $join->on('H_FONCTIONS.FCT_CFONCTION','=','H_AGENT.AGT_CFONCTION') ;})
      ->join('H_POINTAGE',function($join){
        $join->on('H_POINTAGE.PTG_CPOINTAG','=','H_PLNGAGENT.PLA_CPOINTAG') ;
      })
      ->select('H_AGENT.AGT_MATRICULE as matricule',\DB::raw("decode(h_agent.agt_sexe,'M','MR','MRS') as sexe "),'H_AGENT.AGT_NOM as nom','H_AGENT.AGT_PRENOM as prenom',
               'H_AGENT.AGT_CMPTANAL as compteAnal',\DB::raw(trim('H_AGENT.AGT_EMAIL as email')),'H_FONCTIONS.FCT_DESIGNATION as fonction', 'H_VOLS.VOL_NVOL as numeroVol',
               'H_PLNGAGENT.PLA_DDEBUT as dateVol','H_VOLS.VOL_DESTIN as destination','H_AGENT.AGT_CPC as cpc','H_AGENT.AGT_TYPEPOSTE as typePoste','H_AGENT.AGT_MATRICULE as classe')
      ->where('H_VOLS.VOL_DEPART','=',$request['depart_vol'])
      ->where('H_VOLS.VOL_DESTIN','=',$request['destination_vol'])
      ->where('H_VOLS.VOL_JOUR','=',$request['jour_vol'])
      ->where('H_VOLS.VOL_NVOL','=',$request['numero_vol'])
      ->where('H_PLNGAGENT.PLA_CPOINTAG','=',$request['destination_vol']=='HME'?'T':'R')
      ->whereDate('H_PLNGAGENT.PLA_DDEBUT','<=',date('Y-m-d',strtotime('this '.$dateVol)))
      ->whereDate('H_PLNGAGENT.PLA_DDEBUT','>',date('Y-m-d',strtotime('last '.$dateVol)))
      ->where('HV01_LRELEVAGT.RVA_MOYRELEV','=','A')
      ->where($request['depart_vol'] == 'HME'?'H_POINTAGE.PTG_EMBDEPART':'H_POINTAGE.PTG_EMBRETOUR','=','1')
      ->get() ;
  }


  /**
   * Function that returns all dates of a flight berween two dates
   */
  public function listeParDate(Array $request){
    return Vol
      ::join('H_VOLRELEVE',function($join){
          $join->on('H_VOLRELEVE.VRV_JOUR','=','H_VOLS.VOL_JOUR') ;
          $join->on('H_VOLRELEVE.VRV_NVOL','=','H_VOLS.VOL_NVOL') ;
          $join->on('H_VOLRELEVE.VRV_DEPART','=','H_VOLS.VOL_DEPART') ;
          $join->on('H_VOLRELEVE.VRV_DESTIN','=','H_VOLS.VOL_DESTIN') ; })
      ->join('H_CIRCADMIN',function($join){
          $join->on('H_CIRCADMIN.CAD_PAYS','=','H_VOLRELEVE.VRV_PAYS');
          $join->on('H_CIRCADMIN.CAD_CLIEU','=','H_VOLRELEVE.VRV_CLIEU') ; })
      /*->join('HV01_LRELEVAGT',function($join){
        $join->on('HV01_LRELEVAGT.RVA_CPAYS','=','H_CIRCADMIN.CAD_PAYS');
        $join->on('HV01_LRELEVAGT.RVA_CLIEU','=','H_CIRCADMIN.CAD_CLIEU'); })*/
      ->join('H_LRELEVAGT',function($join){
        $join->on('H_LRELEVAGT.RVA_CPAYS','=','H_CIRCADMIN.CAD_PAYS') ;
        $join->on('H_LRELEVAGT.RVA_CLIEU','=','H_CIRCADMIN.CAD_CLIEU') ;
      })
      ->join('H_AGENT',function($join){
        $join->on('H_AGENT.AGT_MATRICULE','=','H_LRELEVAGT.RVA_MATRICULE') ; })
      ->join('H_PLNGAGENT',function($join){
        $join->on('H_PLNGAGENT.PLA_MATRICULE','=','H_AGENT.AGT_MATRICULE') ; })

      ->where('H_VOLS.VOL_DEPART','=',$request['depart_vol'])
      ->where('H_VOLS.VOL_DESTIN','=',$request['destination_vol'])
      ->where('H_VOLS.VOL_JOUR','=',$request['jour_vol'])
      ->where('H_VOLS.VOL_NVOL','=',$request['numero_vol'])
      ->where('H_PLNGAGENT.PLA_CPOINTAG','=',$request['destination_vol']=='HME'?'T':'R')
      ->whereDate('H_PLNGAGENT.PLA_DDEBUT','>',date('Y-m-d',strtotime($request['date_vol']." -1 week")))
      ->whereDate('H_PLNGAGENT.PLA_DDEBUT','<=',$request['date_vol'])
      ->where('H_LRELEVAGT.RVA_MOYRELEV','=','A')
      ->select('H_AGENT.AGT_MATRICULE as matricule','H_AGENT.AGT_NOM as nom','H_AGENT.AGT_PRENOM as prenom')
      ->orderby('matricule')
      ->get() ;
      return $request;
  }

}
