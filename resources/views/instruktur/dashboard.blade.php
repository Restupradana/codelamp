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
        <div class="text-white rounded-lg p-6"
            style="width: 1086px; height: 270px; background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/logo.png') }}'); background-size: auto; background-position: center; background-repeat: repeat; background-color: #0E1212;">
            <h2 class="text-center text-yellow-400 font-bold text-xl mb-6">Skor Tertinggi</h2>
            <div class="grid grid-cols-2 gap-6 text-sm">
                <ul class="space-y-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <li class="text-lg">{{ $i }}. Anna Yulia</li>
                    @endfor
                </ul>
                <ul class="space-y-2">
                    @for ($i = 6; $i <= 10; $i++)
                        <li class="text-lg">{{ $i }}. Anna Taufan</li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>

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