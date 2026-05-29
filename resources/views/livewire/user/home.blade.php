<div class="min-h-screen bg-zinc-950 text-white p-6">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold">My Notes</h1>
            <p class="text-zinc-400 mt-1">
                Welcome back
            </p>
        </div>

        <div class="flex items-center gap-3">
            <button
                class="bg-white text-black px-5 py-2 rounded-xl font-medium hover:scale-105 transition"
            >
                + New Note
            </button>

            <form action="" method="POST">
                @csrf
                <button
                    class="border border-zinc-700 px-5 py-2 rounded-xl hover:bg-zinc-900 transition"
                >
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Search + Filter -->
    <div class="grid md:grid-cols-3 gap-4 mb-8">

        <div class="md:col-span-2">
            <input
                type="text"
                placeholder="Search notes..."
                class="w-full bg-zinc-900 border border-zinc-800 rounded-2xl px-5 py-3 outline-none focus:border-zinc-600"
            >
        </div>

        <div>
            <select
                class="w-full bg-zinc-900 border border-zinc-800 rounded-2xl px-5 py-3 outline-none focus:border-zinc-600"
            >
                <option>All Categories</option>
                <option>Personal</option>
                <option>Study</option>
                <option>Work</option>
            </select>
        </div>

    </div>

    <!-- Notes Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Card -->
        <div class="bg-zinc-900 border border-zinc-800 rounded-3xl p-5 hover:border-zinc-700 transition">

            <div class="flex items-start justify-between mb-4">
                <span class="text-xs bg-zinc-800 px-3 py-1 rounded-full text-zinc-300">
                    Personal
                </span>

                <div class="flex gap-2">
                    <button class="text-zinc-400 hover:text-white transition">
                        Edit
                    </button>

                    <button class="text-red-400 hover:text-red-300 transition">
                        Delete
                    </button>
                </div>
            </div>

            <h2 class="text-xl font-semibold mb-2">
                My First Note
            </h2>

            <p class="text-zinc-400 text-sm leading-relaxed mb-4 line-clamp-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quasi quidem modi adipisci consequatur natus nemo.
            </p>

            <div class="text-xs text-zinc-500">
                Updated 2 hours ago
            </div>

        </div>

        <!-- Empty State Example -->
        {{--
        <div class="col-span-full">
            <div class="border border-dashed border-zinc-700 rounded-3xl p-12 text-center">
                <h2 class="text-2xl font-semibold mb-2">No Notes Yet</h2>
                <p class="text-zinc-400 mb-6">
                    Start creating your first note.
                </p>

                <button
                    class="bg-white text-black px-5 py-2 rounded-xl font-medium"
                >
                    Create Note
                </button>
            </div>
        </div>
        --}}

    </div>

</div>