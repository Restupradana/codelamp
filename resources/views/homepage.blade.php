<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLamp - Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-900 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white py-4 shadow">
        <div class="container mx-auto flex items-center justify-between px-6">
            <div class="flex items-center space-x-2">
                <span class="text-yellow-500 font-bold text-lg">CodeLamp</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 017 7c0 4-5 9-7 11-2-2-7-7-7-11a7 7 0 017-7zm0 10a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
            </div>

            <div class="space-x-4">
                <a href="{{ route('loginMurid') }}" class="px-4 py-2 border border-yellow-400 text-yellow-400 rounded-full hover:bg-yellow-400 hover:text-white transition">
                    Masuk
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-yellow-400 text-white rounded-full hover:bg-yellow-500 transition">
                    Daftar
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center py-16 px-6 text-white">
        <h1 class="text-4xl font-bold mb-4">Selamat datang !!!</h1>
        <p class="text-lg mb-2">
            Mulai Belajar bersama <span class="text-yellow-400 font-semibold">CodeLamp</span><br>
            Bangun Keahlianmu dengan Kursus Online
        </p>

        <div class="flex items-center justify-center my-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-yellow-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 017 7c0 4-5 9-7 11-2-2-7-7-7-11a7 7 0 017-7zm0 10a3 3 0 100-6 3 3 0 000 6z" />
            </svg>
        </div>

        <h2 class="text-2xl font-semibold mt-6">Pilih Kelas Sesuai dengan Cara Belajar Kamu!</h2>
    </section>

    <!-- Courses Section -->
    <section class="container mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Single Course Card -->
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-gray-800 rounded-lg overflow-hidden shadow-md">
                    <img src="https://via.placeholder.com/400x200?text=ENGLISH" alt="Course Image" class="w-full">
                    <div class="p-4 text-white">
                        <h3 class="text-lg font-bold mb-1">Bahasa Inggris Sehari-hari untuk Percakapan</h3>
                        <p class="text-sm text-gray-400 mb-2">Arpend, S.Pd</p>
                        <p class="text-yellow-400 font-semibold mb-4">Rp. 240.000,-</p>
                        <a href="#" class="block text-center bg-yellow-400 hover:bg-yellow-500 text-white py-2 rounded-lg font-semibold transition">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </section>

</body>
</html>
