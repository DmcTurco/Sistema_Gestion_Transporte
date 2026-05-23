<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->increments('id_turno');
            $table->string('nombre', 100);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->text('descripcion')->nullable();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
