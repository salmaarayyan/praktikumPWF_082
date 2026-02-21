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
        @else
            <style>
                *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
                html, body { height: 100%; }
                body {
                    font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                    background-color: #0a0a0a;
                    color: #EDEDEC;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    min-height: 100vh;
                    padding: 1.5rem;
                    flex-direction: column;
                }
                .card {
                    background-color: #161615;
                    border: 1px solid rgba(255, 250, 237, 0.18);
                    border-radius: 0.5rem;
                    padding: 2.5rem;
                    max-width: 600px;
                    width: 100%;
                }
                .card h1 {
                    font-size: 14px;
                    font-weight: 500;
                    margin-bottom: 0.25rem;
                }
                .card p {
                    font-size: 13px;
                    color: #A1A09A;
                    margin-bottom: 1rem;
                }
                .btn {
                    display: inline-block;
                    padding: 0.375rem 1.25rem;
                    background-color: #eeeeec;
                    color: #1C1C1A;
                    border: 1px solid #eeeeec;
                    border-radius: 0.25rem;
                    font-size: 0.875rem;
                    line-height: 1.5;
                    text-decoration: none;
                    cursor: pointer;
                }
                .btn:hover {
                    background-color: #fff;
                    border-color: #fff;
                }
                header {
                    width: 100%;
                    max-width: 600px;
                    text-align: right;
                    margin-bottom: 1.5rem;
                    font-size: 0.875rem;
                }
                header a {
                    display: inline-block;
                    padding: 0.375rem 1.25rem;
                    color: #EDEDEC;
                    border: 1px solid transparent;
                    border-radius: 0.25rem;
                    text-decoration: none;
                    font-size: 0.875rem;
                }
                header a:hover {
                    border-color: #3E3E3A;
                }
                header a.register {
                    border-color: #3E3E3A;
                }
                header a.register:hover {
                    border-color: #62605b;
                }
            </style>
        @endif
    </head>
    <body>
        @if (Route::has('login'))
            <header>
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="register">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register">Register</a>
                        @endif
                    @endauth
                </nav>
            </header>
        @endif

        <div class="card">
            <h1>Salmaa Rifhani Rayyan</h1>
            <p>20230140082</p>
            <a href="#" class="btn">Modul Pertemuan 1</a>
        </div>
    </body>
</html>
