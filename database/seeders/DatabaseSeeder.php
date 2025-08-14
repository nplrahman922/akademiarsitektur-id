<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'Admin@example.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'User@example.com',
            'password' => 'user123',
            'role' => 'user',
        ]);
    }
}
