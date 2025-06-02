<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;

class KursusController extends Controller
{
    /**
     * Menampilkan daftar semua kursus.
     */
    public function index()
    {
        $kursus = Kursus::all();
        return view('instruktur.kursus', compact('kursus'));
    }

    /**
     * Menampilkan form tambah kursus.
     */
    public function create()
    {
        return view('instruktur.kursus.kursus-tambah');
    }

    /**
     * Menyimpan data kursus baru ke database.
     */
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul_kursus' => 'required|string|max:255',
        'kategori' => 'required|string|max:100',
        'harga_kursus' => 'required|numeric',
        'instruktur' => 'required|string|max:100',
        'status' => 'required|in:aktif,nonaktif',
        'jumlah_siswa' => 'nullable|integer|min:0',
        'deskripsi' => 'nullable|string',
        'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:100000', // max size dalam KB
    ]);

    // Upload file cover jika ada
    $coverName = null;
    if ($request->hasFile('cover_kursus')) {
        $cover = $request->file('cover_kursus');
        $coverName = time() . '_cover.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('uploads/covers'), $coverName);
    }

    // Upload file video jika ada
    $videoName = null;
    if ($request->hasFile('vidio_kursus')) {
        $video = $request->file('vidio_kursus');
        $videoName = time() . '_video.' . $video->getClientOriginalExtension();
        $video->move(public_path('uploads/videos'), $videoName);
    }

    // Simpan ke database
    Kursus::create([
        'tgl_pembuatan' => now()->toDateString(),
        'instruktur' => $request->instruktur,
        'judul_kursus' => $request->judul_kursus,
        'kategori' => $request->kategori,
        'harga_kursus' => $request->harga_kursus,
        'status' => $request->status,
        'jumlah_siswa' => $request->jumlah_siswa ?? 0,
        'deskripsi' => $request->deskripsi,
        'cover' => $coverName,
        'vidio' => $videoName,
    ]);

    return redirect()->route('instruktur.kursus')->with('success', 'Kursus berhasil ditambahkan.');
}

}
