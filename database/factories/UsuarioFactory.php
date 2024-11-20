<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'contraseña' => Hash::make('contraseña123'), // Contraseña encriptada
            'role_id' => 1, // ID de rol predeterminado
            'direccion' => $this->faker->address, // Dirección generada
            'telefono' => $this->faker->numerify('##########'), // Solo números

        ];
    }
}
