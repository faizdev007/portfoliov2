<!-- Dynamic Fields -->
<div id="formContainer" class="mb-6">
    <div class="mt-4 border-2 relative border-dashed border-gray-400 dark:border-gray-400 p-4 rounded-md">
        <label class="block capitalize dark:text-white font-bold text-xl">skills</label>
        <div class="grid gap-4 md:grid-cols-4 sm:grid-cols-3 grid-cols-2"></div>
        <button x-on:click.prevent="$dispatch('open-modal', 'skills')" title="Add New skill" id="addskill" type="button" class="m-1 text-blue-500 border-2 dark:bg-gray-200 absolute top-0 end-0 p-1 rounded font-bungeeShade text-gray-600 border-gray-400">+ Add</button>
    </div>
</div>

<x-modal name="skills" class="relative" :show="$errors->projectDeletion->isNotEmpty()" focusable>
    <div id="skillblock"></div>
</x-modal>