<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id_vehiculo');
            $table->string('placa', 20)->unique();
            $table->string('tipo', 50)->nullable();
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->smallInteger('año_fabricacion')->nullable();
            $table->integer('capacidad_pasajeros')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->integer('kilometraje')->default(0);
            $table->enum('estado', ['Activo', 'En mantenimiento', 'En reparación', 'Fuera de servicio', 'Dado de baja'])->default('Activo');
            $table->unsignedInteger('id_linea')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            $table->foreign('id_linea')->references('id_linea')->on('lineas')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
