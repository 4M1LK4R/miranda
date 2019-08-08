<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permisos de catalogos
        Permission::create([
            'name'        => 'Visualizar Industria',
            'slug'        => 'industry',
            'description' => 'Puede navegar en la vista de Industria de Productos',
        ]);
        Permission::create([
            'name'        => 'Visualizar Linea',
            'slug'        => 'line',
            'description' => 'Puede navegar en la vista de Lineas de Productos',
        ]);
        Permission::create([
            'name'        => 'Visualizar Depositos',
            'slug'        => 'deposit',
            'description' => 'Puede navegar en la vista de Depositos de Productos',
        ]);
        Permission::create([
            'name'        => 'Visualizar Zonas',
            'slug'        => 'zone',
            'description' => 'Puede navegar en la vista de Zonas',
        ]);
        

        Permission::create([
            'name'        => 'Crea Industria',
            'slug'        => 'catalogs.store',
            'description' => 'Puede crear registros de Industrias',
        ]);

        Permission::create([
            'name'        => 'Editar Industrias',
            'slug'        => 'catalogs.edit',
            'description' => 'Puede editar registros de industria',
        ]);

        Permission::create([
            'name'        => 'Actualizar Industrias',
            'slug'        => 'catalogs.update',
            'description' => 'Puede actualizar registros de industria',
        ]);

        Permission::create([
            'name'        => 'Eliminar Industrias',
            'slug'        => 'catalogs.destroy',
            'description' => 'Puede eliminar registro de  Industria',
        ]);
    }
}
