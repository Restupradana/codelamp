<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Instruktur - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col">
        <!-- Bagian CodeLamp saja putih -->
        <div class="bg-white px-6 py-4 flex items-center justify-between">
            <!-- Teks CodeLamp dengan warna #F5B40D, sedikit lebih besar -->
            <span class="text-[#F5B40D] font-bold text-xl">CodeLamp</span>

            <!-- Gambar Lampu di sebelah kanan -->
            <img src="{{ asset('images/lamp.png') }}" alt="Lamp Icon" class="h-7 w-7">
        </div>

        <!-- Bagian menu tetap abu-abu -->
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <!-- Ikon Dashboard dengan warna #D5D1D1 -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="#D5D1D1" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                <span class="text-gray-200">Dashboard</span>
            </a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="#D5D1D1" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
                </svg>
                <span class="text-gray-200">Profil</span>
            </a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="#D5D1D1" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10"/>
                </svg>
                <span class="text-gray-200">Kursus</span>
            </a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="#D5D1D1" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L12 14M5 11L12 18L19 11"/>
                </svg>
                <span class="text-gray-200">Pembayaran</span>
            </a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="#D5D1D1" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13h14l-7 7-7-7z"/>
                </svg>
                <span class="text-gray-200">Pesan</span>
            </a>
        </nav>

    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col bg-[#F5B40D36] bg-opacity-21">

        <!-- Header -->
        <header class="bg-yellow-400 px-6 py-4 flex items-center justify-between">
            <button class="text-black md:block hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="flex-1 text-center">
                <!-- Bisa kosong atau tambahkan teks/logo di tengah -->
            </div>

            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </header>

        <!-- Bagian untuk konten dinamis -->
        <div class="p-6">
            <h1 class="text-xl font-bold text-gray-800 mb-4 text-center">Apa yang Anda Ajarkan hari ini?</h1>

            <div class="flex flex-col items-center mb-6">
                <div class="w-[1086px] mb-6">
                    <input type="text" placeholder="Search" class="w-full h-[50px] px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Leaderboard -->
                <div class="text-white rounded-lg p-6" style="width: 1086px; height: 270px; background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/logo.png') }}'); background-size: auto; background-position: center; background-repeat: repeat; background-color: #0E1212;">
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
                @for ($i = 0; $i < 3; $i++)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="{{ asset('images/course.jpg') }}" alt="Course Image" class="w-full h-48 object-cover rounded-t-lg">

                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                        <p class="text-sm text-gray-600 mb-2">Arpend, S.Pd</p>

                        <div class="flex justify-end mb-4">
                            <p class="text-black font-semibold">Rp. 240.000,-</p>
                        </div>

                        <div class="text-center">
                            <button class="bg-[#F5B40D] text-white px-6 py-2 text-l font-semibold" style="width: 150px; height: 50px; border-radius: 0;">
                                36 Siswa
                            </button>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

        </div>

    </div>

    <!-- Tempat untuk menambahkan konten tambahan dari halaman lain -->
    @yield('content')

</body>

</html>
