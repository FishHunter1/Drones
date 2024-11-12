<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportesMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'reporte_mantenimiento';

    protected $fillable = [
        'vehiculo_id',
        'fecha',
        'tipo',
        'descripcion',
        'proveedor',
        'precio',
        'admin_id',
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function admin()
    {
        return $this->belongsTo(Usuario::class, 'admin_id');
    }
}

