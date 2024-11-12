<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportesIncidentes extends Model
{
    use HasFactory;

    protected $table = 'reporte_incidente';

    protected $fillable = [
        'fecha',
        'tipo',
        'descripcion',
        'reporte_daños',
        'vehiculo_id',
        'conductor_id',
        'admin_id',
    ];

    // Relación con el vehículo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    // Relación con el conductor
    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    // Relación con el administrador
    public function admin()
    {
        return $this->belongsTo(Usuario::class, 'admin_id');
    }
}
