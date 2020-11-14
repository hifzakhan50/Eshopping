<?php

namespace App\Http\Middleware;

use Closure;

class ProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$profile)
    {
        if (! $request->user()->hasProfile($profile)) {
            echo "Role: ".$profile;
            return $next($request);
        }
    }
}
