<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\ReportesIncidentes;
use Illuminate\Support\Facades\Auth;

class ReportesIController extends Controller
{
    public function showFormi()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        if ($user->role == 'Administrador') {
            $vehiculos = Vehiculo::all();
            $conductores = Conductor::all();
        } else {
            $vehiculos = Vehiculo::where('admin_id', $user->id)->get();
            $conductores = Conductor::where('admin_id', $user->id)->get();
        }

        return view('reportes.reportesi', compact('vehiculos','conductores'));
    }

    public function createi(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'nullable|exists:vehiculos,id',
            'conductor_id' => 'nullable|exists:conductores,id',
            'fecha' => 'required|date',
            'tipo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'reporte_daños' => 'required|string|max:255',
        ]);

        $reporte = ReportesIncidentes::create([
            'vehiculo_id' => $request->vehiculo_id,
            'conductor_id' => $request->conductor_id,
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'reporte_daños' => $request->reporte_daños,
            'admin_id' => Auth::id(),
        ]);

        return redirect()->route('listr')->with('success', 'Reporte de incidente creado exitosamente.');
    }
}
