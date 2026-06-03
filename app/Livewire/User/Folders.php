<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Polder;

class Folders extends Component
{
    public $folders = [];

    public function mount()
    {
        $this->folders = Polder::latest()->get();
    }

    public function render()
    {
        return view('livewire.user.folders');
    }
}