<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class cekstat
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
        if (Auth::check() && Auth::user()->isAdmin()=='1') {
            return $next($request);
        } elseif (Auth::check() && Auth::user()->isAdmin()=='2') {
            return redirect('forbidden');
        }
    }
}
