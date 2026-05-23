<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'nombre'      => 'Administrador',
                'descripcion' => 'Acceso total al sistema',
                'permisos'    => json_encode(['usuarios', 'roles', 'vehiculos', 'rutas', 'asignaciones', 'reportes', 'logs']),
            ],
            [
                'nombre'      => 'Supervisor',
                'descripcion' => 'Gestión de operaciones y reportes',
                'permisos'    => json_encode(['vehiculos', 'rutas', 'asignaciones', 'reportes']),
            ],
            [
                'nombre'      => 'Operador',
                'descripcion' => 'Registro y seguimiento de asignaciones',
                'permisos'    => json_encode(['asignaciones', 'vehiculos', 'rutas']),
            ],
            [
                'nombre'      => 'Conductor',
                'descripcion' => 'Visualización de sus propias asignaciones',
                'permisos'    => json_encode(['asignaciones']),
            ],
            [
                'nombre'      => 'Consulta',
                'descripcion' => 'Solo lectura del sistema',
                'permisos'    => json_encode(['reportes']),
            ],
        ];

        foreach ($roles as $rol) {
            DB::table('roles')->updateOrInsert(
                ['nombre' => $rol['nombre']],
                $rol
            );
        }
    }
}
