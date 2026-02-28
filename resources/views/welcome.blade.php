<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-[#0a0a0a] text-[#EDEDEC] min-h-screen flex flex-col items-center justify-center p-6" style="font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;">

        @if (Route::has('login'))
            <header class="w-full max-w-lg text-right mb-6 text-sm">
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 border border-[#3E3E3A] rounded hover:border-[#62605b] text-[#EDEDEC]">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 border border-transparent rounded hover:border-[#3E3E3A] text-[#EDEDEC]">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 border border-[#3E3E3A] rounded hover:border-[#62605b] text-[#EDEDEC]">Register</a>
                        @endif
                    @endauth
                </nav>
            </header>
        @endif

        <div class="bg-[#161615] border border-white/10 rounded-lg p-10 max-w-lg w-full">
            <h1 class="text-sm font-medium mb-1">Salmaa Rifhani Rayyan</h1>
            <p class="text-sm text-[#A1A09A] mb-4">20230140082</p>
            <a href="#" class="inline-block px-5 py-1.5 bg-[#eeeeec] text-[#1C1C1A] border border-[#eeeeec] rounded text-sm hover:bg-white hover:border-white">Modul Pertemuan 1</a>
        </div>

    </body>
</html>
