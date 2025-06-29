@extends('layouts.instruktur')

@section('title', 'Dashboard Instruktur')

@section('content')
    <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Apa yang Anda Ajarkan hari ini?</h1>

    <div class="flex flex-col items-center mb-6">
        <div class="w-[1086px] mb-6">
            <input type="text" placeholder="Search"
                class="w-full h-[50px] px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Leaderboard -->
        <section class="flex justify-center mb-12 px-4">
            <div
                class="w-full max-w-5xl rounded-xl bg-gradient-to-tr from-[#1f1f1f] via-[#2b2b2b] to-[#3a3a3a] shadow-xl text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10 z-0 flex flex-col items-center justify-center">
                    <img src="/images/logo.png" alt="Logo" class="w-20" />
                    <h2 class="text-yellow-300 font-bold text-xl mt-2">Leaderboard</h2>
                </div>

                <div class="relative z-10 px-8 py-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <!-- Top 3 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->slice(0, 3) as $key => $entry)
                            <li class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition">
                                <span class="text-2xl font-bold text-yellow-400 animate-pulse">
                                    {{ $key + 1 }}
                                    @if($key == 0) 🥇
                                    @elseif($key == 1) 🥈
                                    @elseif($key == 2) 🥉
                                    @endif
                                </span>
                                <div class="flex flex-col">
                                    <span class="font-semibold text-white">{{ $entry->siswa->name }}</span>
                                    <span class="text-sm text-gray-300 italic">
                                        {{ $entry->kursus->judul_kursus ?? 'Kursus tidak ditemukan' }} -
                                        {{ $entry->skor ?? 0 }} pts
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Middle Title -->
                    <div class="hidden sm:flex flex-col items-center justify-center text-yellow-400 font-bold text-2xl">
                        🏆 <div class="mt-2 text-lg">Top Siswa</div>
                    </div>

                    <!-- Posisi 4-6 -->
                    <ul class="space-y-4">
                        @foreach ($leaderboard->slice(3, 3) as $key => $entry)
                            <li
                                class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition justify-end">
                                <div class="flex flex-col text-right">
                                    <span class="font-semibold text-white">{{ $entry->siswa->name }}</span>
                                    <span class="text-sm text-gray-300 italic">
                                        {{ $entry->kursus->judul_kursus ?? 'Kursus tidak ditemukan' }} -
                                        {{ $entry->skor }} pts
                                    </span>
                                </div>
                                <span class="text-2xl font-bold text-yellow-400 animate-pulse">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($kursusList as $kursus)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset('storage/' . $kursus->cover) }}" alt="Course Image"
                        class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">{{ $kursus->judul_kursus }}</h3>
                        <p class="text-sm text-gray-600 mb-2">{{ $kursus->instruktur->name ?? 'Tanpa Nama' }}</p>
                        <div class="flex justify-end mb-4">
                            <p class="text-black font-semibold">Rp. {{ number_format($kursus->harga_kursus, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-center">
                            <button class="bg-[#F5B40D] text-white px-6 py-2 text-l font-semibold"
                                style="width: 150px; height: 50px;">
                                {{ $kursus->jumlah_siswa ?? 0 }} Siswa
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada kursus yang Anda ajarkan.</p>
            @endforelse
        </div>

@endsection