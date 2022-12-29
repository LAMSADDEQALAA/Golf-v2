<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        //user perms
        Permission::create(['name' => 'view-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'add-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'assign-user-roles']);
        //ville perms
        Permission::create(['name' => 'view-Ville']);
        Permission::create(['name' => 'edit-Ville']);
        Permission::create(['name' => 'add-Ville']);
        Permission::create(['name' => 'delete-Ville']);
        //terrain perms
        Permission::create(['name' => 'view-terrain']);
        Permission::create(['name' => 'edit-terrain']);
        Permission::create(['name' => 'add-terrain']);
        Permission::create(['name' => 'delete-terrain']);
        //role perms
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'add-roles']);
        Permission::create(['name' => 'delete-role']);
        Permission::create(['name' => 'Update-role-permissions']);
        Permission::create(['name' => 'view-role']);
    }
}
