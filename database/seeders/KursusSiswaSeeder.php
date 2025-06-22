<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KursusSiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kursus_siswa')->insert([
            [
                'siswa_id' => 1,
                'kursus_id' => 1,
                'skor' => '85',
                'status' => 'aktif',
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'siswa_id' => 1,
                'kursus_id' => 2,
                'skor' => '90',
                'status' => 'selesai',
                'tanggal_masuk' => Carbon::now()->subDays(10)->toDateString(),
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'siswa_id' => 2,
                'kursus_id' => 1,
                'skor' => '78',
                'status' => 'aktif',
                'tanggal_masuk' => Carbon::now()->subDays(5)->toDateString(),
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(1),
            ],
        ]);
    }
}
