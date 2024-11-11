<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Usuario;
use App\Models\Conductor;
use Illuminate\Support\Facades\Hash;

class RegistroEController extends Controller
{
    public function create(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
            'cedula' => 'required|string|max:20|unique:conductores,url_licencia',
        ]);

        // Buscar el rol de conductor
        $roleConductor = Role::where('nombre', 'Conductor')->first();

        if (!$roleConductor) {
            return redirect()->back()->withErrors(['role' => 'El rol de conductor no existe.']);
        }

        // Crear el usuario asociado al conductor
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'contraseña' => Hash::make($request->password),
            'role_id' => $roleConductor->id, // Asignar el rol de conductor explícitamente
        ]);

        // Crear la información específica del conductor
        $conductor = Conductor::create([
            'usuario_id' => $usuario->id,
            'url_licencia' => $request->cedula,
            'estatus' => 'activo',
            'admin_id' => auth()->user()->id, // Vincular al administrador autenticado
        ]);

        return redirect()->route('liste')->with('success', 'Conductor creado exitosamente.');
    }
}
