<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Agustin Ayaviri',
            'email'=> 'winecod3@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10)            
        ]);
    }
}
