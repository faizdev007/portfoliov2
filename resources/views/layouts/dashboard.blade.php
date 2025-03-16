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
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100" x-data="{ isOpen: false, darkMode: localStorage.getItem('theme') === 'dark' }"
    :class="{ 'dark': darkMode }">
        <div class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-1 relative">
                <div class="flex justify-center absolute top-0 bottom-0 start-0 end-0">
                    <div class="md:w-auto hidden md:flex shadow-md drop-shadow dark:bg-gray-800 h-full" id='sidebar'>
                        @include('layouts.sidebar')
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <!-- Page Heading -->
                        @isset($header)
                            <header class="bg-white dark:bg-gray-800 shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endisset
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
