<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        header('Access-Control-Allow-Origin: http://127.0.0.1:8001');
        header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Authorization, Origin');
        header('Access-Control-Allow-Methods: POST, OPTIONS');

        return $next($request);
    }
}
