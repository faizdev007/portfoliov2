<x-dashboard-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-white text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot> --}}
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

                <form x-data="formHandler()" action="{{ Route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class=" mb-8 relative flex gap-2">
                        <!-- Avatar Upload -->
                        <div x-data="{ avatarPreview: '{{ isset($info->avatar) ? Storage::url("avatars/$info->avatar") : Storage::url("profile/avatar.png") }}'}" class="relative z-10 p-3">
                            <label class="block hidden text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Avatar</label>
                            <div class="flex items-center space-x-4">
                                <!-- Clickable Image for Upload -->
                                <div class="h-40 w-32 border-gray-900 rounded-lg overflow-hidden border dark:border-gray-700 cursor-pointer" @click="$refs.avatarInput.click()">
                                    <img :src="avatarPreview || ''" class="object-cover w-full h-full" alt="Avatar">
                                </div>
                                <!-- Hidden File Input -->
                                <input type="file" @change="let file = $event.target.files[0]; avatarPreview = URL.createObjectURL(file)" class="hidden" name="avatar" x-ref="avatarInput">
                            </div>
                        </div>
                    
                        <!-- Cover Photo Upload -->
                        <div x-data="{ coverPreview: `{{ isset($info->cover) ? Storage::url("covers/$info->cover") : Storage::url('profile/placeholder.jpg') }}` }" class="absolute w-full z-0">
                            <label class="block text-sm font-medium hidden text-gray-700 dark:text-gray-200 mb-2">Cover Photo</label>
                            <div class="w-full h-48 border-gray-900 overflow-hidden border dark:border-gray-700">
                                <img :src="coverPreview || ''" class="object-cover w-full h-full" alt="cover">
                            </div>
                            <input type="file" @change="let file = $event.target.files[0]; coverPreview = URL.createObjectURL(file)" class="hidden" name="cover" id="coverInput">
                            <label for="coverInput" class="absolute bg-gray-400 opacity-75 top-0 right-0 inline-block p-2 m-1 dark:text-white text-sm rounded cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                </svg>                                  
                            </label>
                        </div>
                    </div>
                    
                    <div class="md:flex gap-2 mb-6">
                        <div class="w-full mb-2">
                            <label class="block">Full Name</label>
                            {{-- <input type="text" name="fullname" value="{{old('fullname',$info->fullname ?? '')}}" required class="w-full border-b-2 p-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-gray-100"> --}}
                            <x-text-input type="" type="text" name="fullname" class="w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0" value="{{old('fullname',$info->fullname ?? '')}}" required ></x-text-input>
                            @error('fullname')
                                <x-input-error messages="{{ $error }}"></x-input-error>
                            @enderror
                        </div>
                        <div class="w-full mb-2">
                            <label class="block">Portfilio Name</label>
                            {{-- <input type="text" name="portfolioname" value="{{old('portfolioname',$info->portfolioname ?? '')}}" required class="w-full border p-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-gray-100"> --}}
                            <x-text-input type="" type="text" name="portfolioname" class="w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0" value="{{old('portfolioname',$info->portfolioname ?? '')}}" required></x-text-input>
                            @error('portfolioname')
                                <x-input-error messages="{{ $error }}"></x-input-error>
                            @enderror
                        </div>
                        <div class="w-full mb-2">
                            <label class="block">Email</label>
                            {{-- <input type="text" name="email" value="{{old('email',$info->email ?? '')}}" required class="w-full border p-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-gray-100"> --}}
                            <x-text-input type="" type="text" name="email" class="w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0" value="{{old('email',$info->email ?? '')}}" required> </x-text-input>
                            @error('email')
                                <x-input-error messages="{{ $error }}"></x-input-error>
                            @enderror
                        </div>
                    </div>

                    <!-- Text Fields -->
                    <div>
                        <label class="block">Title</label>
                        <div class="md:flex gap-2">
                            <x-text-input type="text" name="title" value="{{old('title'),$info->title ?? '' }}" required class="w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0"></x-text-input>
                            <x-text-input type="text" name="job_title" value="{{old('job_title') , $info->job_title ?? ''}}" required class="w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0"></x-text-input>
                            {{-- <input  class="w-full mb-2 border p-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-gray-100">
                            <input class="w-full mb-2 border p-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-gray-100"> --}}
                        </div>
                    </div>
                    
                    <!-- Bio -->
                    <div class="mt-4">
                        <label class="block">short about me</label>
                        <textarea name="short_describtion" rows="4" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0">{{$info->short_describtion ?? old('short_describtion') }}</textarea>
                    </div>

                    <!-- Bio -->
                    <div class="mt-4">
                        <label class="block">Bio</label>
                        <textarea name="bio" rows="10" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full border-b-2 bg-gray-200 rounded-none border-gray-800 border-x-0 border-t-0">{{$info->bio ?? old('bio') }}</textarea>
                    </div>

                    <!-- Dynamic Fields -->
                    <div id="formContainer" class="mb-6"></div>

                    <div class="mb-6">
                        <div id="educationFields">
                            <label>Education Information</label>
                            @if (isset($info) && $info->education)
                                @foreach (json_decode($info->education) as $edu)
                                    <div class="education-group md:flex gap-2 mt-4">
                                        <input placeholder="Institute Name" type="text" name="education[0][institute]" value="{{$edu->institute}}" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                                        
                                        <input placeholder="Degree" type="text" name="education[0][degree]" value="{{$edu->degree}}" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                            
                                        <input placeholder="Year" type="number" name="education[0][year]" value="{{$edu->year}}" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                                        
                                        <button type="button" class="remove-edu w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
                                    </div>
                                @endforeach  
                            @endif
                        </div>
                        <button type="button" id="addEducation" class="text-blue-500">+ Add Education</button>
                    </div>
                    
                    <div class="mb-6">
                        <div id="experienceFields">
                            <label>Your Experiance</label>
                            @if (isset($info) && $info->experience)
                                @foreach (json_decode($info->experience) as $exp)
                                    <div class="experience-group mt-4 md:flex gap-2">
                                        <input type="text" name="experience[0][company]" value="{{$exp->company}}" placeholder="Company Name" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="text" name="experience[0][job_title]" value="{{$exp->job_title}}" placeholder="Job Title" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="number" name="experience[0][start_year]" value="{{$exp->start_year}}" placeholder="Start Year" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="number" name="experience[0][end_year]" value="{{$exp->end_year}}" placeholder="End Year" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <button type="button" class="remove-exp w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
                                    </div>
                                @endforeach                                
                            @endif
                        </div>
                    
                        <button type="button" id="addExperience" class="mt-2 text-blue-500">+ Add Experience</button>
                    </div>
                    <div class="mb-6">
                        <div id="certificationFields">
                            <label>Your Certification</label>
                            @if (isset($info) && $info->certifications)
                                @foreach (json_decode($info->certifications) as $cert)
                                    <div class="certification-group mt-4 md:flex gap-2">
                                        <input type="text" name="certifications[0][name]" value="{{$cert->name}}" placeholder="Certification Name" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="text" name="certifications[0][organization]" value="{{$cert->organization}}" placeholder="Issuing Organization" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="date" name="certifications[0][issue_date]" value="{{$cert->issue_date}}" placeholder="Issue Date" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                    
                                        <input type="date" name="certifications[0][expiry_date]" value="{{$cert->expiry_date}}" placeholder="Expiry Date (Optional)" class="border p-2 rounded w-full dark:bg-gray-800 mb-2">
                    
                                        <button type="button" class="remove-cert w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    
                        <button type="button" id="addCertification" class="mt-2 text-blue-500">+ Add Certification</button>                    
                    </div> 
                    <!-- Submit Button -->
                    <button type="submit" class="mt-6 w-full text-white px-4 py-2 uppercase bg-gray-700 hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script type="application/json" id="infoData">
        {!! json_encode([
            'skills' => $info ? $info->skills : [],
            'interests' => $info ? $info->interests : [],
            'languages' => $info ? $info->languages : [],
            'social_links' => $info ? $info->social_links : [] ])!!}
    </script>
    <script>
        function formHandler() {
            return {
                skills: [],
                interests: []
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
        const fields = ["skills", "interests", "languages", "social_links"];
        const info = JSON.parse(document.getElementById("infoData").textContent || "{}");
        
        const gridCols = {
            skills: "md:grid-cols-6 sm:grid-cols-3 grid-cols-2",
            interests: "md:grid-cols-3 grid-cols-2",
            languages: "md:grid-cols-6 sm:grid-cols-3 grid-cols-2",
            social_links: "md:grid-cols-2 grid-cols-1"
        };
        
        const container = document.getElementById("formContainer");
        
        fields.forEach((field) => {
            const fieldWrapper = document.createElement("div");
            fieldWrapper.classList.add("mt-4");
            
            const label = document.createElement("label");
            label.classList.add("block", "capitalize");
            label.textContent = field.replace("_", " ");
            fieldWrapper.appendChild(label);
            
            const gridContainer = document.createElement("div");
            gridContainer.className = `grid gap-4 ${gridCols[field]}`;
            fieldWrapper.appendChild(gridContainer);

            const items = info[field] != null && info[field].length != 0 ? JSON.parse(info[field]) : [];
            
            function renderItems() {
                gridContainer.innerHTML = "";
                items.forEach((item, idx) => {
                    const itemWrapper = document.createElement("div");
                    itemWrapper.classList.add("md:flex", "items-center", "gap-2", "relative");
                    
                    const input = document.createElement("input");
                    input.type = "text";
                    input.name = `${field}[]`;
                    input.value = item;
                    input.classList.add("w-full", "border", "p-2", "rounded", "bg-gray-200", "dark:bg-gray-700", "dark:text-gray-100");
                    input.addEventListener("input", (e) => {
                        items[idx] = e.target.value;
                    });
                    
                    const removeButton = document.createElement("button");
                    removeButton.type = "button";
                    removeButton.classList.add("text-red-500", "absolute", "-top-2", "-right-2", "dark:bg-gray-800", "rounded-full", "bg-gray-300", "border", "border-gray-800", "hover:bg-gray-200", "dark:hover:bg-gray-700");
                    removeButton.innerHTML = `
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>`;
                    removeButton.addEventListener("click", () => {
                        items.splice(idx, 1);
                        renderItems();
                    });
                    
                    itemWrapper.appendChild(input);
                    itemWrapper.appendChild(removeButton);
                    gridContainer.appendChild(itemWrapper);
                });
            }
            
            renderItems();
            
            const addButton = document.createElement("button");
            addButton.type = "button";
            addButton.classList.add("mt-2", "text-blue-500");
            addButton.textContent = "+ Add";
            addButton.addEventListener("click", () => {
                items.push("");
                renderItems();
            });
            
            fieldWrapper.appendChild(addButton);
            container.appendChild(fieldWrapper);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let eduIndex = 1; // Track the number of fields

        document.getElementById('addEducation').addEventListener('click', function() {
            let educationFields = document.getElementById('educationFields');
            let newField = document.createElement('div');
            newField.classList.add('education-group', 'md:flex', 'gap-2' ,'mt-4');
            newField.innerHTML = `
                <input placeholder="Institute Name" type="text" name="education[${eduIndex}][institute]" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                
                <input placeholder="Degree" type="text" name="education[${eduIndex}][degree]" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input placeholder="Year" type="number" name="education[${eduIndex}][year]" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>
                
                <button type="button" class="remove-edu w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
            `;
            educationFields.appendChild(newField);
            eduIndex++;

            // Add remove event
            newField.querySelector('.remove-edu').addEventListener('click', function() {
                newField.remove();
            });
        });

        // Remove existing fields if remove button is clicked
        document.querySelectorAll('.remove-edu').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let expIndex = 1; // Track the number of fields

        document.getElementById('addExperience').addEventListener('click', function() {
            let experienceFields = document.getElementById('experienceFields');
            let newField = document.createElement('div');
            newField.classList.add('experience-group', 'mt-4','md:flex', 'gap-2');
            newField.innerHTML = `
                <input type="text" name="experience[${expIndex}][company]" placeholder="Company Name" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="text" name="experience[${expIndex}][job_title]" placeholder="Job Title" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="number" name="experience[${expIndex}][start_year]" placeholder="Start Year" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="number" name="experience[${expIndex}][end_year]" placeholder="End Year" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <button type="button" class="remove-exp w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
            `;
            experienceFields.appendChild(newField);
            expIndex++;

            // Add remove event
            newField.querySelector('.remove-exp').addEventListener('click', function() {
                newField.remove();
            });
        });

        // Remove existing fields if remove button is clicked
        document.querySelectorAll('.remove-exp').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        let certIndex = 1; // Track the number of fields

        document.getElementById('addCertification').addEventListener('click', function() {
            let certificationFields = document.getElementById('certificationFields');
            let newField = document.createElement('div');
            newField.classList.add('certification-group', 'mt-4', 'md:flex', 'gap-2');
            newField.innerHTML = `
                <input type="text" name="certifications[${certIndex}][name]" placeholder="Certification Name" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="text" name="certifications[${certIndex}][organization]" placeholder="Issuing Organization" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="date" name="certifications[${certIndex}][issue_date]" placeholder="Issue Date" class="border p-2 rounded w-full dark:bg-gray-800 mb-2" required>

                <input type="date" name="certifications[${certIndex}][expiry_date]" placeholder="Expiry Date (Optional)" class="border p-2 rounded w-full dark:bg-gray-800 mb-2">

                <button type="button" class="remove-cert w-full dark:bg-gray-700 p-2 rounded bg-gray-200 broder border-gray-900 hover:bg-gray-100 hover:dark:bg-gray-600 text-red-500 mb-2">Remove</button>
            `;
            certificationFields.appendChild(newField);
            certIndex++;

            // Add remove event
            newField.querySelector('.remove-cert').addEventListener('click', function() {
                newField.remove();
            });
        });

        // Remove existing fields if remove button is clicked
        document.querySelectorAll('.remove-cert').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });
    });
    </script>
</x-dashboard-layout>
