<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function perform(Request $request)
    {
        // Validación de los campos requeridos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verifica si el correo está registrado en la base de datos
        $user = Usuario::where('email', $request->email)->first();

        if (!$user) {
            // El correo no está registrado en el sistema
            return back()->withErrors([
                'email' => 'Su cuenta no se encuentra registrada. Por favor, registrese.',
            ])->withInput($request->only('email'));
        }

        // Compara la contraseña usando Hash::check() para validar el hash
        if (!Hash::check($request->password, $user->contraseña)) {
            // Si la contraseña no coincide con el hash
            return back()->withErrors([
                'password' => 'Las credenciales proporcionadas son incorrectas.',
            ])->withInput($request->only('email'));
        }

        // Si la contraseña es correcta, intenta autenticar al usuario
        Auth::login($user, $request->remember);

        // Si la autenticación es exitosa, regenera la sesión
        $request->session()->regenerate();
        return redirect()->intended('/dashboard')->with('success', '¡Inicio de sesión exitoso!');
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home')->with('success', 'Has cerrado sesión exitosamente.');
    }
}
