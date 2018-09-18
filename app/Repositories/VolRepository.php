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
      ->select('H_AGENT.AGT_MATRICULE as matricule','H_AGENT.AGT_SEXE as sexe','H_AGENT.AGT_NOM as nom','H_AGENT.AGT_PRENOM as prenom',
               'H_AGENT.AGT_CMPTANAL as compteAnal','H_AGENT.AGT_EMAIL as email','H_FONCTIONS.FCT_DESIGNATION as fonction', 'H_VOLS.VOL_NVOL as numeroVol',
               'H_PLNGAGENT.PLA_DDEBUT as dateVol','H_VOLS.VOL_DESTIN as destination')
      ->where('H_VOLS.VOL_DEPART','=',$request['depart_vol'])
      ->where('H_VOLS.VOL_DESTIN','=',$request['destination_vol'])
      ->where('H_VOLS.VOL_JOUR','=',$request['jour_vol'])
      ->where('H_VOLS.VOL_NVOL','=',$request['numero_vol'])
      ->where('H_PLNGAGENT.PLA_CPOINTAG','=',$request['destination_vol']=='HME'?'T':'R')
      ->where('H_PLNGAGENT.PLA_DDEBUT','=',date('Y-m-d',strtotime('this '.$dateVol)))
      ->get() ; 
      

  }

}
