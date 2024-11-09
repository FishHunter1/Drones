<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = ['Administrador', 'Usuario', 'Conductor'];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                ['nombre' => $role], // Evitar duplicados
                ['permisos' => json_encode([])] // Dejamos vacío el campo de permisos
            );
        }
    }
}
