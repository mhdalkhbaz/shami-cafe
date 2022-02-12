<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;


class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Permission::create(['name' => 'add product']);
        // Permission::create(['name' => 'edit product']);
        // Permission::create(['name' => 'view product']);
        // Permission::create(['name' => 'view readyprodect']);


        // $role1 = Role::create(['name' => 'admin']);
    //     $role1 = Role::find('1');
        // $role3 = Role::create(['name' => 'labuser']);

        // $role2->givePermissionTo('add product');
     //$role1->givePermissionTo('view product');

        // $role2 = Role;
       // $role3->revokePermissionTo('add product');
    
        // $role2->revokePermissionTo('add product');
     
        // $user->assignRole($role1);
    }
}
