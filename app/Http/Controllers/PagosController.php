<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pago;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function showConfirmation($pagoId)
    {
        return view('pagos.payment-confirmation', ['pagoId' => $pagoId]);
    }

    public function showReceipt($pagoId)
    {
        $pago = Pago::with('subscripcion')->findOrFail($pagoId);
        $user = Auth::user();

        Mail::send('pagos.email', compact('pago', 'user'), function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Comprobante de Pago');
        });

        return view('pagos.payment-receipt', [
            'pago' => $pago,
            'user' => $user,
        ]);
    }

}
