<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registros_gps', function (Blueprint $table) {
            $table->increments('id_registro');
            $table->unsignedInteger('id_vehiculo');
            $table->unsignedInteger('id_asignacion')->nullable();
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 11, 8);
            $table->decimal('velocidad', 6, 2)->nullable();
            $table->decimal('direccion', 5, 2)->nullable();
            $table->timestamp('timestamp');
            $table->unsignedInteger('id_estacion_cercana')->nullable();
            $table->decimal('distancia_estacion', 8, 2)->nullable();
            $table->decimal('kilometro_ruta', 8, 2)->nullable();
            $table->string('direccion_ruta', 20)->nullable();
            $table->integer('vuelta_actual')->nullable();
            $table->enum('estado_vehiculo', ['En movimiento', 'Detenido', 'En estación', 'Fuera de ruta'])->nullable();
            $table->timestamp('fecha_creacion')->nullable();

            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->cascadeOnDelete();
            $table->foreign('id_asignacion')->references('id_asignacion')->on('asignaciones')->nullOnDelete();
            $table->foreign('id_estacion_cercana')->references('id_estacion')->on('estaciones')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registros_gps');
    }
};
