<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Utama',
            'nomor_hp' => '081234567890',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // atau bcrypt('password')
            'email_verified_at' => now(),
        ]);

        // Instruktur
        User::create([
            'name' => 'Instruktur Satu',
            'nomor_hp' => '081234567891',
            'role' => 'instruktur',
            'email' => 'instruktur@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Siswa
        User::create([
            'name' => 'Siswa Pertama',
            'nomor_hp' => '081234567892',
            'role' => 'siswa',
            'email' => 'siswa@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
