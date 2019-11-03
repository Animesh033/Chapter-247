<?php

namespace App\Http\Middleware;

use Bouncer, Closure;

class ScopeBouncer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $identifier)
    {
        Bouncer::scope()->to($identifier);
        return $next($request);
    }
}
