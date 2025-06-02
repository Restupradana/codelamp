<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="flex bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <div class="flex items-center space-x-2 px-6 py-6">
            <span class="text-yellow-400 font-bold text-lg">CodeLamp</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 24 24" fill="none"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 2a7 7 0 017 7c0 4-5 9-7 11-2-2-7-7-7-11a7 7 0 017-7zm0 10a3 3 0 100-6 3 3 0 000 6z" />
            </svg>
        </div>
        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                    <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                    <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                    <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                </svg>
                <span class="text-white">Dashboard</span>
            </a>

            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
        <circle cx="12" cy="7" r="4"></circle>
    </svg>
    <span>Profil</span>
</a>
<a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M10 2v8l3-3 3 3V2"></path>
        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"></path>
    </svg>
    <span>Kursus</span>
</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <rect width="20" height="14" x="2" y="5" rx="2"></rect>
        <line x1="2" x2="22" y1="10" y2="10"></line>
    </svg>
    <span>Pembayaran</span>
</a>
            <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
            <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        <path d="M13 8H7"></path>
        <path d="M17 12H7"></path>
    </svg>
    <span>Pesan</span>
</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-yellow-400 px-6 py-4 flex items-center justify-between">
            <button class="text-black md:hidden">
                <!-- Burger Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div></div> <!-- Empty space center -->
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 15c3.042 0 5.824 1.007 8.121 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </header>

        <!-- Search and Leaderboard -->
        <div class="p-6">
            <h1 class="text-xl font-bold text-gray-800 mb-4">Apa yang Ingin Anda Pelajari hari ini?</h1>

            <div class="mb-6">
                <input type="text" placeholder="Search"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400">
            </div>

            <!-- Leaderboard -->
            <div class="bg-gray-800 text-white rounded-lg p-4 mb-10">
                <h2 class="text-center text-yellow-400 font-bold mb-4">Skor Tertinggi</h2>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <ul class="space-y-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <li>{{ $i }}. Anna Yulia</li>
                        @endfor
                    </ul>
                    <ul class="space-y-1">
                        @for ($i = 6; $i <= 10; $i++)
                            <li>{{ $i }}. Anna Taufan</li>
                        @endfor
                    </ul>
                </div>
            </div>

            <!-- Courses -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @for ($i = 0; $i < 3; $i++)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('gambar/DBS Decoding.png') }}" alt="Course Image" class="w-full">
                        <div class="p-4">
                            <h3 class="text-lg font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                            <p class="text-sm text-gray-600 mb-2">Arpend, S.Pd</p>
                            <p class="text-yellow-400 font-semibold mb-2">Rp. 240.000,-</p>
                            <div class="text-center">
                                <span
                                    class="inline-block bg-yellow-400 text-white px-4 py-1 rounded-full text-sm font-semibold">
                                    36 Siswa
                                </span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

        </div>

    </div>

</body>

</html>