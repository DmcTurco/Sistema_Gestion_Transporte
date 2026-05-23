<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id_mantenimiento');
            $table->unsignedInteger('id_vehiculo');
            $table->string('tipo_mantenimiento', 100);
            $table->text('descripcion')->nullable();
            $table->date('fecha_programada');
            $table->date('fecha_realizada')->nullable();
            $table->decimal('costo', 10, 2)->nullable();
            $table->string('proveedor', 150)->nullable();
            $table->enum('resultado', ['Pendiente', 'Completado', 'Cancelado'])->default('Pendiente');
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
