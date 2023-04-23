<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        if (!auth()->user()->rol==='admin' && !auth()->user()->rol==='system')
        {
            return redirect('/');
        }
        return $next($request);
    } 
}
