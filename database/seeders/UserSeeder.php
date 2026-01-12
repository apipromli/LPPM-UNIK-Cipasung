<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin LPPM',
            'email' => 'admin@lppm.unik.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Demo',
            'email' => 'user@lppm.unik.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
