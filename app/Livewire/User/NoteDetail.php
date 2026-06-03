<?php

namespace App\Livewire\User;

use App\Models\Not;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteDetail extends Component
{
    public $note;

    public function mount()
    {
        $id = request()->route('id');

        $this->note = Not::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
    }

    public function render()
    {
        return view('livewire.user.note-detail');
    }
}