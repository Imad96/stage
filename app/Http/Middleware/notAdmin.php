<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 

class notAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->type != 3){
            return $next($request);
        }
        return redirect()->route('accueil.admin') ; 
/*        return $next($request);*/
        /*return redirect()->route('login.page') ; */


    }
}
