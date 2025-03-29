<x-guest-layout>
    {{-- my projects --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div lable="My Projects" class="flex justify-between items-center">
            <h2 class="items-center justify-center md:text-xl font-bold mb-4 font-kalam md:text-left">
                <a href="{{ Route('portfolio') }}">Portfolio</a> / Take a Look At My Recent Project
            </h2>
        </div>
        <hr class="border border-gray-800 dark:border-gray-500">
        <div class="grid grid-flow-column md:grid-cols-2 gap-4 py-8">
            <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 shadow drop-shadow bg-blue2">
                <div class="flex flex-col justify-center gap-2 animate-pulse">
                    <div class="h-6 bg-gray-400 rounded w-3/4"></div>
                    <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                    <div class="h-10 bg-gray-400 rounded w-1/2"></div>
                </div>
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900 animate-pulse">
                    <div class="w-full aspect-[2/1] bg-gray-400"></div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
