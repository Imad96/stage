<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CircAdmin extends Model
{
    protected $table = "H_CIRCADMIN" ;  
    
    public $timestamps = false;

    public function volReleves(){
        return $this->hasMany('App\VolReleve') ; 
    }

    public function releveAgts(){
        return $this->hasMany('App\ReleveAgt') ; 
    }
}
