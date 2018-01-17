<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Session;

use Closure;

class admin
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
       if(!auth()->check())
       return redirect('login');

       if(auth()->user()->role =!0)
       return redirect('home');
       
       return $next($request);
    }
}
