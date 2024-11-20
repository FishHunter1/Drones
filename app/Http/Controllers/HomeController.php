<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }

    public function showSubscriptionPage()
    {
        // Verifica si el usuario está autenticado
        if (!auth()->check()) {
            // Redirige al usuario a la página de login si no está autenticado
            return redirect()->route('login');
        }

        // Si está logeado, muestra la vista de suscripción
        return view('checkout');
    }
}
