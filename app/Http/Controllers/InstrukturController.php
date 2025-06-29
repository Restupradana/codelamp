<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\KursusSiswa;
use Illuminate\Support\Facades\Auth;

class InstrukturController extends Controller
{
    public function dashboard()
    {
        $instrukturId = Auth::id();

        // Ambil kursus milik instruktur
        $kursusList = Kursus::where('instruktur_id', $instrukturId)->get();

        // Ambil leaderboard dari tabel kursus_siswa, filter berdasarkan kursus yang diajar oleh instruktur
        $leaderboard = KursusSiswa::with(['siswa', 'kursus'])
            ->whereHas('kursus', function ($query) use ($instrukturId) {
                $query->where('instruktur_id', $instrukturId);
            })
            ->orderByDesc('skor')
            ->take(6)
            ->get();

        return view('instruktur.dashboard', compact('kursusList', 'leaderboard'));
    }
}
