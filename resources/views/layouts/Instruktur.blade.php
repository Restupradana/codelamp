<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Instruktur') - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#0E1212] text-white flex flex-col">
        <div class="bg-white px-6 py-4 flex items-center justify-between">
            <span class="text-[#F5B40D] font-bold text-xl">CodeLamp</span>
            <img src="{{ asset('images/lamp.png') }}" alt="Lamp Icon" class="h-7 w-7">
        </div>
        <nav class="flex-1 px-4 space-y-2 mt-4">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#D5D1D1" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                <span class="text-gray-200">Dashboard</span>
            </a>
            <a href="{{ route('instruktur.profil') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#D5D1D1" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM12 14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6z"/>
                </svg>
                <span class="text-gray-200">Profil</span>
            </a>
            <a href="{{ route('instruktur.kursus') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#D5D1D1" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 9h10M9 14h10"/>
                </svg>
                <span class="text-gray-200">Kursus</span>
            </a>
            <a href="{{ route('instruktur.pembayaran') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#D5D1D1" fill="none" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2L12 14M5 11L12 18L19 11"/>
                </svg>
                <span class="text-gray-200">Pembayaran</span>
            </a>
            <a href="{{ route('instruktur.pesan') }}" class="block py-2 px-4 rounded hover:bg-gray-700 flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" stroke="#D5D1D1" fill="none" viewBox="0 0 24 24" stroke-width="2">
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
            <div class="flex-1 text-center"></div>
            <div class="flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
        </header>

        <!-- Konten dari setiap halaman -->
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
