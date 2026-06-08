<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <header>
        <nav class="h-20 w-full border-b-4 border-emerald-500 p-5 flex justify-between items-center ">
            <a href="/" class="font-black text-xl">
                Shop <span class="text-emerald-700 hover:text-emerald-400  font-bold  ">
                    Core
                </span>
            </a>
            <p class="font-black text-xl text-emerald-700">
                @if (request()->is('login'))
                    Login
                @else
                    Register
                @endif
            </p>
            @guest
                <x-nav-link href="/">Cancel</x-nav-link>
            @endguest

        </nav>
    </header>
    <main class="p-10">
        {{ $slot }}
    </main>


</body>

</html>