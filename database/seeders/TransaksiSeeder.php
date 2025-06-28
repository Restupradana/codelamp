<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Kursus;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user dengan role 'siswa'
        $siswa = User::where('role', 'siswa')->get();

        // Ambil ID kursus (pastikan kursus sudah diseed dulu)
        $kursus = Kursus::all();

        // Cek jika data tersedia
        if ($siswa->count() < 2 || $kursus->count() < 3) {
            $this->command->warn('Seeder gagal: butuh minimal 2 siswa dan 3 kursus.');
            return;
        }

        DB::table('transaksi')->insert([
            [
                'siswa_id' => $siswa[0]->id,
                'kursus_id' => $kursus[0]->id,
                'status' => 'berhasil',
                'tanggal_transaksi' => Carbon::now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => $siswa[0]->id,
                'kursus_id' => $kursus[1]->id,
                'status' => 'pending',
                'tanggal_transaksi' => Carbon::now()->subDays(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'siswa_id' => $siswa[1]->id,
                'kursus_id' => $kursus[2]->id,
                'status' => 'gagal',
                'tanggal_transaksi' => Carbon::now()->subDays(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
