<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\ReportesMantenimiento;
use Illuminate\Support\Facades\Auth;

class ReportesMController extends Controller
{
    public function showForma()
    {
        $user = Auth::user();
        if ($user->role == 'Administrador') {
            $vehiculos = Vehiculo::all();
        } else {
            $vehiculos = Vehiculo::where('admin_id', $user->id)->get();
        }
        return view('reportes.reportesm', compact('vehiculos'));
    }


    public function createm(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'vehiculo_id' => 'nullable|exists:vehiculos,id',
            'fecha' => 'required|date',
            'tipo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'proveedor' => 'required|string|max:255',
            'precio' => 'required|integer',
        ]);

        // Crear el nuevo reporte de mantenimiento
        $reporte = ReportesMantenimiento::create([
            'vehiculo_id' => $request->vehiculo_id,
            'fecha' => $request->fecha,
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'proveedor' => $request->proveedor,
            'precio' => $request->precio,
            'admin_id' => Auth::id(), // Relacionado con el admin que crea el reporte
        ]);

        return redirect()->route('reportesm')->with('success', 'Reporte de mantenimiento creado exitosamente.');
    }
}
