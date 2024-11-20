<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscripcion_id',
        'monto',
        'fecha',
        'metodo',
    ];

    public function subscripcion()
    {
        return $this->belongsTo(Subscripcion::class, 'subscripcion_id');
    }
}
