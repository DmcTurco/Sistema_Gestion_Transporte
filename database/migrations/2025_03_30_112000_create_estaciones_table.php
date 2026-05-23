<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estaciones', function (Blueprint $table) {
            $table->increments('id_estacion');
            $table->string('nombre', 100);
            $table->string('direccion')->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->integer('capacidad_maxima')->nullable();
            $table->boolean('es_terminal')->default(false);
            $table->enum('estado', ['Activa', 'Inactiva', 'En mantenimiento'])->default('Activa');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estaciones');
    }
};
