<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email');
            $table->string('contraseña');
            $table->string('direccion');
            $table->string('telefono', 15);
            $table->foreignId('rol_id')->default(2)->constrained('roles')->onDelete('set null'); // El valor 2 es solo un ejemplo, cámbialo según el rol que quieras.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
