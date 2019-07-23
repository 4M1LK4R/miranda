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
            'catalog_zone_id'=>10,
            'catalog_client_id'=>3,
            'nit' => 7159779,
            'name' => 'agustin ayaviri',
            'description' => 'cliente de tarija',
            'phone' => 72954379,
            'address' => 'salamanca'
        ]);
    }
}
