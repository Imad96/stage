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

    return Vol::where('VOL_JOUR','=',$request['jour'])->where('VOL_NVOL','=',$request['nvol'])->where('VOL_DEPART','=',$request['depart'])->where('VOL_DESTIN','=',$request['dest'])->get() ; 
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


}
