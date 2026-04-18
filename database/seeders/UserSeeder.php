<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@lppm.unik.ac.id'],
            [
                'name'     => 'Admin LPPM',
                'password' => Hash::make('admin@lppm2025'),
                'role'     => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'demo@lppm.unik.ac.id'],
            [
                'name'     => 'User Demo',
                'password' => Hash::make('demo123'),
                'role'     => 'user',
            ]
        );
    }
}
