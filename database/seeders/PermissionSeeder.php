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
        Permission::updateOrCreate(['name' => 'view-users']);
        Permission::updateOrCreate(['name' => 'edit-users']);
        Permission::updateOrCreate(['name' => 'add-users']);
        Permission::updateOrCreate(['name' => 'delete-users']);
        Permission::updateOrCreate(['name' => 'assign-user-roles']);
        //ville perms
        Permission::updateOrCreate(['name' => 'view-Ville']);
        Permission::updateOrCreate(['name' => 'edit-Ville']);
        Permission::updateOrCreate(['name' => 'add-Ville']);
        Permission::updateOrCreate(['name' => 'delete-Ville']);
        //terrain perms
        Permission::updateOrCreate(['name' => 'view-terrain']);
        Permission::updateOrCreate(['name' => 'edit-terrain']);
        Permission::updateOrCreate(['name' => 'add-terrain']);
        Permission::updateOrCreate(['name' => 'delete-terrain']);
        //role perms
        Permission::updateOrCreate(['name' => 'edit-role']);
        Permission::updateOrCreate(['name' => 'add-roles']);
        Permission::updateOrCreate(['name' => 'delete-role']);
        Permission::updateOrCreate(['name' => 'Update-role-permissions']);
        Permission::updateOrCreate(['name' => 'view-role']);
    }
}
