<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportesMantenimiento;
use App\Models\ReportesIncidentes;
use Illuminate\Support\Facades\Auth;

class ListrController extends Controller
{
    // Listar reportes de mantenimiento
    public function indexr()
    {
        $adminId = Auth::user()->id;

        $reportesM = ReportesMantenimiento::where('admin_id', $adminId)
            ->with(['vehiculo', 'admin'])
            ->get();

        $reportesI = ReportesIncidentes::where('admin_id', $adminId)
            ->with(['vehiculo', 'conductor', 'admin'])
            ->get();

        return view('reportes.listr', compact('reportesM', 'reportesI'));
    }
}
