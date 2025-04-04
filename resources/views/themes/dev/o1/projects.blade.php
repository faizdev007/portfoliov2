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
            @if (isset($projects))
                @foreach ($projects as $project)
                    <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 shadow drop-shadow bg-blue2">
                        <div class="flex flex-col justify-between gap-2 {{ isset($project) ?? 'animate-pulse'}}">
                            <div class="">
                                <div class="font-bold text-lg {{ isset($project) ?? 'h-6 bg-gray-400 w-3/4'}} rounded" title="{{ $project->title ?? 'Project Title' }}">{{ $project->title ?? 'Project Title' }}</div>
                                <div class="text-sm {{ isset($project) ?? 'h-4 bg-gray-400 w-5/6'}} rounded line-clamp-3" title="{{ $project->short_description ?? 'Short Description' }}">{{ $project->short_description ?? 'Short Description' }}</div>
                            </div>
                            <div class="h-10 {{ isset($project) ?? 'bg-gray-400'}} rounded">
                                <a href="{{ $project->url ?? '#' }}" target="_blank" class="justify-center gap-4 rounded-full border border-gray-600 dark:border-gray-500 text-white bg-gray-700 hover:bg-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 p-3 px-4 h-10 items-center transition duration-150 ease-in-out flex w-fit hover:px-8 transition-all my-0">Case Study
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>                                          
                                </a>
                            </div>
                        </div>
                        <div class="rounded-xl overflow-hidden border border-dark border border-gray-900 {{ isset($project->thumbnail) ?? 'animate-pulse' }}">
                            <img src="{{ Storage::url('projects/'.$project->thumbnail) ?? Storage::url('profile/profile1.jpeg') }}" alt="Project Thumbnail" class="w-full aspect-[2/1] h-full fill-current {{ isset($project) ?? 'bg-gray-400'}}">
                        </div>
                    </div>
                @endforeach
                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            @else    
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
            @endif
        </div>
    </section>
</x-guest-layout>
