<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $table = 'rutas';

    protected $fillable = [
        'ubicacion_inicial',
        'ubicacion_final',
        'hora_inicio',
        'hora_final',
        'vehiculo_id',
        'conductor_id',
    ];

    // Relación con vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    // Relación con conductor
    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }
}
