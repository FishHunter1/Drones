<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Vehiculo;
use App\Models\Conductor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CrearutaController extends Controller
{
    public function showFormol()
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

        return view('rutas.crearuta', compact('vehiculos','conductores'));
    }

    public function creara(Request $request)
    {
        Log::info('Iniciando la creación de una nueva ruta.');

        try {
            // Validación de los datos de entrada
            $validated = $request->validate([
                'ubicacion_inicial' => 'required|string|max:255',
                'ubicacion_final' => 'required|string|max:255',
                'hora_inicio' => 'required|date_format:H:i',
                'hora_final' => 'required|date_format:H:i|after:hora_inicio',
                'vehiculo_id' => 'required|exists:vehiculos,id',
                'conductor_id' => 'required|exists:conductores,id',
            ]);

            Log::info('Datos validados correctamente.', ['validated_data' => $validated]);

            // Crear la ruta en la base de datos y asociarla al administrador autenticado
            $ruta = Ruta::create([
                'ubicacion_inicial' => $validated['ubicacion_inicial'],
                'ubicacion_final' => $validated['ubicacion_final'],
                'hora_inicio' => now()->format('Y-m-d') . ' ' . $validated['hora_inicio'],
                'hora_final' => now()->format('Y-m-d') . ' ' . $validated['hora_final'],
                'vehiculo_id' => $validated['vehiculo_id'],
                'conductor_id' => $validated['conductor_id'],
                'admin_id' => Auth::id(),
            ]);

            Log::info('Ruta creada exitosamente.', ['ruta' => $ruta]);

            return redirect()->route('listaru')->with('success', 'Ruta creada exitosamente.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Error de validación.', ['errors' => $e->errors()]);

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error al crear la ruta.', [
                'exception_message' => $e->getMessage(),
                'exception_trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->withErrors(['error' => 'Hubo un problema al guardar la ruta.']);
        }
    }

}
