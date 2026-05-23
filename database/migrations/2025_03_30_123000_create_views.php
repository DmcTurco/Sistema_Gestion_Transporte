<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW v_proximas_asignaciones AS
            SELECT
                a.id_asignacion,
                a.fecha,
                a.hora_inicio,
                a.hora_fin,
                a.estado,
                u.nombre || ' ' || u.apellidos AS conductor,
                v.placa,
                l.nombre AS linea
            FROM asignaciones a
            JOIN usuarios u ON a.id_usuario = u.id_usuario
            JOIN vehiculos v ON a.id_vehiculo = v.id_vehiculo
            JOIN lineas l ON a.id_linea = l.id_linea
            WHERE a.estado IN ('Programado', 'En curso')
            ORDER BY a.fecha, a.hora_inicio
        ");

        DB::statement("
            CREATE OR REPLACE VIEW v_estado_flota AS
            SELECT
                COUNT(*) AS total,
                SUM(CASE WHEN estado = 'Activo' THEN 1 ELSE 0 END) AS activos,
                SUM(CASE WHEN estado = 'En mantenimiento' THEN 1 ELSE 0 END) AS en_mantenimiento,
                SUM(CASE WHEN estado = 'En reparación' THEN 1 ELSE 0 END) AS en_reparacion,
                SUM(CASE WHEN estado = 'Fuera de servicio' THEN 1 ELSE 0 END) AS fuera_de_servicio,
                SUM(CASE WHEN estado = 'Dado de baja' THEN 1 ELSE 0 END) AS dados_de_baja
            FROM vehiculos
        ");
    }

    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS v_proximas_asignaciones');
        DB::statement('DROP VIEW IF EXISTS v_estado_flota');
    }
};
