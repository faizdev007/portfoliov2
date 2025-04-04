<x-dashboard-layout>
    <a class="text-white p-2 shadow drop-shadow absolute top-0 rounded start-0 rounded-s-none rounded-t-none uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500" href="{{ route('portfolio.addblog') }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
        </svg>              
    </a>
    <div class="md:m-8 m-4 bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        <div class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
            <div class="mx-auto p-6 shadow-md rounded-md bg-white dark:bg-gray-800">
                
                @if(session('success'))
                    <div class="bg-green-200 text-green-800 p-3 rounded mb-4 dark:bg-green-700 dark:text-green-100 message">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-4 message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div x-data="{ search: '' }">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-4 border-b-2 pb-3 border-gray-600">
                        <h2 class="text-xl font-semibold uppercase">Blogs</h2>
                        <div class="flex gap-2">
                            <input type="text" x-model="search" placeholder="Search..." 
                                class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-300">
                        </div>
                    </div>
                    <div class="grid grid-flow-column md:grid-cols-2 gap-4 py-8">
                        {{-- <template x-for="(project, index) in filteredData()" :key="project.id">
                            <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 bg-blue2">
                                
                                <!-- Project Info -->
                                <div class="flex flex-col justify-between gap-2">
                                    <div class="">
                                        <h3 class="text-lg font-semibold dark:text-white truncate w-full" x-text="project.title ?? 'Project Title'"></h3>
                                        <p class="text-sm dark:text-gray-300" x-text="project.short_description ?? 'Short Description'"></p>
                                    </div>
                                    
                                    <a :href="project.url" target="_blank" class="justify-center gap-4 my-3 rounded-full border border-gray-600 dark:border-gray-500 text-white bg-gray-700 hover:bg-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 p-3 px-4 h-10 items-center transition duration-150 ease-in-out flex w-fit hover:px-8 transition-all my-0">Case Study
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>                                          
                                    </a>
                                </div>
                    
                                <div class="rounded-xl overflow-hidden border border-gray-900">
                                    <img :src="'/storage/projects/' + project.thumbnail" alt="Project Thumbnail" class="w-full aspect-[2/1] h-32 fill-current">
                                </div>
                            </div>
                        </template> --}}
                    </div>
                    <template x-if="filteredData().length === 0">
                        <div class="w-full text-center text-2xl font-doto">No Projects Avilable</div>
                    </template>
                    
                    <!-- Pagination -->
                    <template x-if="filteredData().length > 6">
                        <div class="flex justify-between items-center mt-4">
                            <button @click="prevPage()" class="mt-6 text-white rounded-full px-4 py-2 uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500" x-bind:disabled="currentPage === 1">Previous</button>
                            <span class="text-gray-600 dark:text-gray-300">Page <span x-text="currentPage"></span> of <span x-text="totalPages()"></span></span>
                            <button @click="nextPage()" class="mt-6 text-white rounded-full px-4 py-2 uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500" x-bind:disabled="currentPage >= totalPages()">Next</button>
                        </div>
                    </template>
                </div>
                
            </div>
        </div>
    </div>
</x-dashboard-layout>
