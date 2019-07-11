<?php

use Illuminate\Database\Seeder;

class CataloguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TIPO DE PRODUCTO
        App\Catalogue::create([
            'name' => 'MEDICAMENTO',
            'type_catalog_id'=>1,
            'description' => 'TIPO DE PRODUCTO MEDICAMENTO.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'INSUMO',
            'type_catalog_id'=>1,
            'description' => 'TIPO DE PRODUCTO INSUMO.',
            'state' => 'ACTIVO'
        ]);



        //TIPO DE CLIENTE
        App\Catalogue::create([
            'name' => 'MINORISTA',
            'type_catalog_id'=>5,
            'description' => 'TIPO DE CLIENTE MINORISTA.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'MAYORISTA',
            'type_catalog_id'=>5,
            'description' => 'TIPO DE CLIENTE MAYORISTA.',
            'state' => 'ACTIVO'
        ]);


        // ESTADO DE PAGO
        App\Catalogue::create([
            'name' => 'PENDIENTE',
            'type_catalog_id'=>7,
            'description' => 'ESTADO DE PAGO PENDIENTE.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'CANCELADO',
            'type_catalog_id'=>7,
            'description' => 'ESTADO DE PAGO CANCELADO.',
            'state' => 'ACTIVO'
        ]);


        //TIPO DE PAGO
        App\Catalogue::create([
            'name' => 'CRÉDITO',
            'type_catalog_id'=>8,
            'description' => 'TIPO DE PAGO CRÉDITO.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'DÉBITO',
            'type_catalog_id'=>8,
            'description' => 'TIPO DE PAGO DÉBITO.',
            'state' => 'ACTIVO'
        ]);

        //ALMACENES

        
        //ZONAS
        App\Catalogue::create([
            'name' => 'VILLAMONTES-TARIJA',
            'type_catalog_id'=>3,
            'description' => 'ZONA DE TARIJA.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'BERMEJO-TARIJA',
            'type_catalog_id'=>3,
            'description' => 'ZONA DE TARIJA.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'CAMIRI-TARIJA',
            'type_catalog_id'=>3,
            'description' => 'ZONA DE TARIJA.',
            'state' => 'ACTIVO'
        ]);
        App\Catalogue::create([
            'name' => 'VILLAZON-POTOSI',
            'type_catalog_id'=>3,
            'description' => 'ZONA DE POTOSI.',
            'state' => 'ACTIVO'
        ]);
    }
}
