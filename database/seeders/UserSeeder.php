<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                "name" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin123456"),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        )->assignRole("super-admin");
        User::updateOrCreate(
            [
                "name" => "alaa",
                "email" => "alaa@gmail.com",
                "password" => Hash::make("alaa123456"),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]
        );
        //
    }
}
