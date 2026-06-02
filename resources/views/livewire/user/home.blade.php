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
                <div class="absolute top-0 right-1/3 w-[300px] h-[700px] bg-[#0f0f17] -rotate-12">
                </div>
                <div class="absolute bottom-0 left-1/2 w-[500px] h-[700px] bg-[#0f0f17] rotate-6"></div>
            </div>

            <div class="absolute inset-0 opacity-[0.03] bg-[#0f0f17]">
            </div>

        </div>

        <!-- CONTENT -->
        <div class="relative z-10 p-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h1 class="text-4xl font-black tracking-tight">
                        My Notes
                    </h1>

                    <p class="text-blue-200/60 mt-2">
                        Organize your ideas beautifully ✨
                    </p>
                </div>
                <h1>Welcome {{ Auth::user()->name}}</h1>

                <div class="flex items-center gap-3">

                    <div>
                        <img src=" https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt=""
                            class="w-10 h-10 rounded-full hover:scale-110 transition-transform duration-200 shadow-md hover:shadow-lg mb-2 ml-5">
                        <a href=" /profile"
                            class="text-white font-semibold bg-gradient-to-r bg-blue-500 px-4 py-2 rounded-2xl shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition">Profile</a>
                        </a>
                    </div>

                    <a class="bg-gradient-to-r bg-blue-500  px-6 py-3 rounded-2xl font-semibold shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition"
                        href="/newNote">
                        + New Note
                    </a>



                    <button wire:click='logout'
                        class="bg-white/5 border  border-white/10 backdrop-blur-xl px-5 py-3 rounded-2xl hover:bg-white/10 transition">
                        Logout
                    </button>

                </div>

            </div>

            <!-- SEARCH -->
            <div class="grid md:grid-cols-3 gap-4 mb-8">

                <div class="md:col-span-2">

                    <input type="text" placeholder="Search notes..."
                        class="w-full bg-white/5 border border-white/10 backdrop-blur-2xl rounded-2xl px-5 py-4 outline-none focus:border-blue-400 transition">

                </div>

                <div>

                    <select
                        class="w-full bg-white/5 border border-white/10 backdrop-blur-2xl rounded-2xl px-5 py-4 outline-none focus:border-blue-400 transition">
                        <option>All Categories</option>
                        <option>Personal</option>
                        <option>Study</option>
                        <option>Work</option>
                    </select>

                </div>

            </div>

            <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6 items-stretch">

                @forelse($notes as $note)
                <div
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
                                <a href="/edit/{{ $note->id }}" class="text-zinc-400 hover:text-white transition">Edit</a>
                                <button wire:click='destroy({{}})' class="text-red-400 hover:text-red-300 transition">Delete</button>
                            </div>
                        </div>

                    @if($note->media)
                    <h1 class="text-xl font-bold text-white mb-1 line-clamp-1" title="{{ $note->title }}">
                        {{ $note->title }}
                    </h1>
                    @endif

                    @if($note->subtitle)
                    <h2 class="text-sm font-medium text-gray-400 mb-3 line-clamp-1" title="{{ $note->subtitle }}">
                        {{ $note->subtitle }}
                    </h2>
                    @else
                    <div class="mb-3 h-5"></div>
                    @endif

                    <p class="text-blue-100/50 text-sm leading-relaxed mb-6 flex-grow line-clamp-3">
                        {{ $note->content }}
                    </p>

                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-white/5">
                        <div class="text-xs text-blue-100/30">
                            Updated {{ $note->updated_at->diffForHumans() }}
                        </div>
                        <button class="text-blue-300 hover:underline text-sm">
                            Read More →
                        </button>
                    </div>

                </div>
                @empty
                <div
                    class="col-span-full flex flex-col items-center justify-center py-16 text-center bg-white/5 border border-white/10 rounded-[28px] backdrop-blur-sm">
                    <div class="text-4xl mb-4">📝</div>
                    <h3 class="text-xl font-bold text-white mb-2">Belum ada catatan</h3>
                    <p class="text-gray-400 text-sm">Tulis ide pertamamu sekarang juga!</p>
                </div>
                @endforelse

            </div>

        </div>