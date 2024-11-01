namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'contraseña',
        'direccion',
        'telefono',
        'rol_id',
    ];

    protected $hidden = [
        'contraseña', 'remember_token',
    ];
}
