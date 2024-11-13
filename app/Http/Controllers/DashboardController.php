<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para usar Auth
use App\Models\Conductor; // Para acceder al modelo de conductores
use App\Models\ReportesMantenimiento; // Para acceder al modelo de reportes de mantenimiento
use App\Models\ReportesIncidentes; // Para acceder al modelo de reportes de incidentes

class DashboardController extends Controller
{
    public function indexado()
    {
        $adminId = Auth::user()->id;

        // Obtener la cantidad de conductores creados por el admin
        $totalConductores = Conductor::where('admin_id', $adminId)->count();

        // Obtener la cantidad total de reportes (mantenimiento e incidentes) del admin
        $totalReportes = ReportesMantenimiento::where('admin_id', $adminId)->count()
                         + ReportesIncidentes::where('admin_id', $adminId)->count();

        // Pasar los datos a la vista
        return view('dashboard', compact('totalConductores', 'totalReportes'));
    }
}
