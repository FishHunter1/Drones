<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateReporteMantenimientoTable extends Migration
{
    public function up()
    {
        Schema::create('reporte_mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->nullable()->constrained('vehiculos')->onDelete('set null');
            $table->date('fecha');
            $table->string('tipo');
            $table->string('descripcion');
            $table->string('proveedor');
            $table->integer('precio');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('reporte_mantenimiento');
    }
}
