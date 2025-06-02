<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'CodeLamp' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span>Profil</span>
                </a>
                <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 2v8l3-3 3 3V2"></path>
                        <path
                            d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20">
                        </path>
                    </svg>
                    <span>Kursus</span>
                </a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
                    <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                            <line x1="2" x2="22" y1="10" y2="10"></line>
                        </svg>
                        <span>Pembayaran</span>
                    </a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-700">
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-700 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                <path d="M13 8H7"></path>
                                <path d="M17 12H7"></path>
                            </svg>
                            <span>Pesan</span>
                        </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <header class="bg-orange-400 p-4 flex justify-between items-center">
                <h1 class="text-white text-lg">Kursus</h1>
                <div class="text-white">👤</div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>