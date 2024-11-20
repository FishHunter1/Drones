<?php

namespace Database\Factories;

use App\Models\Vehiculo;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculoFactory extends Factory
{
    protected $model = Vehiculo::class;

    public function definition()
    {
        return [
            'placa' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{4}'),
            'marca' => $this->faker->company,
            'modelo' => $this->faker->word,
            'año' => $this->faker->year,
            'fecha_integracion' => $this->faker->date(),
            'kilometraje' => $this->faker->numberBetween(0, 200000),
            'tipo_combustible' => $this->faker->randomElement(['Gasolina', 'Diesel']),
            'estatus' => $this->faker->randomElement(['Activo', 'Inactivo', 'mantenimiento']),
            'longitud' => $this->faker->longitude,
            'latitud' => $this->faker->latitude, // Genera un valor aleatorio para latitud
            'conductor_id' => \App\Models\Conductor::inRandomOrder()->first()->id,
            'admin_id' => Usuario::where('role_id', 1)->inRandomOrder()->first()->id,
        ];
    }
}
