<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = [
        'usuario_id', // Este es el campo con el ID de usuario
        'url_licencia',
        'estatus',
        'admin_id',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');  // Aquí, 'usuario_id' es el campo en la tabla de conductores
    }
}

