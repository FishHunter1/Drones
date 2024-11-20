<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutasdController extends Controller
{
    public function detalle($id)
    {
        $ruta = Ruta::with(['vehiculo', 'conductor.usuario'])->findOrFail($id);
        return view('rutas.detalle', compact('ruta'));
    }


}
