<?php

namespace Database\Factories;

use App\Models\Ruta;
use Illuminate\Database\Eloquent\Factories\Factory;

class RutaFactory extends Factory
{
    protected $model = Ruta::class;

    public function definition()
    {
        return [
            'origen' => $this->faker->address,
            'destino' => $this->faker->address,
            'kilometraje' => $this->faker->numberBetween(1, 500), // Ejemplo: entre 10 y 500 km
            'duracion' => $this->faker->numberBetween(1, 300), // Ejemplo: duración en minutos
            'conductor_id' => \App\Models\Conductor::inRandomOrder()->first()->id,
            'vehiculo_id' => \App\Models\Vehiculo::inRandomOrder()->first()->id,
        ];
    }
}
