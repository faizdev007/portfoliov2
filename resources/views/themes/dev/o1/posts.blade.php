<x-guest-layout>
    {{-- My Projects --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div label="My Projects" class="flex justify-between items-center">
            <h2 class="items-center justify-center md:text-xl font-bold mb-4 font-kalam md:text-left">
                <a href="{{ Route('portfolio') }}">Portfolio</a> / Latest News From The IT Industry
            </h2>
        </div>
        <hr class="border border-gray-800 dark:border-gray-500">
        
        <div label="blogArea" class="grid md:grid-cols-3 gap-4 py-6">
            @foreach (range(1, 3) as $index)
                <div class="flex flex-col gap-4 w-full rounded-xl dark:bg-gray-800 p-4">
                    <div class="rounded-xl overflow-hidden border border-gray-900">
                        <div class="skeleton h-48 w-full bg-gray-300 dark:bg-gray-700 animate-pulse"></div>
                    </div>
                    <div class="flex flex-col justify-center gap-2">
                        <span class="skeleton h-4 w-20 bg-gray-300 dark:bg-gray-700 animate-pulse"></span>
                        <h3 class="skeleton h-6 w-3/4 bg-gray-300 dark:bg-gray-700 animate-pulse"></h3>
                        <div class="skeleton h-6 w-24 bg-gray-300 dark:bg-gray-700 animate-pulse"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
