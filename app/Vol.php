<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{

  protected $table = 'H_VOLS';

  public $timestamps = false;

  public function volReleves(){
    return $this->hasMany('App\VolReleve') ; 
  }

}
