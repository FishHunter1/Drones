<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruta;
use Illuminate\Support\Facades\Log;

class ListaruController extends Controller
{
    public function indexRutas()
    {
        $user = Auth::user(); // Usuario autenticado

        if ($user->rol && $user->rol->nombre === 'Administrador') {
            // Administrador: Ver solo las rutas creadas por este administrador
            $rutas = Ruta::where('admin_id', $user->id)
                ->with(['vehiculo', 'conductor.usuario'])
                ->get();
        } elseif ($user->rol && $user->rol->nombre === 'Conductor') {
            // Conductor: Ver solo las rutas asignadas a él
            $conductor = $user->conductor; // Relación con el modelo Conductor
            if ($conductor) {
                $rutas = Ruta::where('conductor_id', $conductor->id)
                    ->with(['vehiculo', 'conductor.usuario'])
                    ->get();
            } else {
                $rutas = collect(); // Colección vacía si no hay relación
            }
        } else {
            // Otros roles o usuarios no autenticados: No tienen acceso
            $rutas = collect(); // Colección vacía
        }

        return view('rutas.listaru', compact('rutas'));
    }


}
