<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
   public function test(){
    /**
     * test de connexion à oracle
     */
    $agents= DB::select('select agt_matricule from h_agent');
    var_dump($agents);
   }

<<<<<<< HEAD
    public function FunctionName($value='')
=======
   public function FunctionName($value='')
>>>>>>> 40fd92c889bbbd93e02ef2cee81af13646155a8f
{
  // code..
}


}
