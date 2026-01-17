<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     * $role será el rol que queremos permitir (ej: admin)
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $usuarioRol = session('rol'); // Usando la sesión que ya guardas en AuthController

        if (!$usuarioRol || $usuarioRol !== $role) {
            abort(403, 'No autorizado'); // Bloquea el acceso si no es admin
        }

        return $next($request);
    }
}
