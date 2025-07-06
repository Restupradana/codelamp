@extends('layouts.admin')

@section('title', 'Tambah Instruktur')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Instruktur Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.instruktur.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Data dari tabel users -->
            <div>
                <label for="name" class="block font-medium">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="nomor_hp" class="block font-medium">Nomor HP</label>
                <input type="text" name="nomor_hp" id="nomor_hp" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="password" class="block font-medium">Password</label>
                <input type="password" name="password" id="password" class="w-full border p-2 rounded" required>
            </div>

            <!-- Data dari tabel instruktur_detail -->
            <div>
                <label for="nomor_ktp" class="block font-medium">Nomor KTP</label>
                <input type="text" name="nomor_ktp" id="nomor_ktp" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border p-2 rounded" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="pekerjaan" class="block font-medium">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="nama_bank" class="block font-medium">Nama Bank</label>
                <input type="text" name="nama_bank" id="nama_bank" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="nomor_rekening" class="block font-medium">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" id="nomor_rekening" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="nama_rekening" class="block font-medium">Nama Rekening</label>
                <input type="text" name="nama_rekening" id="nama_rekening" class="w-full border p-2 rounded" required>
            </div>

            <div class="md:col-span-2">
                <label for="alamat" class="block font-medium">Alamat</label>
                <textarea name="alamat" id="alamat" class="w-full border p-2 rounded" rows="2" required></textarea>
            </div>

            <div class="md:col-span-2">
                <label for="perkenalan" class="block font-medium">Perkenalan Singkat</label>
                <textarea name="perkenalan" id="perkenalan" class="w-full border p-2 rounded" rows="3"></textarea>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('admin.instruktur.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
