<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string ...$roles  (puede recibir uno o varios roles, ej: role:admin, role:admin|superadmin)
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Debes iniciar sesión para acceder a esta sección.');
        }

        $user = Auth::user();

        // 2. Opción recomendada: si tienes una columna 'role' en la tabla users
        //    (ej: 'admin', 'turista', 'hotelero', etc.)
        //    Esto es más robusto que usar session()
        if (!$user->role || !in_array($user->role, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        // Alternativa temporal (si aún no tienes columna role en users y usas session):
        /*
        if (!session()->has('rol') || !in_array(session('rol'), $roles)) {
            abort(403, 'No tienes permiso para acceder.');
        }
        */

        return $next($request);
    }
}