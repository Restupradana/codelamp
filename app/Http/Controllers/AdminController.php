<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kursus;
use App\Models\InstrukturDetail;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'jumlahUser' => User::count(),
            'jumlahKursus' => Kursus::count(),
        ]);
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function listInstruktur()
    {
        $instrukturs = User::with('instrukturDetail')
            ->where('role', 'instruktur')
            ->get();

        return view('admin.pengguna.instruktur', compact('instrukturs'));
    }

    public function listSiswa()
    {
        $siswas = User::where('role', 'siswa')->get();
        return view('admin.pengguna.siswa', compact('siswas'));
    }

    public function createInstruktur()
    {
        return view('admin.pengguna.instruktur-create');
    }

    public function storeInstruktur(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nomor_hp' => 'required',
            'password' => 'required|min:6',
            'nomor_ktp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'required',
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'role' => 'instruktur',
            'password' => bcrypt($request->password),
        ]);

        InstrukturDetail::create([
            'user_id' => $user->id,
            'nomor_ktp' => $request->nomor_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'nama_bank' => $request->nama_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_rekening' => $request->nama_rekening,
            'alamat' => $request->alamat,
            'perkenalan' => $request->perkenalan,
        ]);

        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil ditambahkan.');
    }

    public function editInstruktur($id)
    {
        $user = User::with('instrukturDetail')->findOrFail($id);
        return view('admin.pengguna.instruktur-edit', compact('user'));
    }

    public function updateInstruktur(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'nomor_hp' => 'required',
            'nomor_ktp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pekerjaan' => 'required',
            'nama_bank' => 'required',
            'nomor_rekening' => 'required',
            'nama_rekening' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
        ]);

        $user->instrukturDetail->update([
            'nomor_ktp' => $request->nomor_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'nama_bank' => $request->nama_bank,
            'nomor_rekening' => $request->nomor_rekening,
            'nama_rekening' => $request->nama_rekening,
            'alamat' => $request->alamat,
            'perkenalan' => $request->perkenalan,
        ]);

        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil diperbarui.');
    }

    public function destroyInstruktur($id)
    {
        $user = User::findOrFail($id);
        if ($user->instrukturDetail) {
            $user->instrukturDetail->delete();
        }
        $user->delete();

        return redirect()->route('admin.instruktur.index')->with('success', 'Instruktur berhasil dihapus.');
    }

    public function createSiswa()
    {
        return view('admin.pengguna.siswa-create');
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'nomor_hp' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'role' => 'siswa',
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.users.siswa')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function editSiswa($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pengguna.siswa-edit', compact('user'));
    }

    public function updateSiswa(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nomor_hp' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return redirect()->route('admin.users.siswa')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroySiswa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.siswa')->with('success', 'Siswa berhasil dihapus.');
    }

    public function listKursus(Request $request)
    {
        $query = Kursus::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul_kursus', 'like', '%' . $request->search . '%');
        }

        $kursus = $query->with(['instruktur', 'kursusSiswa'])->get();

        return view('admin.kursus', compact('kursus'));
    }


    // Tampilkan form tambah kursus
    public function createKursus()
    {
        $instrukturs = User::where('role', 'instruktur')->get();
        return view('admin.kursus.create', compact('instrukturs'));
    }

    // Simpan kursus baru
    public function storeKursus(Request $request)
    {
        $request->validate([
            'instruktur_id' => 'required|exists:users,id',
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'cover_kursus' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'vidio_kursus' => 'required|mimetypes:video/mp4,video/mpeg,video/quicktime|max:100000',
        ]);

        // Upload file cover
        $coverPath = $request->file('cover_kursus')->store('covers', 'public');

        // Upload file video
        $videoPath = $request->file('vidio_kursus')->store('videos', 'public');

        // Simpan ke database
        Kursus::create([
            'instruktur_id' => $request->instruktur_id,
            'judul_kursus' => $request->judul_kursus,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga_kursus' => $request->harga_kursus,
            'status' => $request->status,
            'cover' => $coverPath, // kolom 'cover' di database
            'vidio' => $videoPath, // kolom 'vidio' di database
            'jumlah_siswa' => 0,
            'tgl_pembuatan' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil ditambahkan.');
    }

    // Tampilkan form edit kursus
    public function editKursus($id)
    {
        $kursus = Kursus::findOrFail($id);
        $instrukturs = User::where('role', 'instruktur')->get();
        return view('admin.kursus.edit', compact('kursus', 'instrukturs'));
    }

    // Update kursus
    public function updateKursus(Request $request, $id)
    {
        $kursus = Kursus::findOrFail($id);

        $request->validate([
            'instruktur_id' => 'required|exists:users,id',
            'judul_kursus' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga_kursus' => 'required|numeric',
            'status' => 'required|in:aktif,nonaktif',
            'jumlah_siswa' => 'nullable|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'cover_kursus' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'vidio_kursus' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:100000',
        ]);

        // Proses upload file baru jika ada
        if ($request->hasFile('cover_kursus')) {
            $coverPath = $request->file('cover_kursus')->store('covers', 'public');
        } else {
            $coverPath = $kursus->cover; // gunakan yang lama
        }

        if ($request->hasFile('vidio_kursus')) {
            $videoPath = $request->file('vidio_kursus')->store('videos', 'public');
        } else {
            $videoPath = $kursus->vidio; // gunakan yang lama
        }

        // Update data
        $kursus->update([
            'instruktur_id' => $request->instruktur_id,
            'judul_kursus' => $request->judul_kursus,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga_kursus' => $request->harga_kursus,
            'status' => $request->status,
            'cover' => $coverPath,
            'vidio' => $videoPath,
            'jumlah_siswa' => $request->jumlah_siswa ?? $kursus->jumlah_siswa,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil diperbarui.');
    }


    // Hapus kursus
    public function destroyKursus($id)
    {
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();

        return redirect()->route('admin.kursus')->with('success', 'Kursus berhasil dihapus.');
    }
}
