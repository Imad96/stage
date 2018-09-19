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

}
