<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscripcionesTable extends Migration
{
    public function up()
    {
        Schema::create('subscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->nullable()->constrained('usuarios')->onDelete('set null');
            $table->enum('tipo', ['barata', 'moderada','cara']);
            $table->integer('cuota');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('subscripciones');
    }
}
