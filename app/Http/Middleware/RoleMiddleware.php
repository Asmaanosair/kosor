<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        $role=AdminGuard()->user()->role;
        if ($role=='admin') {
            return $next($request);
        }else{
          return abort(403, 'Unauthorized action.');
        }

    }
}
