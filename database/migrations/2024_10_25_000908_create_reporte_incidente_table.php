<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteIncidenteTable extends Migration
{
    public function up()
    {
        Schema::create('reporte_incidente', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('reporte_daños');
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculos')->onDelete('set null');
            $table->foreignId('conductor_id')->nullable()->constrained('conductores')->onDelete('set null');
            $table->foreignId('admin_id')->constrained('usuarios')->onDelete('cascade'); // Relación con el administrador que crea el reporte
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reporte_incidente');
    }
}
