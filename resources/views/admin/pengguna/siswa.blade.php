@extends('layouts.admin')

@section('title', 'Siswa')

@section('content')
<h2 class="text-xl font-bold mb-4">Daftar Siswa</h2>

<table class="min-w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left text-sm text-gray-600">
            <th class="py-2 px-4">Nama</th>
            <th class="py-2 px-4">Email</th>
        </tr>
    </thead>
    <tbody>
        @forelse($siswas as $user)
            <tr class="border-t">
                <td class="py-2 px-4">{{ $user->name }}</td>
                <td class="py-2 px-4">{{ $user->email }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2" class="text-center py-2">Tidak ada data siswa.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
