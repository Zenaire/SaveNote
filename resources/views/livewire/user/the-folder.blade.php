{{-- resources/views/livewire/folder-notes.blade.php --}}

<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap');

        .fn-page {
            max-width: 860px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
            font-family: 'Sora', sans-serif;
            color: #f0f2f7;
        }

        .fn-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            gap: 12px;
            flex-wrap: wrap;
        }

        .fn-header h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #f0f2f7;
        }

        .fn-header p {
            font-size: 0.85rem;
            color: #6b7a99;
            margin-top: 3px;
        }

        .fn-header-right {
            display: flex;
            gap: 10px;
        }

        .fn-btn {
            padding: 0.5rem 1.1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            border: none;
            transition: background 0.15s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-family: 'Sora', sans-serif;
        }

        .fn-btn-back {
            background: #151b2a;
            color: #6b7a99;
            border: 0.5px solid rgba(255,255,255,0.08);
        }

        .fn-btn-back:hover {
            background: #1c2338;
            color: #f0f2f7;
            border-color: rgba(255,255,255,0.15);
        }

        .fn-btn-primary {
            background: #3b82f6;
            color: #fff;
        }

        .fn-btn-primary:hover {
            background: #2563eb;
        }

        .fn-folder-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
        }

        .fn-folder-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(59,130,246,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: #3b82f6;
        }

        .fn-folder-name {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .fn-note-count {
            font-size: 0.75rem;
            background: rgba(59,130,246,0.12);
            color: #3b82f6;
            border-radius: 20px;
            padding: 3px 10px;
            font-weight: 500;
            margin-left: 4px;
        }

        .fn-section-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #4a5578;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .fn-notes-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .fn-note-card {
            background: #111520;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.15s, border-color 0.15s;
        }

        .fn-note-card:hover {
            background: #151b2a;
            border-color: rgba(255,255,255,0.15);
        }

        .fn-note-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #f0f2f7;
        }

        .fn-note-subtitle {
            font-size: 0.78rem;
            color: #6b7a99;
            margin-top: 3px;
        }

        .fn-btn-remove {
            background: rgba(248,113,113,0.08);
            color: #f87171;
            border: 0.5px solid rgba(248,113,113,0.2);
            border-radius: 8px;
            padding: 0.35rem 0.85rem;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s, color 0.15s;
            font-family: 'Sora', sans-serif;
        }

        .fn-btn-remove:hover {
            background: rgba(248,113,113,0.18);
            color: #fca5a5;
        }

        .fn-empty-state {
            background: #111520;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 3.5rem 2rem;
            text-align: center;
        }

        .fn-empty-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        .fn-empty-state h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #f0f2f7;
        }

        .fn-empty-state p {
            font-size: 0.85rem;
            color: #6b7a99;
            margin-top: 6px;
        }
    </style>

    <div class="fn-page">

        {{-- Header --}}
        <div class="fn-header">
            <div>
                <h1>{{ $folder->name }}</h1>
                <p>Organize your ideas beautifully ✨</p>
            </div>
            <div class="fn-header-right">
                <a href="/folders" class="fn-btn fn-btn-back">
                    ← Back To List
                </a>
                <a href="/ViewNotes/{{ $folder->id }}" class="fn-btn fn-btn-primary">
                    + Tambahkan Note
                </a>
            </div>
        </div>

        {{-- Folder Meta --}}
        <div class="fn-folder-meta">
            <div class="fn-folder-icon">📁</div>
            <span class="fn-folder-name">{{ $folder->name }}</span>
            <span class="fn-note-count">{{ count($notes) }} notes</span>
        </div>

        {{-- Notes --}}
        @if(count($notes) === 0)

            <div class="fn-empty-state">
                <div class="fn-empty-icon">📝</div>
                <h3>Folder ini belum punya note</h3>
                <p>Tambahkan note pertamamu ke folder ini sekarang!</p>
            </div>

        @else

            <div class="fn-section-label">Notes in this folder</div>

            <div class="fn-notes-list">
                @foreach($notes as $note)
                    <div class="fn-note-card">
                        <div>
                            <div class="fn-note-title">{{ $note->title }}</div>
                            <div class="fn-note-subtitle">
                                Updated {{ $note->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <button
                            wire:click="removeFromFolder({{ $note->id }})"
                            class="fn-btn-remove"
                        >
                            Keluarkan
                        </button>
                    </div>
                @endforeach
            </div>

        @endif

    </div>
</div>