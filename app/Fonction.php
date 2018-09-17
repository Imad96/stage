<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    //
    protected $table = 'H_FONCTIONS' ; 
    
    public $timestamps = false;

    public function agents(){
        return $this->hasMany('App\Agent') ; 
    }
}
