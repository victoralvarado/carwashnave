<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carwash La Nave</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        /* Estilos personalizados para Carwash La Nave */
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #F3F4F6;
            color: #374151;
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        .sm\:fixed {
            position: fixed;
        }

        .sm\:top-0 {
            top: 0;
        }

        .sm\:right-0 {
            right: 0;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .text-right {
            text-align: right;
        }

        .z-10 {
            z-index: 10;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-600 {
            color: #4a5568;
        }

        .hover\:text-gray-900:hover {
            color: #1a202c;
        }

        .focus\:outline {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus\:outline-2:focus {
            outline-offset: 2px;
            outline: 2px solid #e5e7eb;
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem;
        }

        .focus\:outline-red-500:focus {
            outline-color: #f56565;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            text-align: center;
        }

        .bienvenido {
            font-size: 3rem;
            font-weight: 700;
            color: #2c3e50;
            text-align: center;
            margin-top: 40px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .bienvenido::after {
            content: "";
            display: block;
            width: 80px;
            height: 3px;
            background-color: #e67e22;
            margin: 20px auto;
        }

        .bienvenido:hover {
            color: #e67e22;
        }

        .bienvenido a {
            color: inherit;
            text-decoration: none;
        }

        .bienvenido a:hover {
            text-decoration: underline;
        }

        .logo {
            font-size: 3rem;
            font-weight: 600;
            margin-bottom: 2rem;
        }

        .slogan {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 2rem;
        }

        .cta-button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            background-color: #EF4444;
            color: #FFF;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #DC2626;
        }
    </style>
</head>

<body>
    <div class="container">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <h1 class="bienvenido">¡Bienvenido!</h1>
        <h1 class="logo">Carwash La Nave</h1>
        <p class="slogan">Tu mejor opción para lavado de autos</p>
        <a href="#" class="cta-button">¡Agendar cita!</a>
    </div>
</body>

</html>
