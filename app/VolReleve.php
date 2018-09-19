<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VolReleve extends Model
{
    //
    protected $table = 'H_VOLRELEVE' ; 
    
    public $timestamps = false;

    public function vol(){
        return $this->belongsTo('App\Vol') ; 
    }

    public function circadmin(){
        return $this->belongsTp('App\CircAdmin') ; 
    }
}
