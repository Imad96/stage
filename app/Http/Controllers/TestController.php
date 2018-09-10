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

   public function FunctionName($value='')
{
  // code..
}
   

}
