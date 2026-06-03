<div class="max-w-6xl mx-auto p-6">

    <div class="flex items-center justify-between mb-8">

        <div>
            <h1 class="text-3xl font-bold">
                Pilih Note
            </h1>

            <p class="text-zinc-400">
                Folder: {{ $folder->name }}
            </p>
        </div>

        <a href="/hmmfolders/{{ $folder->id }}"
           class="px-4 py-2 bg-zinc-700 rounded">
            Kembali
        </a>

    </div>

    <div class="grid gap-4">

        @foreach($notes as $note)

            <div class="p-4 rounded border border-white/10 bg-white/5 flex justify-between items-center">

                <div>
                    <h2 class="font-semibold">
                        {{ $note->title }}
                    </h2>
                </div>

                <button
                    wire:click="addToFolder({{ $note->id }})"
                    class="px-4 py-2 bg-blue-600 rounded"
                >
                    Masukkan ke Folder
                </button>

            </div>

        @endforeach

    </div>

</div>
