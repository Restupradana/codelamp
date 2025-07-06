@extends('layouts.admin')

@section('title', 'Siswa')

@section('content')
    <h2 class="text-xl font-bold mb-4">Daftar Siswa</h2>

    <a href="{{ route('admin.siswa.create') }}"
        class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Siswa</a>

    <table class="min-w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-left text-sm text-gray-600">
                <th class="p-3">No</th>
                <th class="py-2 px-4">Nama</th>
                <th class="py-2 px-4">Email</th>
                <th class="py-2 px-4">Nomor HP</th>
                <th class="py-2 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswas as $user)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ $user->name }}</td>
                    <td class="py-2 px-4">{{ $user->email }}</td>
                    <td class="py-2 px-4">{{ $user->nomor_hp }}</td>
                    <td class="py-2 px-4 space-x-2">
                        <a href="{{ route('admin.siswa.edit', $user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.siswa.destroy', $user->id) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Tidak ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
