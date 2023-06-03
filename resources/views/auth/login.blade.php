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
    <x-guest-layout>
        <x-authentication-card>
            <h1 class="bienvenido my-0">Carwash La Nave</h1>
            <p class="slogan text-center">Tu mejor opción para lavado de autos</p>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <x-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="text-center bg-red-100 font-bold mb-4 font-medium text-sm text-red-600">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-button class="ml-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
</body>

</html>
