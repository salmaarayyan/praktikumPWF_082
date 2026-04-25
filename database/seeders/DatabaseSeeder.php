<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        // User Biasa
        User::create([
            'name' => 'Salmaa Rifhani Rayyan',
            'email' => 'salmaa@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Irza Yaumil Syahrar',
            'email' => 'irza@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password123'),
        ]);
    }
}
