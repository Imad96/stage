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


}


