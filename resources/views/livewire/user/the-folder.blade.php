<div class="min-h-screen relative overflow-hidden bg-[#0f0f17] text-white">

    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-[#050816] via-[#060B1F] to-[#02030A]"></div>
        <div class="absolute top-[-200px] left-[-100px] w-[600px] h-[600px] bg-[#0f0f17] blur-[140px] rounded-full">
        </div>
        <div class="absolute bottom-[-250px] right-[-100px] w-[700px] h-[700px] bg-[#0f0f17] blur-[160px] rounded-full">
        </div>
        <div class="absolute inset-0 opacity-[0.03] bg-[#0f0f17]"></div>
    </div>

    <div class="relative z-10 p-8 max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-4xl font-black tracking-tight text-white">
                    {{ $folder->name }}
                </h1>
                <p class="text-blue-200/60 mt-2">
                    Organize your ideas beautifully ✨
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="/folders"
                    class="bg-white/5 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-2xl hover:bg-white/10 transition font-semibold text-white shadow-md flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Back To List
                </a>

                <a href="/ViewNotes/{{ $folder->id }}"
                    class="bg-gradient-to-r bg-blue-500 px-6 py-3 rounded-2xl font-semibold shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition flex items-center justify-center gap-2">
                    + Tambahkan Note
                </a>
            </div>
        </div>

        {{-- Folder Meta Banner --}}
        <div
            class="bg-blue-500/10 border border-blue-500/20 backdrop-blur-md rounded-3xl p-6 mb-10 flex items-center gap-5 shadow-lg shadow-blue-500/5">
            <div
                class="w-14 h-14 bg-blue-500 rounded-2xl flex items-center justify-center text-3xl shadow-lg shadow-blue-500/20 shrink-0">
                📁
            </div>
            <div>
                <p class="text-sm text-blue-300/80 font-medium mb-1">Current Folder</p>
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold text-white tracking-wide">
                        {{ $folder->name }}
                    </h2>
                    <span
                        class="text-xs bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full border border-blue-400/20 font-semibold">
                        {{ count($notes) }} notes
                    </span>
                </div>
            </div>
        </div>

        {{-- Notes Section --}}
        @if(count($notes) === 0)

        <div
            class="w-full flex flex-col items-center justify-center py-20 text-center bg-white/5 border border-white/10 rounded-[32px] backdrop-blur-sm shadow-xl">
            <div class="text-5xl mb-5 opacity-80">📝</div>
            <h3 class="text-2xl font-bold text-white mb-3">
                Folder ini belum punya note
            </h3>
            <p class="text-gray-400 text-base max-w-md">
                Tambahkan note pertamamu ke folder ini sekarang melalui tombol di atas!
            </p>
        </div>

        @else

        <div class="flex items-center justify-between mb-6 border-b border-white/5 pb-4">
            <h3 class="text-sm font-semibold text-zinc-400 uppercase tracking-widest">
                Notes in this folder
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
            @foreach($notes as $note)
            <div wire:key="note-{{ $note->id }}"
                class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[28px] p-6 hover:border-blue-400/30 hover:-translate-y-1 transition duration-300 shadow-2xl shadow-black/20 flex flex-col h-full overflow-hidden relative">

                @if($note->media)
                <div
                    class="-mx-6 -mt-6 mb-5 h-48 shrink-0 relative border-b border-white/10 bg-black/20 overflow-hidden">
                    <img src="{{ asset('storage/' . $note->media) }}" alt="Thumbnail"
                        class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
                @else
                <div
                    class="-mx-6 -mt-6 mb-5 h-48 shrink-0 relative border-b border-white/10 bg-gradient-to-br from-white/5 to-blue-500/10 flex items-center justify-center p-6 text-center overflow-hidden group">
                    <div
                        class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-blue-500/10 via-transparent to-transparent opacity-50">
                    </div>
                    <h1
                        class="text-2xl font-bold text-white/90 line-clamp-3 relative z-10 group-hover:scale-105 transition duration-500">
                        {{ $note->title }}
                    </h1>
                </div>
                @endif

                <div class="flex flex-col flex-grow">
                    <div class="flex items-start justify-between mb-4 min-h-[28px]">
                        <div class="flex-1">
                            @if($note->category)
                            <span
                                class="text-xs bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full border border-blue-400/20">
                                {{ $note->category->name }}
                            </span>
                            @endif
                        </div>
                        <div class="flex gap-3 text-sm shrink-0">
                        </div>
                    </div>

                    @if($note->media)
                    <h1 class="text-xl font-bold text-white mb-1 line-clamp-1">
                        {{ $note->title }}
                    </h1>
                    @endif

                    @if($note->subtitle)
                    <h2 class="text-sm font-medium text-gray-400 mb-3 line-clamp-1">
                        {{ $note->subtitle }}
                    </h2>
                    @else
                    <div class="mb-3 h-5"></div>
                    @endif

                    <p class="text-blue-100/50 text-sm leading-relaxed mb-6 line-clamp-3">
                        {{ $note->content }}
                    </p>
                </div>

                <div class="mt-auto pt-4 border-t border-white/5 flex flex-col gap-4">
                    <div class="flex justify-between items-center text-xs text-blue-100/30 w-full">
                        <span>Updated {{ $note->updated_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex gap-3 text-sm shrink-0">
                        <a href="/edit/{{ $note->id }}" class="text-zinc-400 hover:text-white transition">Edit</a>
                        <button wire:click="destroy('{{ $note->id }}')"
                            class="text-red-400 hover:text-red-300 transition">Delete</button>
                    </div>
                    <button wire:click="removeFromFolder({{ $note->id }})"
                        class="w-full bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500/20 px-5 py-3 rounded-2xl font-semibold transition-all flex items-center justify-center gap-2">
                        Keluarkan
                    </button>
                </div>

            </div>
            @endforeach
        </div>

        @endif

    </div>
</div>