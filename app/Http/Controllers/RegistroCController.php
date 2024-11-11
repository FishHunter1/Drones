<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RegistroCController extends Controller
{
    // Mostrar el formulario con los conductores disponibles
    public function showForm()
    {
        // Obtener todos los conductores disponibles
        $conductores = Conductor::all();

        // Retornar la vista con los conductores disponibles
        return view('camiones.formc', compact('conductores'));
    }

    // Método para crear el vehículo
    public function createc(Request $request)
    {
        Log::info('Entrando en el método createc del RegistroCController.');

        // Log para ver los datos que llegan
        Log::info('Datos recibidos por el formulario: ', $request->all());

        // Validación de los datos de entrada
        try {
            $request->validate([
                'placa' => 'required|string|max:6',
                'marca' => 'required|string|max:255',
                'modelo' => 'required|string|max:255',
                'año' => 'required|integer|digits:4',
                'estatus' => 'required|in:activo,inactivo,mantenimiento',
                'tipo_combustible' => 'required|string|max:255',
                'kilometraje' => 'required|integer',
                'fecha_integracion' => 'required|date',
                'conductor_id' => 'nullable|exists:conductores,id',
            ]);

            Log::info('Datos validados correctamente.', ['data' => $request->all()]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Error de validación:', ['error' => $e->errors()]);
            return redirect()->route('formc')->with('error', 'Error en los datos del formulario.');
        }

        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            Log::error('Usuario no autenticado.');
            return redirect()->route('home')->with('error', 'Debes estar autenticado para crear un vehículo.');
        }

        Log::info('Usuario autenticado con ID: ' . Auth::user()->id);

        // Intentar crear el vehículo
        try {
            Log::info('Intentando crear el vehículo con los siguientes datos: ', [
                'placa' => $request->placa,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'año' => $request->año,
                'estatus' => $request->estatus,
                'tipo_combustible' => $request->combustible,
                'kilometraje' => $request->kilometraje,
                'fecha_integracion' => $request->fecha_integracion,
                'conductor_id' => $request->conductor_id,
                'admin_id' => Auth::user()->id,
            ]);

            $vehiculo = Vehiculo::create([
                'placa' => $request->placa,
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'año' => $request->año,
                'estatus' => $request->estatus,
                'tipo_combustible' => $request->tipo_combustible,
                'kilometraje' => $request->kilometraje,
                'fecha_integracion' => $request->fecha_integracion,
                'admin_id' => Auth::user()->id,
                'conductor_id' => $request->conductor_id,
                'longitud' => 40.7128,  // Valor fijo de longitud
                'latitud' => -74.0060,  // Valor fijo de latitud
            ]);

            Log::info('Vehículo creado exitosamente.', ['vehiculo' => $vehiculo]);

            return redirect()->route('formc')->with('success', 'Vehículo creado exitosamente.');

        } catch (\Exception $e) {
            Log::error('Error al crear el vehículo.', ['error' => $e->getMessage()]);
            return redirect()->route('formc')->with('error', 'Hubo un error al crear el vehículo.');
        }
    }

}
