<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'email',
        'contraseña',
        'role_id',
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    // Método para asegurar que el rol predeterminado sea asignado si no se especifica
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            // Buscar el rol de Usuario predeterminado
            if (empty($usuario->role_id)) {
                $defaultRole = Role::where('nombre', 'Usuario')->first();
                $usuario->role_id = $defaultRole->id ?? null;
            }
        });
    }

    // Relación con la tabla de roles
    public function rol()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
