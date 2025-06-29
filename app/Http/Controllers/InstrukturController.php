<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class InstrukturController extends Controller
{
    public function dashboard()
    {
        $instrukturId = Auth::id();

        $kursusList = Kursus::where('instruktur_id', $instrukturId)->get();

        return view('instruktur.dashboard', compact('kursusList'));
    }

    // Tambahkan fungsi lain sesuai kebutuhan (jika perlu)
}
