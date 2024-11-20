<?php

namespace App\Http\Controllers;
use App\Models\Ruta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RutasdController extends Controller
{
    public function detalle($id)
    {
        $ruta = Ruta::findOrFail($id);

        return view('rutas.rutasd', compact('ruta'));
    }


}
