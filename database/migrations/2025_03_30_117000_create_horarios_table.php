<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id_horario');
            $table->unsignedInteger('id_linea');
            $table->unsignedInteger('id_estacion');
            $table->tinyInteger('dia_semana'); // 1=Lunes, 7=Domingo
            $table->time('hora');
            $table->enum('tipo_hora', ['Salida', 'Llegada', 'Paso'])->default('Salida');
            $table->boolean('es_feriado')->default(false);
            $table->string('tipo_servicio', 50)->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            $table->foreign('id_linea')->references('id_linea')->on('lineas')->cascadeOnDelete();
            $table->foreign('id_estacion')->references('id_estacion')->on('estaciones')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
