<div class="max-w-5xl mx-auto p-6">

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold">
            {{ $folder->name }}
        </h1>

        <a href="/folders" class="px-4 py-2 bg-blue-600 rounded">
            Back To List
        </a>

        <a href="/ViewNotes/{{ $folder->id }}" class="px-4 py-2 bg-blue-600 rounded">
            Tambahkan Note
        </a>
    </div>

    @if(count($notes) === 0)
        <div class="text-zinc-400">
            Folder ini belum punya note.
        </div>
    @endif

    <div class="grid gap-4">

        @foreach($notes as $note)

            <div class="p-4 rounded border border-white/10 bg-white/5 flex justify-between items-center">

                <div>
                    <h2 class="font-semibold">
                        {{ $note->title }}
                    </h2>
                </div>

                <button
                    wire:click="removeFromFolder({{ $note->id }})"
                    class="text-red-400 hover:text-red-300"
                >
                    Keluarkan
                </button>

            </div>

        @endforeach

    </div>

</div>