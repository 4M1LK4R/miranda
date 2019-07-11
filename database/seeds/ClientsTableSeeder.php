<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Client::create([
            'id_catalog_zone'=>10,
            'id_catalog_client'=>3,
            'nit' => 7159779,
            'name' => 'agustin ayaviri',
            'description' => 'cliente de tarija',
            'phone' => 72954379,
            'address' => 'salamanca'
        ]);
    }
}
