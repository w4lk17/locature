<?php

namespace App\Http\Middleware;

use Closure;

class Lockscreen
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
        if($request->session()->has('locked') && url()->current() != route('lockscreen')) {

            return redirect('/account/lock');
        }

         return $next($request);
    }
}
