<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutasdController extends Controller
{
    public function detalle($id)
    {
        // Busca la ruta con sus relaciones
        $ruta = Ruta::with(['vehiculo', 'conductor.usuario'])->findOrFail($id);

        // Retorna la vista con los datos de la ruta
        return view('rutas.rutasd', compact('ruta'));
    }

}
