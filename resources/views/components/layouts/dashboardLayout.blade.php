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

<body x-data="{ sidebarOpen: localStorage.getItem('sidebar') !== 'closed' }" class="min-h-screen flex flex-col">
    <header>
        <nav class="h-20 w-full border-b-4 border-emerald-500 p-5 flex justify-between items-center  ">
            <div class="flex gap-5">
                <button title="Open/Close Sidebar" class="cursor-pointer text-emerald-700 hover:text-emerald-400"
                    @click="
        sidebarOpen = !sidebarOpen;
        localStorage.setItem('sidebar', sidebarOpen ? 'open' : 'closed');
    ">
                    <x-heroicon-m-ellipsis-vertical class="w-5 h-5" />
                </button>
                <x-logo />

            </div>
            <x-dropdown :logout="true" :options="[
        ['label' => 'Profile', 'url' => 'profile', 'solidIcon' => 'heroicon-s-user', 'outlinedIcon' => 'heroicon-o-user'],
        // ['label' => 'Dashboard', 'url' => 'dashboard', 'solidIcon' => 'heroicon-s-chart-bar', 'outlinedIcon' => 'heroicon-o-chart-bar'],
    ]">
                <x-avatar :user="auth()->user()" :small="true" />

                <p class="text-xs text-emerald-700 font-light group-hover:text-emerald-400">
                    {{ auth()->user()->name }}
                </p>
            </x-dropdown>

        </nav>
    </header>

    <div class="flex">
        <div :class="sidebarOpen ? 'w-60 opacity-100' : 'w-0 opacity-0 overflow-hidden'"
            class="transition-all duration-500">
            <x-sidebar />
        </div>
        <main class="mx-auto w-full">
            {{ $slot }}
        </main>
    </div>
    <footer class="flex items-center justify-center text-black w-full border-t-2 border-t-emerald-700 p-2 ">
        <p>
            Created for practice
        </p>

    </footer>

</body>


</html>