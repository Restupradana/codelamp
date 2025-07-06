@extends('layouts.admin')

@section('title', 'Edit Siswa')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Siswa</h2>

<form action="{{ route('admin.siswa.update', $user->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block">Nama</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-input w-full" required>
    </div>
    <div>
        <label class="block">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-input w-full" required>
    </div>
    <div>
        <label class="block">Nomor HP</label>
        <input type="text" name="nomor_hp" value="{{ $user->nomor_hp }}" class="form-input w-full" required>
    </div>

    <div class="flex items-center gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('admin.users.siswa') }}"
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </div>
</form>
@endsection
