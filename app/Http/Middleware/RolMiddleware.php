<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!session()->has('rol')) {
            return redirect()->route('login');
        }

        if (!in_array(session('rol'), $roles)) {
            abort(403, 'No tienes permiso para acceder');
        }

        return $next($request);
    }
}

