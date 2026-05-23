<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $idRolAdmin = DB::table('roles')->where('nombre', 'Administrador')->value('id_rol');

        DB::table('usuarios')->updateOrInsert(
            ['nombre_usuario' => 'admin'],
            [
                'nombre_usuario'   => 'admin',
                'contrasena'       => Hash::make('admin123'),
                'dni'              => '00000000',
                'nombre'           => 'Administrador',
                'apellidos'        => 'Sistema',
                'fecha_nacimiento' => '1990-01-01',
                'direccion'        => 'Oficina Central',
                'telefono'         => '000000000',
                'email'            => 'admin@sistema.com',
                'id_rol'           => $idRolAdmin,
                'es_conductor'     => false,
                'fecha_ingreso'    => now()->toDateString(),
                'estado'           => 'Activo',
                'intentos_fallidos'=> 0,
            ]
        );
    }
}
