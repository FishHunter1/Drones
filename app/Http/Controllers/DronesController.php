<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DronesController extends Controller
{
    public function loginpage()
    {
        return view('dron.login'); // Adjust the view path as needed
    }

    public function registerpage()
    {
        return view('dron.register'); // Adjust the view path as needed
    }


    public function login(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Intentar autenticar al usuario
    if (auth()->attempt($request->only('email', 'password'))) {
        // Autenticación exitosa
        return redirect()->route('home'); // Redirigir a la página de inicio
    }

    // Si la autenticación falla
    return back()->withErrors([
        'email' => 'Las credenciales proporcionadas son incorrectas.',
    ]);
}

}
