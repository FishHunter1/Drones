<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Conductor;
use App\Models\Vehiculo;
use App\Models\Ruta;
use App\Models\ReportesIncidentes;
use App\Models\ReportesMantenimiento;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Ejecutar el seeder de roles existente
        $this->call(RolesSeeder::class);

        // Obtener roles
        $adminRole = \App\Models\Role::where('nombre', 'Administrador')->first();
        $driverRole = \App\Models\Role::where('nombre', 'Conductor')->first();

        // Crear un administrador por defecto
        $admin = Usuario::factory()->create([
            'nombre' => 'Admin',
            'apellido' => 'Principal',
            'email' => 'admin@example.com',
            'role_id' => $adminRole->id,
        ]);

        // Crear conductores
        $conductores = Conductor::factory(5)->create(['admin_id' => $admin->id]);

        // Crear vehículos y asignar conductores
        $vehiculos = Vehiculo::factory(5)->create(function () use ($conductores) {
            return ['conductor_id' => $conductores->random()->id];
        });

        // Crear rutas
        Ruta::factory(10)->create(function () use ($vehiculos, $conductores, $admin) {
            return [
                'vehiculo_id' => $vehiculos->random()->id,
                'conductor_id' => $conductores->random()->id,
                'admin_id' => $admin->id,
            ];
        });

        // Crear reportes de incidentes
        ReportesIncidentes::factory(5)->create([
            'vehiculo_id' => $vehiculos->random()->id,
            'conductor_id' => $conductores->random()->id,
            'admin_id' => $admin->id,
        ]);

        // Crear reportes de mantenimiento
        ReportesMantenimiento::factory(5)->create([
            'vehiculo_id' => $vehiculos->random()->id,
            'admin_id' => $admin->id,
        ]);
        
        Vehiculo::factory()->create([
            'admin_id' => Usuario::where('role_id', 1)->first()->id, // Asigna un administrador
        ]);

    }
}
