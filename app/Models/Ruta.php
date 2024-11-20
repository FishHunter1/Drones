<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'ubicacion_inicial',
        'ubicacion_final',
        'hora_inicio',
        'hora_final',
        'vehiculo_id',
        'conductor_id',
        'admin_id', // Asegúrate de incluir esta columna
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function conductor()
    {
        return $this->belongsTo(Conductor::class, 'conductor_id');
    }

    public function admin()
    {
        return $this->belongsTo(Usuario::class, 'admin_id');
    }
}
