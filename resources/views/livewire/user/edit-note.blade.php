@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">

    <h1 class="text-3xl font-bold mb-6">
        Edit Note
    </h1>

    <form action="{{ route('notes.update', $note->id) }}"
          method="POST"
          class="space-y-4">

        @csrf
        @method('PUT')

        <div>
            <label class="block mb-2">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $note->title) }}"
                   class="w-full border rounded-lg p-3">
        </div>

        <div>
            <label class="block mb-2">Content</label>
            <textarea name="content"
                      rows="6"
                      class="w-full border rounded-lg p-3">{{ old('content', $note->content) }}</textarea>
        </div>

        <button type="submit"
                class="bg-blue-600 text-white px-5 py-3 rounded-lg">
            Update Note
        </button>

    </form>
</div>
@endsection