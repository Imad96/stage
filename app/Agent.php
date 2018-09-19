<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    //

    protected $table = 'H_AGENT' ; 
    
    public $timestamps = false;


    public function plannings(){
        return $this->hasMany('App\Planning') ; 
    }

    public function releveAgents(){
        return $this->hasMany('App\ReleveAgt') ; 
    }

    public function fonction(){
        return $this->belongsTo('App\Fonction') ; 
    }
}
