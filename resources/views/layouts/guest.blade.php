<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-blue1" x-data="{ isOpen: false, darkMode: localStorage.getItem('theme') === 'dark' }"
    :class="{ 'dark': darkMode }">
        <div class="min-h-screen dark:bg-gray-900 flex flex-col justify-between"> 
            <div class="">
                @include('layouts.navigation')
    
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
            
            {{-- footer --}}
    
            <footer class="border-t border-gray-800 dark:border-gray-500 dark:text-white flex gap-4 md:flex-row flex-col-reverse items-center justify-between w-full mt-8 mx-auto px-4 py-4">
                <span class="w-max font-bold md:text-md text-md font-orbitron uppercase">Copywrite @ {{ date('Y') }} Faiz Alam</span>
                <div class="flex flex-flow-row gap-4 overflow-auto w-full md:w-auto sm:justify-center" lable="social links">
                    <x-themes.dev.o1.actionbutton href="#" class="flex text-lg font-orbitron">GitHub
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 28 28" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                        </svg>                  
                    </x-themes.dev.o1.actionbutton>
                    <a href="#" class="border border-gray-700 font-orbitron hover:bg-gray-100 rounded-full gap-2 flex items-center px-4 h-10 dark:bg-gray-700 my-3 dark:hover:bg-gray-600">LinkdIn
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                  
                    </a>
                    <a href="#" class="border border-gray-700 font-orbitron hover:bg-gray-100 rounded-full gap-2 flex items-center px-4 h-10 dark:bg-gray-700 my-3 dark:hover:bg-gray-600">X
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                  
                    </a>
                    <a href="#" class="border border-gray-700 font-orbitron hover:bg-gray-100 rounded-full gap-2 flex items-center px-4 h-10 dark:bg-gray-700 my-3 dark:hover:bg-gray-600">Instagram
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>                  
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html>
