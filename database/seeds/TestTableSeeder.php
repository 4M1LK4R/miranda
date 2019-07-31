<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ALMACÉN
        App\Catalogue::create([
            'name' => 'ALMACÉN PRINCIPAL',
            'type_catalog_id'=>2,
            'description' => 'ALMACÉN PRINCIPA.',
            'state' => 'ACTIVO'
        ]);
        // LÍNEA
        App\Catalogue::create([
            'name' => 'INTI',
            'type_catalog_id'=>4,
            'description' => 'INTI.',
            'state' => 'ACTIVO'
        ]);
        // PRODUCTO
        App\Product::create([
            'name' => 'ASPIRINA PRUEBA 100 gr.',
            'catalog_product_id'=>1,
            'description' => 'DESCRIPCIÓN ASPIRINA PRUEBA 100 gr.',
            'state' => 'ACTIVO'
        ]);
        // PROVEEDOR
        App\Provider::create([
            'name' => 'PROVEEDOR 1',
            'catalog_zone_id'=>3,
            'description' => 'DESCRIPCIÓN PROVEEDOR 1.',
            'contact' => 'GABRIELA',
            'phone' => '4567891',
            'address' => 'AV. TARIJA NRO. 225',
            'state' => 'ACTIVO'
        ]);
        // CLIENTE
        App\Client::create([
            'catalog_zone_id'=>10,
            'nit' => 7159779,
            'name' => 'FARMACENTER',
            'description' => 'CLIENTE DE TARIJA.',
            'phone' => '72954379',
            'address' => 'AEROPUERTO',
            'state' => 'ACTIVO'

        ]);
        // VENDEDOR
        App\Seller::create([
            'name' => 'SR. VENDEDOR 1',
            'description' => 'SR. VENDEDOR 1.',
            'phone' => '101010',
            'address' => 'AV. TARIJA NRO. 225',
            'state' => 'ACTIVO'
        ]);
    }
}
