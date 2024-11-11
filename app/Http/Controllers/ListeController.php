<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use Illuminate\Support\Facades\Auth; // Importar autenticación

class ListeController extends Controller
{
    public function index()
    {
        // Obtener el ID del administrador autenticado
        $adminId = Auth::user()->id;

        // Obtener solo los conductores creados por el administrador autenticado
        $conductores = Conductor::where('admin_id', $adminId) // Filtrar por el 'admin_id'
            ->whereHas('usuario', function ($query) {
                $query->where('role_id', 3); // Filtrar usuarios con rol de Conductor
            })
            ->with('usuario') // Cargar la relación de 'usuario'
            ->get();

        // Retornar la vista con los datos de los conductores
        return view('empleados.liste', compact('conductores'));
    }

}
