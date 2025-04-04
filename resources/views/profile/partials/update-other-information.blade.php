<div class="mb-6 border-dashed border-2 p-4 border-dashed relative border-gray-400 dark:border-gray-400 rounded-md">
    <div id="educationFields">
        <label class="font-bold text-lg">Education Information</label>
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
    <button type="button" id="addEducation" class="text-blue-500 border-2 p-1 rounded absolute top-0 end-0 m-1 font-bungeeShade text-gray-600 border-gray-400">+ Add</button>
</div>

<div class="mb-6 border-dashed border-2 p-4 relative border-gray-400 dark:border-gray-400 rounded-md">
    <div id="experienceFields">
        <label class="font-bold text-lg">Your Experiance</label>
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
    <button type="button" id="addExperience" class="text-blue-500 border-2 p-1 rounded absolute top-0 end-0 m-1 font-bungeeShade text-gray-600 border-gray-400">+ Add</button>
</div>

<div class="mb-6 border-dashed border-2 p-4 relative border-gray-400 dark:border-gray-400 rounded-md">
    <div id="certificationFields">
        <label class="font-bold text-lg">Your Certification</label>
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

    <button type="button" id="addCertification" class="text-blue-500 border-2 p-1 rounded absolute top-0 end-0 m-1 font-bungeeShade text-gray-600 border-gray-400">+ Add</button>                    
</div>

<script>
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