<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->increments('id_asignacion');
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_vehiculo');
            $table->unsignedInteger('id_linea');
            $table->unsignedInteger('id_turno')->nullable();
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->enum('estado', ['Programado', 'En curso', 'Completado', 'Cancelado'])->default('Programado');
            $table->integer('kilometraje_inicial')->nullable();
            $table->integer('kilometraje_final')->nullable();
            $table->integer('vueltas_completas')->default(0);
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos');
            $table->foreign('id_linea')->references('id_linea')->on('lineas');
            $table->foreign('id_turno')->references('id_turno')->on('turnos')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
