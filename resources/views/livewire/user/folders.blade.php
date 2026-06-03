<div class="min-h-screen bg-zinc-950 text-white p-6">

    <div class="min-h-screen relative overflow-hidden bg-[#0f0f17] text-white">

        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-[#050816] via-[#060B1F] to-[#02030A]"></div>
            <div class="absolute top-[-200px] left-[-100px] w-[600px] h-[600px] bg-[#0f0f17] blur-[140px] rounded-full"></div>
            <div class="absolute bottom-[-250px] right-[-100px] w-[700px] h-[700px] bg-[#0f0f17] blur-[160px] rounded-full"></div>
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-0 left-1/4 w-[400px] h-[800px] bg-[#0f0f17] rotate-12"></div>
                <div class="absolute top-0 right-1/3 w-[300px] h-[700px] bg-[#0f0f17] -rotate-12"></div>
                <div class="absolute bottom-0 left-1/2 w-[500px] h-[700px] bg-[#0f0f17] rotate-6"></div>
            </div>
            <div class="absolute inset-0 opacity-[0.03] bg-[#0f0f17]"></div>
        </div>

        <div class="relative z-10 p-8">

            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-4xl font-black tracking-tight">
                        My Folders
                    </h1>
                    <p class="text-blue-200/60 mt-2">
                        Manage your collections beautifully ✨
                    </p>
                </div>

                    <a href="/dashboard"
                        class="bg-white/5 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-2xl hover:bg-white/10 transition font-semibold text-white">
                        Dashboard
                    </a>
                    <a class="bg-gradient-to-r bg-blue-500 px-6 py-3 rounded-2xl font-semibold shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition"
                        href="/createfolder">
                        + New Folder
                    </a>
                </div>
            </div>

            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch">

                @forelse($folders as $folder)

                <div wire:key="folder-{{ $folder->id }}"
                    class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[28px] p-6 hover:border-blue-400/30 hover:-translate-y-1 transition duration-300 shadow-2xl shadow-black/20 flex flex-col h-full overflow-hidden relative">

                    @if($folder->thumbnail)
                    <div class="-mx-6 -mt-6 mb-5 h-48 shrink-0 relative border-b border-white/10 bg-black/20 overflow-hidden">
                        <img src="{{ asset('storage/' . $folder->thumbnail) }}" alt="{{ $folder->name }}"
                            class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    </div>
                    @else
                    <div class="-mx-6 -mt-6 mb-5 h-48 shrink-0 relative border-b border-white/10 bg-gradient-to-br from-white/5 to-blue-500/10 flex items-center justify-center p-6 text-center overflow-hidden group">
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-500/10 via-transparent to-transparent opacity-50"></div>
                        <h1 class="text-2xl font-bold text-white/90 line-clamp-3 relative z-10 group-hover:scale-105 transition duration-500">
                            {{ $folder->name }}
                        </h1>
                    </div>
                    @endif

                    <div class="flex items-start justify-between mb-4 min-h-[28px]">
                        
                        <div class="flex-1 pr-4">
                            <h2 class="text-xl font-bold text-white line-clamp-1">
                                {{ $folder->name }}
                            </h2>
                        </div>

                        <div class="flex gap-3 text-sm shrink-0 mt-1">
                            <a href="/editfolder/{{ $folder->id }}" class="text-zinc-400 hover:text-white transition">
                                Edit
                            </a>
                            <button wire:click="destroy({{ $folder->id }})" wire:confirm="Yakin ingin menghapus folder ini?" class="text-red-400 hover:text-red-300 transition">
                                Delete
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                        <div class="text-xs text-blue-100/30">
                            Updated {{ $folder->updated_at->diffForHumans() }}
                        </div>
                        
                        <a href="/hmmfolder/{{ $folder->id }}" class="text-blue-300 font-semibold hover:underline text-sm">
                            Masuk →
                        </a>
                    </div>

                </div>

                @empty

                <div wire:key="empty-state-folders"
                    class="col-span-full flex flex-col items-center justify-center py-16 text-center bg-white/5 border border-white/10 rounded-[28px] backdrop-blur-sm">
                    <div class="text-4xl mb-4">
                        📁
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">
                        Belum ada folder
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Buat folder pertamamu sekarang juga!
                    </p>
                </div>

                @endforelse

            </div>

        </div>
    </div>
</div>