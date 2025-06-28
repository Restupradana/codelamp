<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - CodeLamp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen bg-[#FBE5C8] text-gray-800">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col">
        <div class="flex items-center space-x-2 px-6 py-4 bg-white">
            <img src="{{ asset('gambar/logo1.png') }}" alt="Logo" class="h-8 object-contain" />
            <span class="font-bold text-xl text-[#F5B40D]">CodeLamp</span>
        </div>
        <nav class="flex-1 px-4 py-4 space-y-2">
            <a href="{{ route('siswa.dashboard') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                📊 <span>Dashboard</span>
            </a>
            <a href="{{ route('siswa.profil') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                👤 <span>Profil Siswa</span>
            </a>
            <a href="{{ route('siswa.kursus') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                📚 <span>Kursus</span>
            </a>
            <a href="{{ route('siswa.pembayaran') }}"
                class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                💳 <span>Pembayaran</span>
            </a>
            <a href="" class="flex items-center gap-3 py-2 px-4 rounded-lg transition hover:bg-[#1f1f1f]">
                💬 <span>Pesan</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar -->
        <header class="bg-[#FDB813] px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">Selamat Datang, {{ Auth::user()->nama_lengkap ?? 'Siswa' }}</h2>
            <!-- Akun Avatar + Logout Dropdown -->
            <div class="relative group cursor-pointer">
                <div class="w-10 h-10 rounded-full bg-white border-2 border-black flex items-center justify-center">
                    <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div
                    class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-50">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-200">
                            🔓 Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Section -->
        <main class="p-6">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 rounded bg-green-100 border border-green-400 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="text-center mb-8">
                <h1 class="text-2xl font-semibold">Apa yang Ingin Anda Pelajari Hari Ini?</h1>
            </div>

            <!-- Search Box -->
            <div class="flex justify-center mb-8">
                <input type="text" placeholder="Cari kursus..."
                    class="w-full max-w-3xl h-12 px-4 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-yellow-400" />
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
                                <li
                                    class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition">
                                    <span class="text-2xl font-bold text-yellow-400 animate-pulse">
                                        {{ $key + 1 }}
                                        @if($key == 0) 🥇
                                        @elseif($key == 1) 🥈
                                        @elseif($key == 2) 🥉
                                        @endif
                                    </span>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-white">{{ $entry->siswa->nama_lengkap }}</span>
                                        <span class="text-sm text-gray-300 italic">
                                            {{ $entry->kursus->judul_kursus ?? 'Kursus tidak ditemukan' }} -
                                            {{ $entry->skor }} pts
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Middle Title -->
                        <div
                            class="hidden sm:flex flex-col items-center justify-center text-yellow-400 font-bold text-2xl">
                            🏆 <div class="mt-2 text-lg">Top Siswa</div>
                        </div>

                        <!-- Posisi 4-6 -->
                        <ul class="space-y-4">
                            @foreach ($leaderboard->slice(3, 3) as $key => $entry)
                                <li
                                    class="flex items-center gap-4 bg-[#2a2a2a] p-3 rounded-lg shadow hover:bg-[#333] transition justify-end">
                                    <div class="flex flex-col text-right">
                                        <span class="font-semibold text-white">{{ $entry->siswa->nama_lengkap }}</span>
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

            <!-- Course Cards -->
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $gambar = ['gambar3.jpg', 'gambar2.jpg', 'DBS Decoding.png'];
                @endphp
                @foreach ($kursus as $i => $k)
                    <div
                        class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition transform hover:scale-[1.02]">
                        <img src="{{ asset('gambar/' . $gambar[$i % count($gambar)]) }}" alt="Course Image"
                            class="w-full h-40 object-cover" />
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-1">{{ $k->judul_kursus }}</h3>
                            <p class="text-sm text-gray-600">{{ $k->instruktur }}</p>
                            <p class="text-yellow-500 font-bold my-2">Rp 240.000,-</p>
                            <div class="text-center">
                                <span class="bg-yellow-400 text-white px-3 py-1 rounded-full text-xs">36 Siswa</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </main>
    </div>
</body>

</html>