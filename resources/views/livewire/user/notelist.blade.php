<div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap');

        .pn-page {
            max-width: 860px;
            margin: 0 auto;
            padding: 2.5rem 1.5rem;
            font-family: 'Sora', sans-serif;
            color: #f0f2f7;
        }

        .pn-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            gap: 12px;
            flex-wrap: wrap;
        }

        .pn-header h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: #f0f2f7;
        }

        .pn-header p {
            font-size: 0.85rem;
            color: #6b7a99;
            margin-top: 3px;
        }

        .pn-btn {
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

        .pn-btn-back {
            background: #151b2a;
            color: #6b7a99;
            border: 0.5px solid rgba(255,255,255,0.08);
        }

        .pn-btn-back:hover {
            background: #1c2338;
            color: #f0f2f7;
            border-color: rgba(255,255,255,0.15);
        }

        .pn-folder-meta {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.5rem;
        }

        .pn-folder-icon {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(59,130,246,0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .pn-folder-name {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .pn-section-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #4a5578;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .pn-notes-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .pn-note-card {
            background: #111520;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.15s, border-color 0.15s;
        }

        .pn-note-card:hover {
            background: #151b2a;
            border-color: rgba(255,255,255,0.15);
        }

        .pn-note-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #f0f2f7;
        }

        .pn-note-subtitle {
            font-size: 0.78rem;
            color: #6b7a99;
            margin-top: 3px;
        }

        .pn-btn-add {
            background: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 9px;
            padding: 0.4rem 1rem;
            font-size: 0.82rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s;
            font-family: 'Sora', sans-serif;
            white-space: nowrap;
        }

        .pn-btn-add:hover {
            background: #2563eb;
        }

        .pn-btn-add:disabled {
            background: #1e3a5f;
            color: #6b7a99;
            cursor: not-allowed;
        }

        .pn-empty-state {
            background: #111520;
            border: 0.5px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 3.5rem 2rem;
            text-align: center;
        }

        .pn-empty-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.6;
        }

        .pn-empty-state h3 {
            font-size: 1rem;
            font-weight: 600;
            color: #f0f2f7;
        }

        .pn-empty-state p {
            font-size: 0.85rem;
            color: #6b7a99;
            margin-top: 6px;
        }
    </style>

    <div class="pn-page">

        {{-- Header --}}
        <div class="pn-header">
            <div>
                <h1>Pilih Note</h1>
                <p>Organize your ideas beautifully ✨</p>
            </div>
            <a href="/hmmfolders/{{ $folder->id }}" class="pn-btn pn-btn-back">
                ← Kembali
            </a>
        </div>

        {{-- Folder Meta --}}
        <div class="pn-folder-meta">
            <div class="pn-folder-icon">📁</div>
            <span class="pn-folder-name">{{ $folder->name }}</span>
        </div>

        {{-- Notes --}}
        @if(count($notes) === 0)

            <div class="pn-empty-state">
                <div class="pn-empty-icon">📝</div>
                <h3>Semua note sudah ada di folder ini</h3>
                <p>Tidak ada note lain yang bisa ditambahkan.</p>
            </div>

        @else

            <div class="pn-section-label">Pilih note untuk dimasukkan</div>

            <div class="pn-notes-list">
                @foreach($notes as $note)
                    <div class="pn-note-card">
                        <div>
                            <div class="pn-note-title">{{ $note->title }}</div>
                            <div class="pn-note-subtitle">
                                Updated {{ $note->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        <button
                            wire:click="addToFolder({{ $note->id }})"
                            class="pn-btn-add"
                        >
                            + Masukkan ke Folder
                        </button>
                    </div>
                @endforeach
            </div>

        @endif

    </div>
</div>