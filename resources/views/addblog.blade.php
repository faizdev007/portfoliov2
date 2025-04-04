<x-dashboard-layout>
    
    <div class="flex p-6 items-center h-full md:overflow-hidden">
        <form id="postForm" action="#" method="POST" enctype="multipart/form-data" 
              class="w-full h-full">
            @csrf

            <div class="md:flex h-full gap-2 overflow-y-hidden grid md:divide-solid md:divide-x dark:divide-gray-700">
                <div class="flex-1 md:w-3/4 md:overflow-auto">
                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block hidden text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" id="title" placeholder="Title" name="title" class="w-full border-b font-bold text-2xl px-0 bg-transparent rounded-none border-gray-800 border-x-0 border-t-0" required>
                    </div>
            
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block hidden text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="description" placeholder="Description" name="description" rows="4" class="w-full border px-0 bg-transparent rounded-none border-b border-0 border-gray-800 focus:outline-none focus:ring-0 focus:border-b-2"></textarea>
                    </div>
            
                    <!-- Content (Quill Editor) -->
                    <div class="mb-4">
                        <label for="postcontent" class="block hidden text-gray-700 dark:text-gray-300">Content</label>
                        <div id="posteditor" class="h-full font-lg dark:text-white"></div>
                        <input type="hidden" name="content" id="postcontent">
                    </div>
                </div>
                <div class="md:px-2 md:w-1/4 flex md:flex-col flex-col-reverse">
                    <!-- Submit Button -->
                    <button type="submit" class="text-white shadow rounded p-2 uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
                        Publish
                    </button>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <!-- Cover Photo Upload -->
                        <div x-data="{ coverPreview: `{{ isset($info->cover) ? Storage::url("covers/$info->cover") : Storage::url('profile/placeholder.jpg') }}` }" class="relative my-3">
                            <label class="block hidden text-sm font-medium hidden text-gray-700 dark:text-gray-200 mb-2">Cover Photo</label>
                            <label for="coverInput" class="w-full overflow-hidden dark:border-gray-700">
                                <img :src="coverPreview || ''" class="object-cover w-full h-full" alt="cover">
                            </label>
                            <input type="file" @change="let file = $event.target.files[0]; coverPreview = URL.createObjectURL(file)" class="hidden" name="thumbnail" id="coverInput">
                        </div>
                    </div>

                    <!-- Tags (JSON Format) -->
                    <div class="mb-4">
                        <label for="tags" class="block text-gray-700 dark:text-gray-300">Tags (comma-separated)</label>
                        <input type="text" id="tags" name="tags" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100" placeholder="e.g., Laravel, PHP, Backend">
                    </div>
                </div>
            </div>
        </form>
    </div> 
</x-dashboard-layout>
