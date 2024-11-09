<?php
namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|confirmed|min:6',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|regex:/^\+?[0-9\s\-\(\)]{10,15}$/',  // Validación mejorada para teléfono
        ]);

        // Crear el nuevo usuario en la base de datos
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'contraseña' => Hash::make($request->password),
        ]);

        // Autenticación automática después del registro
        Auth::login($usuario);

        // Redirigir al usuario al login o al dashboard si prefieres
        return redirect()->route('dashboard')->with('success', 'Registro exitoso.');
    }
}
