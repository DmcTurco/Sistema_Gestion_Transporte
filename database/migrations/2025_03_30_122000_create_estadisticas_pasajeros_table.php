<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estadisticas_pasajeros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_linea')->nullable();
            $table->unsignedInteger('id_estacion')->nullable();
            $table->date('fecha');
            $table->integer('cantidad_entradas')->default(0);
            $table->integer('cantidad_salidas')->default(0);
            $table->timestamp('fecha_creacion')->nullable();

            $table->foreign('id_linea')->references('id_linea')->on('lineas')->nullOnDelete();
            $table->foreign('id_estacion')->references('id_estacion')->on('estaciones')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estadisticas_pasajeros');
    }
};
