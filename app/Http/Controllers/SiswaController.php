<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kursus;
use App\Models\KursusSiswa;

class SiswaController extends Controller
{

    // ✅ Menampilkan halaman dashboard siswa
    public function dashboard()
    {
        $siswa = Auth::guard('siswa')->user();
        $kursus = Kursus::all();

        // Ambil leaderboard berdasarkan skor tertinggi, join ke tabel siswa
        $leaderboard = KursusSiswa::with(['siswa', 'kursus'])
            ->orderByDesc('skor')
            ->take(6)
            ->get();

        return view('Siswa.dashboard', compact('siswa', 'kursus', 'leaderboard'));
    }

    // Menampilkan halaman edit profil
    public function edit()
    {
        $siswa = Auth::guard('siswa')->user();
        return view('Siswa.profil', compact('siswa'));
    }

    // Update data siswa
    public function update(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        $request->validate([
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:siswa,email,' . $siswa->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $siswa->nomor_hp = $request->nomor_hp;
        $siswa->email = $request->email;

        if ($request->filled('password')) {
            $siswa->password = bcrypt($request->password);
        }

        $siswa->save();

        return redirect()->route('siswa.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

    // Menampilkan semua kursus yang tersedia
    public function listKursus()
    {
        $kursusList = Kursus::all(); // ini adalah koleksi, jadi jangan namakan $kursus untuk menghindari konflik
        return view('Siswa.tampilan_kursus', compact('kursusList'));
    }

    public function tampilkanKursus($id)
    {
        // ✅ Gunakan 'id' (bukan 'id_kursus')
        $kursus = Kursus::findOrFail($id);

        $materi = [
            'Pengantar Pembelajaran' => ['Kosakata Sehari-hari', 'Video Pembelajaran', 'Quiz'],
            'Pengenalan Bahasa' => ['Dasar-dasar kosakata dan kalimat sederhana'],
            'Percakapan Dasar' => ['Simulasi percakapan dalam kehidupan sehari-hari'],
            'Keterampilan Menengah' => ['Latihan untuk kefasihan berbicara dan menulis']
        ];

        return view('Siswa.detail_kursus', compact('kursus', 'materi'));
    }

    // ✅ Proses pembelian kursus oleh siswa
    public function beliKursus($id)
    {
        $siswa = Auth::guard('siswa')->user();

        // Cek apakah kursus sudah dibeli
        $sudahBeli = KursusSiswa::where('siswa_id', $siswa->id)
            ->where('kursus_id', $id)
            ->exists();

        if ($sudahBeli) {
            return redirect()->back()->with('info', 'Kursus ini sudah kamu beli.');
        }

        // Simpan ke pivot table
        KursusSiswa::create([
            'siswa_id' => $siswa->id,
            'kursus_id' => $id,
        ]);

        return redirect()->route('siswa.kursus_dibeli')->with('success', 'Kursus berhasil dibeli!');
    }

    // ✅ Menampilkan semua kursus yang telah dibeli oleh siswa
    public function kursusDibeli()
    {
        $siswa = Auth::guard('siswa')->user();

        // Pastikan relasi kursus() sudah ada di model Siswa
        $kursusDibeli = $siswa->kursus()->get();

        return view('Siswa.kursus_dibeli', compact('kursusDibeli'));
    }
}
