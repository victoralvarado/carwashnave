<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            abort(404);
        }

        return $next($request);
    }
}
