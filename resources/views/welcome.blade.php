<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Student Event App') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white">
    <div class="min-h-screen flex flex-col items-center justify-center px-6 py-12">
        <div class="w-full max-w-3xl bg-white dark:bg-gray-800 shadow rounded-xl p-8 text-center">
            <h1 class="text-3xl font-bold">
                Student Event App
            </h1>

            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Browse campus events, book places, manage your bookings, and handle event administration.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Register
                        </a>
                    @endif
                @endauth

                <a href="/events"
                   class="inline-flex items-center rounded-lg border border-gray-300 dark:border-gray-600 px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Browse Events
                </a>
            </div>
        </div>
    </div>
</body>
</html>