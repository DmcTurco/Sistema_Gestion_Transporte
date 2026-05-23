<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estaciones_lineas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_linea');
            $table->unsignedInteger('id_estacion');
            $table->integer('orden');
            $table->integer('tiempo_estimado_siguiente')->nullable();
            $table->decimal('distancia_siguiente', 8, 2)->nullable();
            $table->decimal('kilometro_ruta', 8, 2)->nullable();
            $table->string('direccion', 20)->nullable();

            $table->foreign('id_linea')->references('id_linea')->on('lineas')->cascadeOnDelete();
            $table->foreign('id_estacion')->references('id_estacion')->on('estaciones')->cascadeOnDelete();
            $table->unique(['id_linea', 'id_estacion', 'direccion']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estaciones_lineas');
    }
};
