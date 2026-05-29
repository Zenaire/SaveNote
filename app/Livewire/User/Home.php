<?php

namespace App\Livewire\User;

use App\Livewire\Auth\Auth;
use App\Models\Not;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.user.home');
    }
    public function createNote()
    {
        $this->validate();

        Not::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
        ]);

        $this->resetForm();

        $this->loadNotes();
    }
}
