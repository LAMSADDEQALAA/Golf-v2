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
        Permission::updateOrCreate(['name' => 'view-user']);
        Permission::updateOrCreate(['name' => 'edit-user']);
        Permission::updateOrCreate(['name' => 'add-user']);
        Permission::updateOrCreate(['name' => 'delete-user']);
        Permission::updateOrCreate(['name' => 'assign-user-role']);
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
        Permission::updateOrCreate(['name' => 'add-role']);
        Permission::updateOrCreate(['name' => 'delete-role']);
        Permission::updateOrCreate(['name' => 'Update-role-permissions']);
        Permission::updateOrCreate(['name' => 'view-role']);
    }
}
