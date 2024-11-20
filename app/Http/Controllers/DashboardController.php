<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conductor;
use App\Models\ReportesMantenimiento;
use App\Models\ReportesIncidentes;
use App\Models\Vehiculo;

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

        // Obtener la cantidad total de camiones del admin
        $totalCamiones = Vehiculo::where('admin_id', $adminId)->count();

        // Pasar los datos a la vista
        return view('dashboard', compact('totalConductores', 'totalReportes','totalCamiones'));
    }
}
