<div class="max-w-4xl mx-auto p-8">

    <div class="mb-8">
        <a href="/dashboard" class="text-blue-400 hover:text-blue-300">
            ← Kembali
        </a>
    </div>

    @if($note->media)
    <div class="w-full max-h-[400px] bg-black/20 rounded-2xl mb-8 overflow-hidden flex items-center justify-center">
    <img
        src="{{ asset('storage/' . $note->media) }}"
        class="max-w-full max-h-[400px] object-contain"
    >
</div>
    @endif

    <h1 class="text-4xl font-bold mb-3">
        {{ $note->title }}
    </h1>

    @if($note->subtitle)
    <h2 class="text-xl text-zinc-400 mb-6">
        {{ $note->subtitle }}
    </h2>
    @endif

    <div class="text-sm text-zinc-500 mb-8">
        Updated {{ $note->updated_at->diffForHumans() }}
    </div>

    <div class="prose prose-invert max-w-none whitespace-pre-wrap">
        {{ $note->content }}
    </div>

</div>