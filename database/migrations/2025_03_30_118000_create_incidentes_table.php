<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id_incidente');
            $table->unsignedInteger('id_asignacion')->nullable();
            $table->unsignedInteger('id_estacion')->nullable();
            $table->string('tipo_incidente', 100);
            $table->text('descripcion');
            $table->timestamp('fecha_hora');
            $table->enum('estado', ['Reportado', 'En atención', 'Resuelto', 'Escalado'])->default('Reportado');
            $table->enum('impacto', ['Bajo', 'Medio', 'Alto', 'Crítico'])->default('Medio');
            $table->integer('retraso_estimado')->nullable();
            $table->text('resolucion')->nullable();
            $table->timestamp('fecha_resolucion')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            $table->foreign('id_asignacion')->references('id_asignacion')->on('asignaciones')->nullOnDelete();
            $table->foreign('id_estacion')->references('id_estacion')->on('estaciones')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('incidentes');
    }
};
