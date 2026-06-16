<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Wajib di-import untuk hashing password

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'role' => 'admin',
            'password' => Hash::make('admin'), // Menggunakan Hash demi keamanan auth Laravel
        ]);

        User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'status' => 'active',
            'role' => 'staff',
            'password' => Hash::make('staff'),
        ]);
    }
}