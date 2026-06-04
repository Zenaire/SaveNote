<div class="min-h-screen bg-zinc-950 text-white p-6">

    <div class="min-h-screen relative overflow-hidden bg-[#0f0f17] text-white">

        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-[#050816] via-[#060B1F] to-[#02030A]"></div>
            <div class="absolute top-[-200px] left-[-100px] w-[600px] h-[600px] bg-[#0f0f17] blur-[140px] rounded-full">
            </div>
            <div
                class="absolute bottom-[-250px] right-[-100px] w-[700px] h-[700px] bg-[#0f0f17] blur-[160px] rounded-full">
            </div>
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
                        My Categories
                    </h1>
                    <p class="text-blue-200/60 mt-2">
                        Organize your notes with modern tags ✨
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="/dashboard"
                        class="bg-white/5 border border-white/10 backdrop-blur-xl px-5 py-3 rounded-2xl hover:bg-white/10 transition font-semibold text-white">
                        Dashboard
                    </a>
                </div>
            </div>

            <div
                class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-6 mb-10 shadow-2xl shadow-black/20">
                <div class="flex flex-col md:flex-row gap-4 items-center">
                    <div class="relative w-full flex-1">
                        <input id="categoryInput" type="text" placeholder="Enter new category name..."
                            class="w-full bg-black/40 border border-white/10 rounded-2xl pl-12 pr-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500/50 focus:ring-1 focus:ring-blue-500/50 transition-all">
                    </div>

                    <a href="/createkategori" class="w-full md:w-auto shrink-0">
                        <button
                            class="w-full bg-gradient-to-r bg-blue-500 px-8 py-4 rounded-2xl font-semibold shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition flex items-center justify-center gap-2">
                            <span>+</span> Add Category
                        </button>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between mb-6 border-b border-white/5 pb-4">
                <div class="flex items-center gap-4">
                    <h2 class="text-2xl font-bold text-white">
                        Your Categories
                    </h2>
                    <span id="count"
                        class="text-xs bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full border border-blue-400/20">
                        {{ count($categories ?? []) }} Categories
                    </span>
                </div>
            </div>

            <div id="categoryGrid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch">

                @forelse($categories ?? [] as $category)

                <div wire:key="category-{{ $category->id ?? loop->index }}"
                    class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-[28px] p-6 hover:border-blue-400/30 hover:-translate-y-1 transition duration-300 shadow-2xl shadow-black/20 flex flex-col relative group">


                    <h2 class="text-xl font-bold text-white line-clamp-1 mb-6">
                        {{ $category->name ?? 'Category Name' }}
                    </h2>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                    <div class="flex items-start justify-between mb-2">
                        <div class="flex gap-3 text-sm opacity-0 group-hover:opacity-100 transition-opacity">
                            <a href="/editkategori/{{ $category->id ?? '' }}"
                                class="text-zinc-400 hover:text-white transition">
                                Edit
                            </a>
                            <button wire:click="destroy({{ $category->id ?? '' }})"
                                wire:confirm="Yakin ingin menghapus kategori ini?"
                                class="text-red-400 hover:text-red-300 transition">
                                Delete
                            </button>
                        </div>
                    </div>
                        <div class="text-xs text-blue-100/30">
                            Updated {{ $category->updated_at ? $category->updated_at->diffForHumans() : 'Just now' }}
                        </div>
                    </div>

                </div>

                @empty

                <div
                    class="col-span-full flex flex-col items-center justify-center py-16 text-center bg-white/5 border border-white/10 rounded-[28px] backdrop-blur-sm">
                    <div class="text-4xl mb-4">
                        🏷️
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">
                        Belum ada kategori
                    </h3>
                    <p class="text-gray-400 text-sm">
                        Buat kategori pertamamu sekarang juga!
                    </p>
                </div>

                @endforelse

            </div>

        </div>
    </div>
</div>