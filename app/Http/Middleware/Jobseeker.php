<?php

namespace App\Http\Middleware;

use Closure;

class Jobseeker
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
        if(auth()->user()->isJobseeker()) {
            return $next($request);
        }
        return redirect('/');
    }
}
