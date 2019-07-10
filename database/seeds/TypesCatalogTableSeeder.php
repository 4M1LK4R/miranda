<?php

use Illuminate\Database\Seeder;

class TypesCatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\TypeCatalog::create([
            'name' => 'MARCA',
            'description' => 'Marca de Productos.',
            'state' => 'ACTIVO'
        ]);
        App\TypeCatalog::create([
            'name' => 'TIPO',
            'description' => 'Tipo de Productos.',
            'state' => 'ACTIVO'
        ]);
        App\TypeCatalog::create([
            'name' => 'INDUSTRIA',
            'description' => 'Industria de Productos.',
            'state' => 'ACTIVO'
        ]);
        App\TypeCatalog::create([
            'name' => 'ALMACEN',
            'description' => 'Almacen de Productos.',
            'state' => 'ACTIVO'
        ]);
    }
}
