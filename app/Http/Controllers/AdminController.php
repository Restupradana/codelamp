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

    public function listKursus()
    {
        $kursus = Kursus::all();
        return view('admin.kursus', compact('kursus'));
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
}
