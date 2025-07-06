@extends('layouts.admin')

@section('title', 'Daftar Instruktur')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold mb-2">Daftar Instruktur</h1>
    <a href="{{ route('admin.instruktur.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Instruktur</a>
</div>

<table class="w-full table-auto bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr class="text-left">
            <th class="p-3">No</th>
            <th class="p-3">Nama</th>
            <th class="p-3">Email</th>
            <th class="p-3">Nomor HP</th>
            <th class="p-3">KTP</th>
            <th class="p-3">Pekerjaan</th>
            <th class="p-3">Rekening</th>
            <th class="p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($instrukturs as $i => $user)
        <tr class="border-b hover:bg-gray-50">
            <td class="p-3">{{ $i + 1 }}</td>
            <td class="p-3">
                {{ $user->name ?? '-' }}<br>
                {{ $user->instrukturDetail->jenis_kelamin ?? '-' }}
            </td>
            <td class="p-3">{{ $user->email }}</td>
            <td class="p-3">{{ $user->nomor_hp }}</td>
            <td class="p-3">{{ $user->instrukturDetail->nomor_ktp ?? '-' }}</td>
            <td class="p-3">{{ $user->instrukturDetail->pekerjaan ?? '-' }}</td>
            <td class="p-3">
                {{ $user->instrukturDetail->nama_bank ?? '-' }}<br>
                {{ $user->instrukturDetail->nomor_rekening ?? '-' }}
            </td>
            <td class="p-3 space-x-2">
                <a href="{{ route('admin.instruktur.edit', $user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.instruktur.destroy', $user->id) }}" method="POST" class="inline"
                      onsubmit="return confirm('Yakin ingin menghapus instruktur ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
