<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscripcion extends Model
{
    use HasFactory;

    protected $table = 'subscripciones';

    protected $fillable = [
        'usuario_id',
        'tipo',
        'cuota',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'subscripcion_id');
    }
}
