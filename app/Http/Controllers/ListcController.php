<?php

namespace App\Http\Controllers;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListcController extends Controller
{
    public function indexi()
    {
        // Obtener el ID del administrador autenticado
        $adminId = Auth::user()->id;

        // Obtener los vehículos (camiones) creados por el administrador autenticado
        $vehiculos = Vehiculo::where('admin_id', $adminId) // Filtrar por el 'admin_id'
            ->with('conductor') // Cargar la relación de 'conductor'
            ->get();

        // Retornar la vista con los datos de los vehículos
        return view('camiones.listc', compact('vehiculos'));
    }
}
