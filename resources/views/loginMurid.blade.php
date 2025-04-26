<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CodeLamp</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-yellow-400 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-yellow-500 flex items-center justify-center">
                CodeLamp
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2a7 7 0 017 7c0 4-5 9-7 11-2-2-7-7-7-11a7 7 0 017-7zm0 10a3 3 0 100-6 3 3 0 000 6z" />
                </svg>
            </h1>
            <p class="text-sm text-gray-600 mt-1">Masuk sebagai Admin</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm mb-1">Email</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required autofocus>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm mb-1">Kata Sandi</label>
                <input type="password" name="password" id="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 rounded-lg transition duration-300">
                <a href="/murid/dashboard"
                    class="block w-full bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 rounded-lg text-center transition duration-300">
                    Masuk
                </a>
            </button>

            <div class="text-right mt-3">
                <a href="{{ route('password.request') }}" class="text-xs text-gray-500 hover:underline">
                    Lupa kata sandi?
                </a>
            </div>
        </form>
    </div>

</body>

</html>