<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\Kursus;
use App\Models\TujuanKursus;
use App\Models\MateriKursus;
use App\Models\SubMateri;

class KursusSeeder extends Seeder
{
    public function run(): void
    {
        $kursusList = [
            [
                'judul_kursus' => 'Bahasa Inggris Sehari-hari untuk Percakapan',
                'tgl_pembuatan' => Carbon::now(),
                'instruktur' => 'Arpend, S.Pd',
                'kategori' => 'Bahasa',
                'harga_kursus' => 240000,
                'status' => 'aktif',
                'cover' => 'gambar3.jpg',
                'vidio' => 'video1.mp4',
                'deskripsi' => 'Pelajari percakapan Bahasa Inggris sehari-hari dengan mudah.',
                'jumlah_siswa' => 36,
                'tujuan' => [
                    'Meningkatkan kemampuan berbicara dan memahami bahasa Inggris dalam konteks sehari-hari.',
                    'Meningkatkan kepercayaan diri dalam berbicara bahasa Inggris.',
                    'Memahami tata bahasa dasar dan memperluas kosakata.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengantar Pembelajaran',
                        'deskripsi' => 'Dasar penting sebelum memulai kursus',
                        'sub_materi' => [
                            'Perkenalan Kursus',
                            'Cara Belajar Efektif',
                            'Mengenal Fitur Platform',
                        ],
                    ],
                    [
                        'judul' => 'Pengenalan Bahasa',
                        'deskripsi' => 'Dasar-dasar bahasa Inggris',
                        'sub_materi' => [
                            'Abjad dan Pelafalan',
                            'Salam dan Perkenalan Diri',
                            'Kata Ganti Orang',
                        ],
                    ],
                    [
                        'judul' => 'Percakapan Dasar',
                        'deskripsi' => 'Latihan berbicara dengan topik sehari-hari',
                        'sub_materi' => [
                            'Memesan Makanan',
                            'Bertanya Arah',
                            'Berbelanja',
                        ],
                    ],
                ],
            ],
            [
                'judul_kursus' => 'Pemrograman Web Dasar',
                'tgl_pembuatan' => Carbon::now()->subDays(2),
                'instruktur' => 'Anna Taufan',
                'kategori' => 'Teknologi',
                'harga_kursus' => 180000,
                'status' => 'aktif',
                'cover' => 'gambar2.jpg',
                'vidio' => 'video2.mp4',
                'deskripsi' => 'Dasar-dasar HTML, CSS dan JavaScript untuk pemula.',
                'jumlah_siswa' => 42,
                'tujuan' => [
                    'Menguasai struktur dasar HTML dan CSS.',
                    'Membuat halaman web sederhana.',
                    'Memahami dasar JavaScript untuk interaktivitas.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengenalan Web',
                        'deskripsi' => 'Apa itu web dan cara kerjanya',
                        'sub_materi' => [
                            'Sejarah dan Struktur Web',
                            'Apa itu Browser dan Server',
                        ],
                    ],
                    [
                        'judul' => 'Dasar HTML',
                        'deskripsi' => 'Membangun struktur halaman',
                        'sub_materi' => [
                            'Elemen dan Tag Dasar',
                            'Form dan Input',
                            'Hyperlink dan Gambar',
                        ],
                    ],
                    [
                        'judul' => 'CSS Dasar',
                        'deskripsi' => 'Menata tampilan halaman',
                        'sub_materi' => [
                            'Selektor dan Properti',
                            'Box Model',
                            'Layout dengan Flexbox',
                        ],
                    ],
                ],
            ],
            [
                'judul_kursus' => 'Desain Grafis dengan Canva',
                'tgl_pembuatan' => Carbon::now()->subWeek(),
                'instruktur' => 'Dewi Santika',
                'kategori' => 'Desain',
                'harga_kursus' => 150000,
                'status' => 'aktif',
                'cover' => 'DBS Decoding.png',
                'vidio' => 'video3.mp4',
                'deskripsi' => 'Kursus cepat membuat desain keren tanpa perlu keahlian desain.',
                'jumlah_siswa' => 28,
                'tujuan' => [
                    'Mengenal prinsip dasar desain grafis.',
                    'Membuat desain visual menarik dengan Canva.',
                    'Mengembangkan kreativitas visual.',
                ],
                'materi' => [
                    [
                        'judul' => 'Pengenalan Canva',
                        'deskripsi' => 'Langkah awal menggunakan Canva',
                        'sub_materi' => [
                            'Membuat Akun Canva',
                            'Navigasi Dasar',
                        ],
                    ],
                    [
                        'judul' => 'Dasar Desain Visual',
                        'deskripsi' => 'Teori dan praktik desain',
                        'sub_materi' => [
                            'Prinsip Desain',
                            'Warna dan Tipografi',
                        ],
                    ],
                    [
                        'judul' => 'Praktik Desain',
                        'deskripsi' => 'Membuat desain nyata',
                        'sub_materi' => [
                            'Poster Promosi',
                            'Konten Media Sosial',
                            'Sertifikat Digital',
                        ],
                    ],
                ],
            ],
        ];

        foreach ($kursusList as $kursusIndex => $kursus) {
            $kursusModel = Kursus::create([
                'tgl_pembuatan' => $kursus['tgl_pembuatan'],
                'instruktur' => $kursus['instruktur'],
                'judul_kursus' => $kursus['judul_kursus'],
                'kategori' => $kursus['kategori'],
                'harga_kursus' => $kursus['harga_kursus'],
                'status' => $kursus['status'],
                'cover' => $kursus['cover'],
                'vidio' => $kursus['vidio'],
                'deskripsi' => $kursus['deskripsi'],
                'jumlah_siswa' => $kursus['jumlah_siswa'],
            ]);

            foreach ($kursus['tujuan'] as $tujuan) {
                TujuanKursus::create([
                    'kursus_id' => $kursusModel->id,
                    'deskripsi' => $tujuan,
                ]);
            }

            foreach ($kursus['materi'] as $materiIndex => $materi) {
                $materiModel = MateriKursus::create([
                    'kursus_id' => $kursusModel->id,
                    'judul' => $materi['judul'],
                    'deskripsi' => $materi['deskripsi'],
                    'urutan' => $materiIndex + 1,
                ]);

                foreach ($materi['sub_materi'] as $subIndex => $judulSub) {
                    SubMateri::create([
                        'materi_kursus_id' => $materiModel->id,
                        'judul' => $judulSub,
                        'urutan' => $subIndex + 1,
                    ]);
                }
            }
        }
    }
}
