<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'placa',
        'marca',
        'modelo',
        'año',
        'estatus',
        'tipo_combustible',
        'kilometraje',
        'fecha_integracion',
        'conductor_id',
        'longitud',
        'latitud',
        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(Usuario::class, 'admin_id');
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }
}
