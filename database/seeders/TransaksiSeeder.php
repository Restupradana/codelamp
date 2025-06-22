<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksis')->insert([
            [
                'siswa_id' => 1,
                'kursus_id' => 1,
                'status' => 'berhasil',
                'tanggal_transaksi' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => 1,
                'kursus_id' => 2,
                'status' => 'pending',
                'tanggal_transaksi' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => 2,
                'kursus_id' => 3,
                'status' => 'gagal',
                'tanggal_transaksi' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
