<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use App\Models\Mentor;
use App\Models\Pertanyaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JawabanSeeder extends Seeder
{
    public function run()
    {
        // 1. Buat 1 mentor dummy
        $mentor = Mentor::create([
            'nama' => 'Mentor Satu',
            'email' => 'mentor@example.com',
            'password' => Hash::make('password'), // gunakan bcrypt untuk keamanan
        ]);

        // 2. Ambil semua pertanyaan dan beri jawaban dummy
        $pertanyaans = Pertanyaan::all();

        foreach ($pertanyaans as $pertanyaan) {
            Jawaban::create([
                'pertanyaan_id' => $pertanyaan->id,
                'mentor_id' => $mentor->id,
                'isi_jawaban' => 'Terima kasih atas pertanyaannya. Berikut penjelasannya terkait: "' . $pertanyaan->isi . '"',
            ]);
        }
    }
}
