<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizationMiddleware
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

        if(Auth::user()->is_admin < 1) {
            return view('store.denied');
        }
        return $next($request);
    }
}
