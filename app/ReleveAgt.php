<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReleveAgt extends Model
{
    //
    protected $table = 'H_LRELEVAGT' ; 
    
    public $timestamps = false;

    public function circAdmin(){
        return $this->belongsTo('App\CircAdmin') ; 
    }

    public function agent(){
        return $this->gelongsTo('App\Agent') ; 
    }
}
