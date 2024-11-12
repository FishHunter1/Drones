<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class ReportesMController extends Controller
{
    public function showForma()
    {
        // Obtener todos los vehículos disponibles
        $vehiculos = Vehiculo::all();

        // Retornar la vista con los vehículos disponibles
        return view('reportes.reportesm', compact('vehiculos'));
    }
}