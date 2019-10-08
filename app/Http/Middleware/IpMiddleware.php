<?php

namespace App\Http\Middleware;

use App\Ip;
use Closure;
use Illuminate\Support\Facades\Auth;

class IpMiddleware
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
        // dd($_SERVER['REMOTE_ADDR']);

        // dd("MAINTENANCE MODE ");
        if ($request->user()->role_id == 1) {
            return $next($request);
        }
        if (Ip::where('ip', $_SERVER['REMOTE_ADDR'])->first()) {
            return $next($request);
        } else {
            return redirect("/")->withMyerror("You are not authorized for this action");
        }
        return $next($request);
    }
}
