<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pertanyaans')->insert([
            [
                'siswa_id' => 1,
                'isi' => 'Apa saja materi yang dibahas dalam kursus ini?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'siswa_id' => 2,
                'isi' => 'Apakah kursus ini cocok untuk pemula?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'siswa_id' => 1,
                'isi' => 'Bagaimana saya bisa mengakses video setelah membeli kursus?',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
        ]);
    }
}
