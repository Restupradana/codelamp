<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kursus;
use App\Models\User;
use App\Models\KursusSiswa;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $siswa = Auth::user();
        $kursus = Kursus::all();

        $leaderboard = KursusSiswa::with(['siswa', 'kursus'])
            ->orderByDesc('skor')
            ->take(6)
            ->get();

        return view('Siswa.dashboard', compact('siswa', 'kursus', 'leaderboard'));
    }

    public function edit()
    {
        $siswa = Auth::user();
        return view('Siswa.profil', compact('siswa'));
    }

    public function update(Request $request)
    {
        $siswa = Auth::user();

        $request->validate([
            'nomor_hp' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $siswa->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $siswa->nomor_hp = $request->nomor_hp;
        $siswa->email = $request->email;

        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->save();

        return redirect()->route('siswa.dashboard')->with('success', 'Profil berhasil diperbarui.');
    }

    public function listKursus()
    {
        $kursusList = Kursus::all();
        return view('Siswa.tampilan_kursus', compact('kursusList'));
    }

    public function tampilkanKursus($id)
    {
        $kursus = Kursus::findOrFail($id);

        $materi = [
            'Pengantar Pembelajaran' => ['Kosakata Sehari-hari', 'Video Pembelajaran', 'Quiz'],
            'Pengenalan Bahasa' => ['Dasar-dasar kosakata dan kalimat sederhana'],
            'Percakapan Dasar' => ['Simulasi percakapan dalam kehidupan sehari-hari'],
            'Keterampilan Menengah' => ['Latihan untuk kefasihan berbicara dan menulis']
        ];

        return view('Siswa.detail_kursus', compact('kursus', 'materi'));
    }

    public function beliKursus($id)
    {
        $siswa = Auth::user();

        $sudahBeli = KursusSiswa::where('siswa_id', $siswa->id)
            ->where('kursus_id', $id)
            ->exists();

        if ($sudahBeli) {
            return redirect()->back()->with('info', 'Kursus ini sudah kamu beli.');
        }

        KursusSiswa::create([
            'siswa_id' => $siswa->id,
            'kursus_id' => $id,
        ]);

        return redirect()->route('siswa.kursus_dibeli')->with('success', 'Kursus berhasil dibeli!');
    }

    public function kursusDibeli()
    {
        $siswa = Auth::user();
        $kursusDibeli = $siswa->kursus()->get();

        return view('Siswa.kursus_dibeli', compact('kursusDibeli'));
    }

    public function catatanPembayaran()
    {
        $siswa = Auth::user();

        $transaksis = Transaksi::with(['kursus.instruktur'])
            ->where('siswa_id', $siswa->id)
            ->orderByDesc('tanggal_transaksi')
            ->get();

        return view('Siswa.pembayaran', compact('transaksis'));
    }
}
