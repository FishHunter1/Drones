<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Subscripcion;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function processCheckout(Request $request)
{
    Log::info('Iniciando el proceso de checkout.');

    try {
        // Convertir el año de 2 dígitos al formato completo
        $expiryYear = (int) ('20' . $request->expiry_year);

        $request->merge(['expiry_year' => $expiryYear]);

        Log::info('Validando los datos enviados en la solicitud.', $request->all());

        $request->validate([
            'plan' => 'required|string',
            'price' => 'required|numeric|min:0',
            'card_number' => 'required|string|size:16',
            'expiry_month' => 'required|integer|min:1|max:12',
            'expiry_year' => 'required|integer|min:' . now()->year . '|max:' . (now()->year + 10),
            'cvv' => 'required|string|size:3',
        ]);

        Log::info('Datos validados exitosamente.');

        $user = Auth::user(); // Obtener usuario autenticado
        if (!$user) {
            Log::error('El usuario no está autenticado.');
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para completar el pago.');
        }

        Log::info('Usuario autenticado: ' . $user->id);

        // Guardar la suscripción
        Log::info('Intentando crear una nueva suscripción para el usuario: ' . $user->id);
        $subscripcion = Subscripcion::create([
            'usuario_id' => $user->id,
            'tipo' => $request->plan,
            'cuota' => $request->price,
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addMonth(),
        ]);

        if (!$subscripcion) {
            Log::error('No se pudo crear la suscripción para el usuario: ' . $user->id);
            return redirect()->back()->with('error', 'Hubo un problema al guardar la suscripción.');
        }

        Log::info('Suscripción creada exitosamente: ' . $subscripcion->id);

        // Actualizar el rol del usuario a "Administrador"
        Log::info('Intentando actualizar el rol del usuario: ' . $user->id);
        $user->role_id = 1; // ID correspondiente al rol "Administrador"
        if (!$user->save()) {
            Log::error('No se pudo actualizar el rol del usuario: ' . $user->id);
            return redirect()->back()->with('error', 'Hubo un problema al actualizar tu rol.');
        }

        Log::info('Rol actualizado exitosamente para el usuario: ' . $user->id);

        return redirect()->route('dashboard')->with('success', 'Pago completado con éxito. Ahora eres un Administrador.');
    } catch (\Exception $e) {
        Log::error('Error en el proceso de checkout: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Hubo un problema al completar el proceso. Por favor, inténtalo de nuevo.');
    }
}

}
