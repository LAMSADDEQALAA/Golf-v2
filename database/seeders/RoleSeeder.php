<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPerms = [
            "view-role",
            "view-user",
            "view-Ville",
            "view-terrain",
            "add-role",
            "add-user",
            "add-Ville",
            "add-terrain",
            "edit-role",
            "edit-user",
            "edit-Ville",
            "edit-terrain",
            "delete-role",
            "delete-user",
            "delete-Ville",
            "delete-terrain",
        ];
        $userPerms = [
            "view-Ville",
            "view-terrain",
        ];
        Role::updateOrCreate(['name' => "super-admin"]);
        Role::updateOrCreate(['name' => "admin"])->syncPermissions($adminPerms);
        Role::updateOrCreate(['name' => "user"])->syncPermissions($userPerms);
    }
}
