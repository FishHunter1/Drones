<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Verifica si el usuario tiene el rol requerido
        if (auth()->check() && auth()->user()->rol->nombre === $role) {
            return $next($request);
        }

        // Redirige o muestra un error si no tiene acceso
        abort(403, 'Acceso denegado.');
    }
}
