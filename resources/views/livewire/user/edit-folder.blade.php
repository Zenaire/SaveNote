<div class="max-w-md mx-auto p-6">

    <h1 class="text-2xl font-bold mb-5">Edit Folder</h1>

    <div class="mb-4">
        <label class="block mb-1">Folder Name</label>

        <input type="text" wire:model="name" class="w-full border p-2 rounded text-black">

        @error('name')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block mb-2">Nama Folder</label>

        <input type="text" wire:model="name" class="w-full p-3 rounded bg-white/5 border border-white/10">
    </div>

    <div class="mb-4">
        <label class="block mb-2">Thumbnail Folder</label>

        <input type="file" wire:model="thumbnail" class="w-full p-3 rounded bg-white/5 border border-white/10">
    </div>

    @if($thumbnail)
    <img src="{{ $thumbnail->temporaryUrl() }}" class="w-64 h-40 object-cover rounded mb-4">
    @elseif($oldThumbnail)
    <img src="{{ asset('storage/' . $oldThumbnail) }}" class="w-64 h-40 object-cover rounded mb-4">
    @endif

    <button wire:click="update" class="px-4 py-2 bg-blue-600 rounded">
        Simpan
    </button>

    <button wire:click="update" class="bg-yellow-500 text-black px-4 py-2 rounded">
        Update Folder
    </button>

</div>