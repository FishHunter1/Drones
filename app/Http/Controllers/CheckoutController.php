<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function show()
    {
        return view('checkout');
    }

    public function processCheckout(Request $request)
    {
        Log::info('Processing checkout for user: ' . Auth::id());

        $request->validate([
            'plan' => 'required|string',
            'card_number' => 'required|string|size:16',
            'expiry_month' => 'required|string|max:2',
            'expiry_year' => 'required|string|max:2',
            'cvv' => 'required|string|size:3',
        ]);

        // Update the user's role to Administrator
        $user = Auth::user();
        $user->role_id = 1; // Set as Administrator
        $user->save();

        Log::info('User role updated successfully. Redirecting to dashboard.');

        return redirect()->route('dashboard')->with('success', 'Pago completado con éxito. Bienvenido como Administrador.');
    }
}
