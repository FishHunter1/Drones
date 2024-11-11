<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->integer('año');
            $table->enum('estatus', ['activo', 'inactivo', 'mantenimiento']);
            $table->string('tipo_combustible')->nullable(false);
            $table->integer('kilometraje');
            $table->date('fecha_integracion');
            // Relación con el conductor
            $table->foreignId('conductor_id')
                ->nullable()
                ->constrained('conductores')
                ->onDelete('set null');
            // Relación con el administrador
            $table->foreignId('admin_id')
                ->constrained('usuarios')
                ->onDelete('cascade'); // Eliminar vehículos si el administrador es eliminado

            $table->double('longitud');
            $table->double('latitud');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
