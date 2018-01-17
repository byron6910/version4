<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class admin1
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
        
      
 
        if(Auth::check() && Auth::user()->tipo=="administrador"){
            return $next($request);
         
        }
       // return "no tiene permisos de adminnistrador";
        return Redirect::to('/error');
    
    
    }
}
