<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge1
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
        if($request->age<=50){
            echo "别攻击我";
            exit;
        }
        return $next($request);
    }
}