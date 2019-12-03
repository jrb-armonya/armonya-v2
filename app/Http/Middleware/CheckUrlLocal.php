<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Response;
use Closure;


class CheckUrlLocal
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
        
        if (request()->getHttpHost() == "armonya-v2.local") {
            dd($request);
            // return new Response(view('site.html.index'));

        }
        return $next($request);
    }
}
