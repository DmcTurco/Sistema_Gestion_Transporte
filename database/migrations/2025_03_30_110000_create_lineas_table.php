<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->increments('id_linea');
            $table->string('nombre', 100);
            $table->string('color', 20)->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->integer('frecuencia_min')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('estado', ['Activa', 'Inactiva', 'Suspendida'])->default('Activa');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lineas');
    }
};
