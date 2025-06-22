<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class KursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kursus')->insert([
            [
                'tgl_pembuatan' => Carbon::now()->format('Y-m-d'),
                'instruktur' => 'Arpend, S.Pd',
                'judul_kursus' => 'Bahasa Inggris Sehari-hari untuk Percakapan',
                'kategori' => 'Bahasa',
                'harga_kursus' => 240000,
                'status' => 'aktif',
                'cover' => 'gambar3.jpg',
                'vidio' => 'video1.mp4',
                'deskripsi' => 'Pelajari percakapan Bahasa Inggris sehari-hari dengan mudah.',
                'jumlah_siswa' => '36',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tgl_pembuatan' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'instruktur' => 'Anna Taufan',
                'judul_kursus' => 'Pemrograman Web Dasar',
                'kategori' => 'Teknologi',
                'harga_kursus' => 180000,
                'status' => 'aktif',
                'cover' => 'gambar2.jpg',
                'vidio' => 'video2.mp4',
                'deskripsi' => 'Dasar-dasar HTML, CSS dan JavaScript untuk pemula.',
                'jumlah_siswa' => '42',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tgl_pembuatan' => Carbon::now()->subWeek()->format('Y-m-d'),
                'instruktur' => 'Dewi Santika',
                'judul_kursus' => 'Desain Grafis dengan Canva',
                'kategori' => 'Desain',
                'harga_kursus' => 150000,
                'status' => 'aktif',
                'cover' => 'DBS Decoding.png',
                'vidio' => 'video3.mp4',
                'deskripsi' => 'Kursus cepat membuat desain keren tanpa perlu keahlian desain.',
                'jumlah_siswa' => '28',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
