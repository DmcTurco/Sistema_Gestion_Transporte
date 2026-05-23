<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre_usuario')->unique();
            $table->string('contrasena');
            $table->string('dni')->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('telefono', 20);
            $table->string('email')->unique();
            $table->unsignedInteger('id_rol');
            $table->boolean('es_conductor')->default(false);
            $table->string('numero_licencia')->nullable();
            $table->string('tipo_licencia', 10)->nullable();
            $table->date('fecha_ingreso');
            $table->enum('estado', ['Activo', 'Inactivo', 'Suspendido', 'Bloqueado'])->default('Activo');
            $table->integer('intentos_fallidos')->default(0);
            $table->timestamp('ultimo_acceso')->nullable();
            $table->rememberToken();
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamp('fecha_modificacion')->nullable();

            // $table->foreign('id_rol')->references('id_rol')->on('roles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
