@extends('layouts.instruktur')
@section('title', 'Kursus')

@section('content')
<div class="flex items-center gap-3 mb-6">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10" />
    </svg>
    <h1 class="text-xl font-bold text-gray-800">Daftar Kursus Anda</h1>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-lg font-semibold text-gray-700">Informasi Kursus</h2>
            <p class="text-sm text-gray-500">Menampilkan daftar kursus yang telah sudah ada.</p>
        </div>
        <div>
            <input type="text"
                class="w-[300px] h-[42px] border border-gray-300 rounded-lg px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                placeholder="🔍 Cari kursus...">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-700 border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Tanggal</th>
                    <th class="px-4 py-2 border-b">Cover</th>
                    <th class="px-4 py-2 border-b">Judul</th>
                    <th class="px-4 py-2 border-b">Kategori</th>
                    <th class="px-4 py-2 border-b">Harga</th>
                    <th class="px-4 py-2 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kursus as $index => $item)
                    <tr class="hover:bg-yellow-50 transition">
                        <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->tgl_pembuatan }}</td>
                        <td class="px-4 py-2 border-b">
                            @php
                                $coverPath = \Illuminate\Support\Str::startsWith($item->cover, 'covers/') ? $item->cover : 'covers/' . $item->cover;
                            @endphp
                            <img src="{{ $item->cover ? asset('storage/' . $coverPath) : asset('images/default-cover.jpg') }}"
                                alt="Cover" class="w-20 h-12 object-cover rounded-lg border">
                        </td>
                        <td class="px-4 py-2 border-b font-medium">{{ $item->judul_kursus }}</td>
                        <td class="px-4 py-2 border-b">{{ $item->kategori }}</td>
                        <td class="px-4 py-2 border-b text-green-600 font-semibold">
                            Rp{{ number_format($item->harga_kursus, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 border-b">
                            <span class="px-2 py-1 text-xs font-bold rounded-full
                                {{ $item->status === 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500 italic">Belum ada kursus yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
