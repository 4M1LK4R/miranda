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
    {    //PERMISOS DE CATALOGOS    
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
            'name'        => 'Crear registros en catalogos',
            'slug'        => 'catalogs.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de catalogos',
            'slug'        => 'catalogs.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de catalogos',
            'slug'        => 'catalogs.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar Industrias',
            'slug'        => 'catalogs.destroy',
            'description' => 'Puede eliminar registro',
        ]);

        ///PERMISOS DE PRODUCTOS
        
        Permission::create([
            'name'        => 'Visualizar Productos',
            'slug'        => 'product',
            'description' => 'Puede navegar en la vista de productos',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Productos',
            'slug'        => 'product.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Productos',
            'slug'        => 'product.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de Productos',
            'slug'        => 'product.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Productos',
            'slug'        => 'product.destroy',
            'description' => 'Puede eliminar registros',
        ]);


        ///PERMISOS DE LOTES
        
        Permission::create([
            'name'        => 'Visualizar Lotes',
            'slug'        => 'batch',
            'description' => 'Puede navegar en la vista de Lotes',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Lotes',
            'slug'        => 'batch.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Lotes',
            'slug'        => 'batch.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de Lotes',
            'slug'        => 'batch.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Lotes',
            'slug'        => 'batch.destroy',
            'description' => 'Puede eliminar registros',
        ]);


         ///PERMISOS DE PROVEEDORES
        
         Permission::create([
            'name'        => 'Visualizar Proveedores',
            'slug'        => 'provider',
            'description' => 'Puede navegar en la vista de Proveedores',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Proveedores',
            'slug'        => 'provider.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Proveedores',
            'slug'        => 'provider.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de ProdProveedores',
            'slug'        => 'provider.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Proveedores',
            'slug'        => 'provider.destroy',
            'description' => 'Puede eliminar registros',
        ]);


        ///PERMISOS DE VENDEDORES
        
        Permission::create([
            'name'        => 'Visualizar Vendedores',
            'slug'        => 'seller',
            'description' => 'Puede navegar en la vista de Vendedores',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Vendedores',
            'slug'        => 'seller.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Vendedores',
            'slug'        => 'seller.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de ProdVendedores',
            'slug'        => 'seller.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Vendedores',
            'slug'        => 'seller.destroy',
            'description' => 'Puede eliminar registros',
        ]);



        ///PERMISOS DE CLIENTES
        
        Permission::create([
            'name'        => 'Visualizar Clientes',
            'slug'        => 'client',
            'description' => 'Puede navegar en la vista de Clientes',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Clientes',
            'slug'        => 'client.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Clientes',
            'slug'        => 'client.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de ProdClientes',
            'slug'        => 'client.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Clientes',
            'slug'        => 'client.destroy',
            'description' => 'Puede eliminar registros',
        ]);

        ///PERMISOS DE COBRADORES
        
        Permission::create([
            'name'        => 'Visualizar Cobradores',
            'slug'        => 'collector',
            'description' => 'Puede navegar en la vista de Cobradores',
        ]);

        Permission::create([
            'name'        => 'Crear registros en Cobradores',
            'slug'        => 'collector.store',
            'description' => 'Puede crear registros',
        ]);

        Permission::create([
            'name'        => 'Editar registro de Cobradores',
            'slug'        => 'collector.edit',
            'description' => 'Puede editar registros',
        ]);

        /*Permission::create([
            'name'        => 'Actualizar registros de ProdCobradores',
            'slug'        => 'collector.update',
            'description' => 'Puede actualizar registros',
        ]);*/

        Permission::create([
            'name'        => 'Eliminar registros de Cobradores',
            'slug'        => 'collector.destroy',
            'description' => 'Puede eliminar registros',
        ]);

        ///////////////////////////////////////
        ////////////////////////////////////////    

        // ROLES//
        $superadmin = Role::create([
            'name'   => 'Administrador del Sitio',
            'slug'   => 'superadmin',
            'description' =>'puede hacer todo en el sistema',
            'special'=> 'all-access'
        ]);
        $manager = Role::create([
            'name'   => 'Manager',
            'slug'   => 'manager',
            'description' =>'administrador general menor'
        ]);
        $guest = Role::create([
            'name'   => 'Invitado',
            'slug'   => 'guest',
            'description' =>'Solo puede ver recursos, pero no participar'
        ]);
        

        //ASIGNAR PERMISOS A LOS ROLES
        $manager->givePermissionTo('industry','line','deposit','zone','catalogs.store','catalogs.edit', 'catalogs.destroy','catalogs.update',
        'product','product.store','product.edit','product.destroy',
        'batch','batch.store','batch.edit','batch.destroy',
        'provider','provider.store','provider.edit','provider.destroy',
        'seller','seller.store','seller.edit','seller.destroy',
        'client','client.store','client.edit','client.destroy',
        'collector','collector.store','collector.edit','collector.destroy'
        );




        $guest->givePermissionTo('industry','line','zone','deposit','product','batch','provider','seller','client','collector');
        

        //CREA EL USUARIOS
        $bytemo = App\User::create([
            'name' => 'bytemo',
            'email'=> 'bytemo@bytemo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('bytemo'),
            'remember_token' => str_random(10)            
        ]);

        $admin = App\User::create([
            'name' => 'administrador',
            'email'=> 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10)            
        ]);

        $invited = App\User::create([
            'name' => 'invitado',
            'email'=> 'winecod3@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('invitado'),
            'remember_token' => str_random(10)            
        ]);


        //ASIGNACION DE ROLES
        $bytemo->assignRoles('superadmin');
        $admin->assignRoles('manager');
        $invited->assignRoles('guest');

    }
}
