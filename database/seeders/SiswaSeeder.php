<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            [
                'nama_lengkap' => 'Andi Saputra',
                'nomor_hp' => '081234567890',
                'email' => 'andi@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Budi Santoso',
                'nomor_hp' => '082345678901',
                'email' => 'budi@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
