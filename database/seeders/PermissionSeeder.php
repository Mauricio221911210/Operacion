<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear Archivos'
        ]);
        
        Permission::create([
            'name' => 'Leer Archivos'
        ]);

        Permission::create([
            'name' => 'Actualizar Archivos'
        ]);

        Permission::create([
            'name' => 'Eliminar Archivos'
        ]);

        Permission::create([
            'name' => 'Ver dashboard'
        ]);

        Permission::create([
            'name' => 'Crear role'
        ]);

        Permission::create([
            'name' => 'Listar role'
        ]);

        Permission::create([
            'name' => 'Editar role'
        ]);

        Permission::create([
            'name' => 'Eliminar role'
        ]);

        Permission::create([
            'name' => 'Leer Usuarios'
        ]);

        Permission::create([
            'name' => 'Editar Usuario'
        ]); 

        Permission::create([
            'name' => 'Dar Revisión'
        ]); 

        Permission::create([
            'name' => 'Aprobar Archivos'
        ]); 

        Permission::create([
            'name' => 'Dar Observaciones'
        ]); 
    }
}
