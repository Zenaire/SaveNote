<div class="max-w-md mx-auto p-6">

    <h1 class="text-2xl font-bold mb-5">Create Folder</h1>

    <div class="mb-4">
        <label class="block mb-1">Folder Name</label>
        <input type="text" wire:model="name"
               class="w-full border p-2 rounded">
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block mb-1">Thumbnail (optional)</label>
        <input type="file" wire:model="thumbnail"
               class="w-full border p-2 rounded">

        @error('thumbnail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

        @if ($thumbnail)
            <img src="{{ $thumbnail->temporaryUrl() }}"
                 class="mt-3 w-32 h-32 object-cover rounded">
        @endif
    </div>

    <button wire:click="save"
            class="bg-blue-500 text-white px-4 py-2 rounded">
        Create Folder
    </button>

</div>
