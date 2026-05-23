<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recorridos', function (Blueprint $table) {
            $table->increments('id_recorrido');
            $table->unsignedInteger('id_asignacion');
            $table->unsignedInteger('id_vehiculo');
            $table->unsignedInteger('id_linea');
            $table->integer('numero_vuelta')->default(1);
            $table->string('direccion_inicial', 20)->nullable();
            $table->timestamp('hora_inicio')->nullable();
            $table->timestamp('hora_fin')->nullable();
            $table->decimal('kilometraje_vuelta', 8, 2)->nullable();
            $table->unsignedInteger('estacion_inicio')->nullable();
            $table->unsignedInteger('estacion_fin')->nullable();
            $table->integer('tiempo_estimado')->nullable();
            $table->integer('tiempo_real')->nullable();
            $table->integer('diferencia_tiempo')->nullable();
            $table->enum('estado', ['En curso', 'Completado', 'Interrumpido'])->default('En curso');
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_creacion')->nullable();

            $table->foreign('id_asignacion')->references('id_asignacion')->on('asignaciones')->cascadeOnDelete();
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos');
            $table->foreign('id_linea')->references('id_linea')->on('lineas');
            $table->foreign('estacion_inicio')->references('id_estacion')->on('estaciones')->nullOnDelete();
            $table->foreign('estacion_fin')->references('id_estacion')->on('estaciones')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recorridos');
    }
};
