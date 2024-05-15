<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'Admin',
            'password' => 'Abc@123',
            'user_roles_code' => 'Owner'
        ]);

        User::create([
            'name' => 'Cashier',
            'username' => 'Cashier',
            'password' => 'Abc@123',
            'user_roles_code' => 'Cashier'
        ]);

        User::create([
            'name' => 'Manager',
            'username' => 'Manager',
            'password' => 'Abc@123',
            'user_roles_code' => 'Manager'
        ]);
        UserRoles::create([
            'code' => 'Admin',
            'description' => 'Admin',
            'status' => 'A',
        ]);

        UserRoles::create([
            'code' => 'Cashier',
            'description' => 'Cashier',
            'status' => 'A',
        ]);

        UserRoles::create([
            'code' => 'Owner',
            'description' => 'Owner',
            'status' => 'A',
        ]);
    }
}
