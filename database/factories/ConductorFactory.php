<?php

namespace Database\Factories;

use App\Models\Conductor;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConductorFactory extends Factory
{
    protected $model = Conductor::class;

    public function definition()
    {
        return [
            'usuario_id' => Usuario::factory(), // Crea un usuario relacionado
            'url_licencia' => $this->faker->unique()->numerify('L######'), // Número de licencia
            'estatus' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'admin_id' => Usuario::factory(), // Crea un admin relacionado
        ];
    }
}
