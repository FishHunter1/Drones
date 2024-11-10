<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use Illuminate\Support\Facades\Log;

class ListeController extends Controller
{
    public function index()
    {
        // Obtener todos los conductores asociados al administrador autenticado
        $conductores = Conductor::whereHas('usuario', function ($query) {
            $query->where('role_id', 3); // Filtrar usuarios con rol de Conductor
        })
        ->with('usuario') // Cargar la relación de 'usuario'
        ->get();

        // Retornar la vista con los datos de los conductores
        return view('empleados.liste', compact('conductores'));
    }
}
