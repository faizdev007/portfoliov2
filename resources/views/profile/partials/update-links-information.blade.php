<!-- Dynamic Fields -->
<div id="formContainer" class="mb-6"></div>


<script type="application/json" id="infoData">
    {!! json_encode([
        'skills' => $user ? $user->skills : [],
        'interests' => $user ? $user->interests : [],
        'languages' => $user ? $user->languages : [],
        'social_links' => $user ? $user->social_links : [] ])!!}
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
       
        document.getElementById('searchmodal').addEventListener('click',function(){
            
        });
    });
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
        fieldWrapper.classList.add("mt-4",'border-2','relative', 'border-dashed', 'border-gray-400', 'dark:border-gray-400', 'p-4', 'rounded-md');
        
        const label = document.createElement("label");
        label.classList.add("block", "capitalize","dark:text-white","font-bold","text-xl");
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
        addButton.classList.add("m-1", "text-blue-500", "border-2","absolute","top-0","end-0", "p-1", "rounded", "font-bungeeShade", "text-gray-600", "border-gray-400");
        addButton.textContent = "+ Add";
        addButton.addEventListener("click", () => {
            items.push("");
            renderItems();
        });
        
        fieldWrapper.appendChild(addButton);
        container.appendChild(fieldWrapper);
    });
});

</script>