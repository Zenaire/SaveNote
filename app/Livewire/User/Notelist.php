<?php

namespace App\Livewire\User;

use App\Models\Not;
use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notelist extends Component
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
            ->whereNull('folder_id')
            ->latest()
            ->get();
    }

    public function addToFolder($noteId)
    {
        $note = Not::where('id', $noteId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $note->update([
            'folder_id' => $this->folder->id,
        ]);

        session()->flash('success', 'Note berhasil dimasukkan ke folder.');

        return redirect('/hmmfolder/' . $this->folder->id);
    }

    public function render()
    {
        return view('livewire.user.notelist');
    }
}