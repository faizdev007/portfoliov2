<x-guest-layout>
    {{-- my projects --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 dark:text-white">
        <div lable="My Projects" class="flex justify-between items-center">
            <h2 class="items-center justify-center md:text-xl font-bold mb-4 font-doto md:text-left"><a href="{{ Route('portfolio') }}">Portfolio</a> / Take a Look At My Recent Project</h2>
        </div>
        <div class="grid grid-flow-column md:grid-cols-2 gap-4 py-8">
            <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 shadow drop-shadow bg-blue2">
                <div class="flex flex-col justify-center gap-2">
                    <h3 class="text-2xl">Title</h3>
                    <p>project info</p>
                    <x-themes.dev.o1.actionbutton class="flex w-fit" href="#">Case Study
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </x-themes.dev.o1.actionbutton>
                </div>
                <div class="rounded-xl overflow-hidden border border-dark border border-gray-900">
                    <img class="object-cover aspect-[2/1]" src="{{ Storage::url('profile/profile1.jpeg') }}" alt="project image">
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>