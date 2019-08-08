<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

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
        Role::create([
            'name'   => 'Admin',
            'slug'   => 'admin',
            'special'=> 'all-access'
        ]);

        //$roles[1]->permissions()->attach($permission['access']);
        //$user[1]->roles()->attach($roles[1]);


    }
}
