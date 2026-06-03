<div>
    <h1 class="text-2xl font-bold mb-5">Folders</h1>
    @if(count($folders) === 0)
    <p>Belum ada folder.</p>
    @endif
    <a href="/dashboard" class="relative z-10 text-sm text-blue-400 hover:text-blue-300">
        Back To Dashboard
    </a>
    <a href="/createfolder" class="relative z-10 text-sm text-blue-400 hover:text-blue-300">
        New Folder
    </a>

    <div class="grid gap-3">
        @foreach($folders as $folder)

        <div
            class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[28px] overflow-hidden hover:border-blue-400/30 hover:-translate-y-1 transition duration-300 shadow-2xl shadow-black/20">

            @if($folder->thumbnail)
            <div class="h-48 border-b border-white/10 bg-black/20 overflow-hidden">
                <img src="{{ asset('storage/' . $folder->thumbnail) }}" alt="{{ $folder->name }}"
                    class="w-full h-full object-cover hover:scale-105 transition duration-500">
            </div>
            @else
            <div
                class="h-48 border-b border-white/10 bg-gradient-to-br from-white/5 to-blue-500/10 flex items-center justify-center p-6 text-center overflow-hidden">

                <div
                    class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-500/10 via-transparent to-transparent opacity-50">
                </div>

                <h1 class="text-2xl font-bold text-white/90 line-clamp-3 relative z-10">
                    {{ $folder->name }}
                </h1>

            </div>
            @endif

            <div class="p-6">

                <div class="flex items-center justify-between">

                    <h2 class="text-xl font-bold text-white">
                        {{ $folder->name }}
                    </h2>

                    <a href="/hmmfolder/{{ $folder->id }}"
                        class="relative z-10 text-sm text-blue-400 hover:text-blue-300">
                        Masuk
                    </a>

                    <a href="/editfolder/{{ $folder->id }}"
                        class="relative z-10 text-sm text-blue-400 hover:text-blue-300">
                        Edit
                    </a>
                    <button wire:click="destroy({{ $folder->id }})" wire:confirm="Yakin ingin menghapus folder ini?"
                        class="text-sm text-red-400 hover:text-red-300">
                        Delete
                    </button>

                </div>

                <div class="mt-4 pt-4 border-t border-white/5">

                    <div class="text-xs text-blue-100/30">
                        Updated {{ $folder->updated_at->diffForHumans() }}
                    </div>

                </div>

            </div>

        </div>

        @endforeach
    </div>
</div>