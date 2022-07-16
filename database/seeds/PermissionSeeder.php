<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $permission1 = Permission::create(['name' => 'add pdf']);
        $permission2 = Permission::create(['name' => 'show pdf']);
        $permission3 = Permission::create(['name' => 'delete pdf']);
        $permission4 = Permission::create(['name' => 'download pdf']);

        $admin->givePermissionTo($permission1, $permission2, $permission3, $permission4); 
        $user->givePermissionTo($permission2, $permission4); 
    }
}
