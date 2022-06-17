<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Peserta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('role') == 'peserta') {

            return $next($request);
        }
        else {
            abort(404);
        }
    }
}
