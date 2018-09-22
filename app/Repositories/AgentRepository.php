<?php

namespace App\Repositories;

use App\Agent;

class AgentRepository
{
    protected $agent  ;

    public function __construct(Agent $agent){
        $this->agent = $agent ;
    }

    /**
   * La fonction qui retourne le nombre d'employés arrivants durant la durée [bornMin, bornMax]
   */
    public function nbrArrivant($bornMin,$bornMax){
     $nombre = $this->agent->join('H_PLNGAGENT','H_AGENT.AGT_MATRICULE','=','H_PLNGAGENT.PLA_MATRICULE')->selectRaw('count(H_AGENT.AGT_MATRICULE) as nbr')
     ->where('H_PLNGAGENT.PLA_CPOINTAG','=','T')->whereBetween('H_PLNGAGENT.PLA_DDEBUT',[$bornMin,$bornMax])->get() ;
     return $nombre[0]->nbr ;

   }

    /**
   * La fonction qui retourne le nombre d'employés partants durant la durée [bornMin, bornMax]
   *
   */
  public function nbrPartant($bornMin,$bornMax){
    $nombre = $this->agent->join('H_PLNGAGENT','H_AGENT.AGT_MATRICULE','=','H_PLNGAGENT.PLA_MATRICULE')->selectRaw('count(H_AGENT.AGT_MATRICULE) as nbr')
     ->where('H_PLNGAGENT.PLA_CPOINTAG','=','R')->whereBetween('H_PLNGAGENT.PLA_DDEBUT',[$bornMin,$bornMax])->get() ;
     return $nombre[0]->nbr ;
  }

  public function getAgentInfo()
  {
         return Agent::select('AGT_MATRICULE', 'AGT_NOM',	'AGT_PRENOM')->get();
  }

  public function getName($matricule)
  {
       return Agent::select('AGT_NOM','AGT_PRENOM')
                     ->where('AGT_MATRICULE', '=', $matricule)
                     ->get();
  }

  public function getHistory(String $matricule)
  {


    $data = Agent::join('H_PLNGAGENT', function($join){
                            $join->on('H_AGENT.AGT_MATRICULE', '=', 'H_PLNGAGENT.PLA_MATRICULE');})
                        ->join('H_LRELEVAGT', function($join){
                            $join->on('H_AGENT.AGT_MATRICULE', '=', 'H_LRELEVAGT.RVA_MATRICULE');})
                        ->join('H_CIRCADMIN',function($join){
                            $join->on('H_CIRCADMIN.CAD_PAYS','=','H_LRELEVAGT.RVA_CPAYS');
                            $join->on('H_CIRCADMIN.CAD_CLIEU','=','H_LRELEVAGT.RVA_CLIEU');})
                        ->join('H_VOLRELEVE',function($join){
                            $join->on('H_CIRCADMIN.CAD_PAYS','=','H_VOLRELEVE.VRV_PAYS');
                            $join->on('H_CIRCADMIN.CAD_CLIEU','=','H_VOLRELEVE.VRV_CLIEU') ;})
                        ->select('H_VOLRELEVE.VRV_NVOL AS NVOL', 'H_VOLRELEVE.VRV_DEPART AS DEPART', 'H_VOLRELEVE.VRV_DESTIN AS DESTIN', 'H_PLNGAGENT.PLA_DDEBUT as date_debut', 'H_PLNGAGENT.PLA_DFIN AS date_fin')
                        ->where('H_AGENT.AGT_MATRICULE', '=', $matricule)
                      /*  ->where(function($or) {
                             $or->where(function($and){
                                $and->where('H_PLNGAGENT.PLA_CPOINTAG', '=', 'R')
                                ->where('H_VOLRELEVE.VRV_DEPART', '=', 'HME');
                             })
                             ->orWhere(function($and){
                                $and->where('H_PLNGAGENT.PLA_CPOINTAG', '=', 'T')
                                ->where('H_VOLRELEVE.VRV_DESTIN', '=', 'HME');
                             }); })
                        */->get();
    return $data;

  }

}
