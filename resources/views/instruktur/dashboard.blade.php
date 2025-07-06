@extends('layouts.instruktur')

@section('title', 'Dashboard Instruktur')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-8 text-center">📘 Apa yang Anda Ajarkan Hari Ini?</h1>

    <div class="flex flex-col items-center mb-12 px-4">
        <!-- Search Box -->
        <div class="w-full max-w-4xl mb-8">
            <input type="text" placeholder="🔍 Cari Kursus..."
                class="w-full h-12 px-5 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400 transition-all duration-200">
        </div>

        <!-- Leaderboard -->
        <section class="w-full max-w-6xl mb-12">
            <div
                class="rounded-3xl bg-gradient-to-tr from-gray-900 via-gray-800 to-gray-700 shadow-2xl text-white overflow-hidden">
                <div class="px-8 py-10 relative z-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- TOP 3 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->slice(0, 3) as $key => $entry)
                            <li
                                class="flex items-center gap-4 bg-gray-800 p-4 rounded-xl shadow-md hover:bg-gray-700 transition duration-200">
                                <span class="text-2xl font-bold text-yellow-400">
                                    {{ $key + 1 }}
                                    @if ($key == 0) 🥇
                                    @elseif ($key == 1) 🥈
                                    @elseif ($key == 2) 🥉
                                    @endif
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-semibold">{{ $entry->siswa->name }}</span>
                                    <span class="text-sm text-gray-300 italic">
                                        {{ $entry->kursus->judul_kursus ?? 'Kursus tidak ditemukan' }} -
                                        {{ $entry->skor ?? 0 }} pts
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Title Tengah -->
                    <div class="hidden sm:flex flex-col items-center justify-center text-yellow-300 font-bold text-xl">
                        🏆 <div class="mt-2 text-lg">Top Siswa</div>
                    </div>

                    <!-- Peringkat 4-6 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->slice(3, 3) as $key => $entry)
                            <li
                                class="flex items-center gap-4 bg-gray-800 p-4 rounded-xl shadow-md hover:bg-gray-700 transition justify-end duration-200">
                                <div class="flex flex-col text-right">
                                    <span class="font-semibold">{{ $entry->siswa->name }}</span>
                                    <span class="text-sm text-gray-300 italic">
                                        {{ $entry->kursus->judul_kursus ?? 'Kursus tidak ditemukan' }} -
                                        {{ $entry->skor }} pts
                                    </span>
                                </div>
                                <span class="text-2xl font-bold text-yellow-400">
                                    {{ $key + 4 }}
                                    @if($key + 4 == 4) 🥈
                                    @elseif($key + 4 == 5) 🥉
                                        @else 🏅
                                    @endif
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <!-- Courses -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
            @forelse ($kursusList as $kursus)
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-transform transform hover:scale-[1.02] duration-300">
                    <div class="relative w-full h-48 bg-gray-100">
                        @php
                            $coverPath = \Illuminate\Support\Str::startsWith($kursus->cover, 'covers/') ? $kursus->cover : 'covers/' . $kursus->cover;
                        @endphp
                        <img src="{{ $kursus->cover ? asset('storage/' . $coverPath) : asset('images/default-cover.jpg') }}"
                            alt="Cover Kursus" class="w-full h-full object-contain">
                    </div>

                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1 truncate">{{ $kursus->judul_kursus }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $kursus->instruktur->name ?? 'Tanpa Nama' }}</p>

                        <div class="flex items-center justify-between mt-4">
                            <p class="text-yellow-500 text-base font-semibold">
                                Rp {{ number_format($kursus->harga_kursus, 0, ',', '.') }}
                            </p>
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1 rounded-full">
                                👨‍🎓 {{ $kursus->jumlah_siswa ?? 0 }} Siswa
                            </span>
                        </div>

                        <div class="mt-4 text-center">
                            <a href="{{ route('instruktur.kursus.show', $kursus->id) }}"
                                class="inline-block bg-yellow-400 text-white font-semibold py-2 px-6 rounded-full hover:bg-yellow-500 transition duration-300">
                                📖 Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500 text-lg">Belum ada kursus yang Anda ajarkan.</p>
            @endforelse
        </div>
    </div>
@endsection