<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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

       /*  return $next($request)
       ->header('Access-Control-Allow-Origin','*')
        ->header('Access-Control-Allow-Methods','GET,POST,PUT,PATCH,DELETE,OPTIONS,HEAD')
        
        

        ->header("Access-Control-Expose-Headers", "Access-Control-*")
        ->header("Access-Control-Allow-Headers", "Access-Control-*, X-Auth-Token,Origin,X-Requested-With, Content-Type, Accept, Authorization")

        ->header('Allow', 'GET, POST, PUT, DELETE, OPTIONS, HEAD');
    */
    return $next($request)
    //->header('Access-Control-Allow-Origin', '*') ;   
    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
    ->header('Access-Control-Allow-Headers', 'content-type,application/x-www-form-urlencoded, withcredentials, Access-Control-Allow-Headers, Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
        
    }
}
