<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $roles)
    {
        $allowed = explode(',', $roles);
        if (!auth()->check() || !in_array(auth()->user()->role, $allowed, true)) {
            abort(403, 'Unauthorized role access.');
        }

        return $next($request);
    }
}
