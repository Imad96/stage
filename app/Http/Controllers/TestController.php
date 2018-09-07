<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
   public function test(){

    $agents= DB::select('select agt_matricule from h_agent');
    var_dump($agents);
   }

}
