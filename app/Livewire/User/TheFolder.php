<?php

namespace App\Livewire\User;

use App\Models\Not;
use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TheFolder extends Component
{
    public $folder;

    public $notes = [];

    public function mount()
    {
        $id = request()->route('id');

        $this->folder = Polder::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->loadNotes();
    }

    public function loadNotes()
    {
        $this->notes = Not::where('user_id', Auth::id())
            ->where('folder_id', $this->folder->id)
            ->latest()
            ->get();
    }

    public function removeFromFolder($noteId)
    {
        $note = Not::where('id', $noteId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $note->update([
            'folder_id' => null,
        ]);

        $this->loadNotes();

        session()->flash('success', 'Note berhasil dikeluarkan dari folder.');
    }

    public function render()
    {
        return view('livewire.user.the-folder');
    }
}