<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $table = 'h_plngagent' ; 
    public $timestamps = false;


    public function user(){
        return $this->belongsTo('App\Agent') ; 
    }
    
}
