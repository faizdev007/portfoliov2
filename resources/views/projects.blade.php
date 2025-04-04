<x-dashboard-layout>
    <button class="text-white p-2 shadow absolute top-0 rounded start-0 rounded-s-none rounded-t-none uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500" x-on:click.prevent="$dispatch('open-modal', 'project')" title="Add New Project">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 0 1 2.25-2.25h7.5A2.25 2.25 0 0 1 18 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 0 0 4.5 9v.878m13.5-3A2.25 2.25 0 0 1 19.5 9v.878m0 0a2.246 2.246 0 0 0-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0 1 21 12v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6c0-.98.626-1.813 1.5-2.122" />
        </svg>              
    </button>
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

                <div x-data="tableData({{ $projectslist }})">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-4 border-b-2 pb-3 border-gray-600">
                        <h2 class="text-xl font-semibold uppercase">Projects</h2>
                        <div class="flex gap-2">
                            <input type="text" x-model="search" placeholder="Search..." 
                                class="border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-300">
                        </div>
                    </div>
                    <template x-if="filteredData().length !== 0">
                    <div class="grid grid-flow-column md:grid-cols-2 gap-4 py-8">
                        <template x-for="(project, index) in filteredData()" :key="project.id">
                            <div class="sm:grid flex sm:grid-cols-2 sm:grid-flow-col flex-col-reverse gap-4 w-full rounded-xl dark:bg-gray-800 dark:border-gray-500 border border-gray-300 p-4 bg-blue2">
                                
                                <!-- Project Info -->
                                <div class="flex flex-col justify-between gap-2">
                                    <div class="">
                                        <h3 class="text-lg font-semibold dark:text-white truncate w-full" x-text="project.title ?? 'Project Title'" :title="project.title ?? 'Project Title'"></h3>
                                        <p class="text-sm dark:text-gray-300 line-clamp-3" x-text="project.short_description ?? 'Short Description'" :title="project.short_description ?? 'Short Description'"></p>
                                    </div>
                                    
                                    <a :href="project.url" target="_blank" class="justify-center gap-4 rounded-full border border-gray-600 dark:border-gray-500 text-white bg-gray-700 hover:bg-gray-600 dark:bg-gray-800 dark:hover:bg-gray-700 p-3 px-4 h-10 items-center transition duration-150 ease-in-out flex w-fit hover:px-8 transition-all my-0">Case Study
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>                                          
                                    </a>
                                </div>
                    
                                <div class="rounded-xl overflow-hidden border border-gray-900">
                                    <img :src="'/storage/projects/' + project.thumbnail" alt="Project Thumbnail" class="w-full aspect-[2/1] object-conver h-full">
                                </div>
                            </div>
                        </template>
                    </div>
                    </template>
                    <template x-if="filteredData().length === 0">
                        <div class="w-full text-center text-2xl font-doto uppercase">No Projects Avilable</div>
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
    <x-modal name="project" :show="$errors->projectDeletion->isNotEmpty()" focusable>
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 dark:text-white shadow-lg rounded-lg p-6">
            <!-- Form -->
            <form x-data="formHandler()" id="projectform" action="{{ route('portfolio.submitproject') }}" method="POST" enctype="multipart/form-data" >
                @csrf()
                <!-- Modern Thumbnail Upload with Preview -->
                {{-- <label class="block mt-4 font-medium">Thumbnail:</label> --}}
                <div class="w-full mb-4 border-2 border-dashed border-gray-300 dark:border-gray-600 p-4 rounded-lg flex flex-col items-center justify-center cursor-pointer bg-gray-50 dark:bg-gray-700 hover:border-blue-500 transition"
                    x-on:click="$refs.fileInput.click()"
                    x-on:dragover.prevent="dragging = true"
                    x-on:dragleave.prevent="dragging = false"
                    x-on:drop.prevent="handleDrop">

                    <!-- Hidden File Input -->
                    <input type="file" name="thumbnail" x-ref="fileInput" @change="previewImage" class="hidden">

                    <!-- Thumbnail Preview -->
                    <template x-if="form.thumbnailPreview">
                        <img :src="form.thumbnailPreview" class="w-40 h-40 object-cover rounded-lg shadow-md">
                    </template>

                    <!-- Default Upload Text -->
                    <template x-if="!form.thumbnailPreview">
                        <div class="text-center">
                            <span class="text-gray-500 dark:text-gray-400">Drag & Drop or Click to Upload Thumbnail</span>
                        </div>
                    </template>
                </div>

                <div class="flex gap-4">
                    <!-- Title -->
                    {{-- <label class="block mb-2">Title:</label> --}}
                    <input type="text" name="title" placeholder="Title" x-model="form.title" class="w-full border dark:border-gray-600 p-2 rounded bg-blue2 dark:bg-gray-700 dark:text-white">
                    
                    <!-- URL -->
                    {{-- <label class="block mt-4">Project URL:</label> --}}
                    <input type="url" name="url" x-model="form.url" placeholder="URL" class="w-full border dark:border-gray-600 p-2 rounded bg-blue2 dark:bg-gray-700 dark:text-white">    
                </div>

                <!-- Short Description -->
                {{-- <label class="block mt-4 hidden">Short Description:</label> --}}
                <textarea name="short_description" placeholder="Short Description" x-model="form.short_description" class="w-full mt-4 border dark:border-gray-600 p-2 rounded bg-blue2 dark:bg-gray-700 dark:text-white"></textarea>
                
                <!-- Full Description -->
                {{-- <label class="block mt-4 hidden">Description:</label> --}}
                <div id="quilldescription" class="w-full h-48 border dark:border-gray-600 rounded bg-blue2 dark:bg-gray-700 dark:text-white"></div>
                <input type="hidden" name="description" id="description">
                
                <!-- Checkbox Fields -->
                <div class="mt-4 flex gap-4 justify-between">
                    <label class="flex items-center p-1 rounded dark:bg-gray-700 px-3 w-full">
                        <input type="checkbox" name="public" x-model="form.is_public" class="mr-2 rounded">
                        Public
                    </label>
                    <label class="flex items-center p-1 rounded dark:bg-gray-700 px-3 w-full">
                        <input type="checkbox" name="searchable" x-model="form.is_searchable" class="mr-2 rounded">
                        Searchable
                    </label>
                    <label class="flex items-center p-1 rounded dark:bg-gray-700 px-3 w-full">
                        <input type="checkbox" name="active" x-model="form.is_active" class="mr-2 rounded">
                        Active
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="mt-4 text-white px-4 py-2 rounded uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 w-full">
                    Submit
                </button>
            </form>
        </div>
    </x-modal>
    
    <script>
    let tableDataInstance = null; // Global reference for updating data dynamically
    function tableData(data) {
        return tableDataInstance = {
            projects: data ?? [],
            search: "",
            currentPage: 1,
            perPage: 6,
    
            filteredData() {
                let filtered = this.projects.filter(project => project.title.toLowerCase().includes(this.search.toLowerCase()));
                return filtered.slice((this.currentPage - 1) * this.perPage, this.currentPage * this.perPage);
            },
            
            totalPages() {
                // console.log(this.projects.filter(project => project.title.toLowerCase().includes(this.search.toLowerCase())).length,this.perPage);
                return Math.ceil(this.projects.filter(project => project.title.toLowerCase().includes(this.search.toLowerCase())).length / this.perPage);
            },
    
            prevPage() {
                if (this.currentPage > 1) this.currentPage--;
            },
    
            nextPage() {
                if (this.currentPage < this.totalPages()) this.currentPage++;
            },
    
            deleteproject(index) {
                this.projects.splice(index, 1);
            }
        };
    }

    function formHandler() {
        return {
            form: {
                title: '',
                thumbnail: '',
                thumbnailPreview: '',
                url: '',
                short_description: '',
                description: '',
                is_public: false,
                is_searchable: false,
                is_active: false,
            },

            previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.form.thumbnailPreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    this.form.thumbnail = file; // Store the file for AJAX submission
                }
            },

            handleDrop(event) {
                event.preventDefault();
                const file = event.dataTransfer.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.form.thumbnailPreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                    this.form.thumbnail = file; // Store the file for AJAX submission
                }
            },
        };
    }

    function fetchScreenshot(url) {
        fetch(`/getscreenshot?url=${encodeURIComponent(url)}`)
            .then(res => res.json())
            .then(data => {
                if (data.screenshot) {
                    screenshot = data.screenshot;
                }
            })
            .catch(error => console.error('Error:', error));
    }
    </script>
</x-dashboard-layout>
