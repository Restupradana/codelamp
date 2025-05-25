@extends('layouts.sidebar')

@section('content')
<div class="p-6">
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-xl font-semibold mb-1">Profil</h2>
        <p class="text-sm text-gray-500 mb-4 uppercase">Data Diri Anda</p>

        <form action="{{ route('loginSiswa') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor ID / KTP</label>
                <input type="text" name="nomor_ktp" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor HP</label>
                <input type="text" name="no_hp" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tingkat Pelajar</label>
                <input type="text" name="tingkat_pelajar" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Pertanyaan</label>
                <input type="text" name="pertanyaan" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" rows="3" class="mt-1 block w-full border rounded px-3 py-2 focus:outline-none focus:ring-1 focus:ring-orange-500"></textarea>
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('dashboardSiswa') }}" class="px-4 py-2 border rounded text-sm text-gray-600 hover:bg-gray-100">Batal</a>
                <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
