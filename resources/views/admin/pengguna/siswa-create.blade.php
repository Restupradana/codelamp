@extends('layouts.admin')

@section('title', 'Tambah Siswa')

@section('content')
    <h2 class="text-xl font-bold mb-4">Tambah Siswa</h2>

    <form action="{{ route('admin.siswa.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Nama</label>
            <input type="text" name="name" class="form-input w-full" required>
        </div>
        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="form-input w-full" required>
        </div>
        <div>
            <label class="block">Nomor HP</label>
            <input type="text" name="nomor_hp" class="form-input w-full" required>
        </div>
        <div>
            <label class="block">Password</label>
            <input type="password" name="password" class="form-input w-full" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.users.siswa') }}"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </form>
@endsection