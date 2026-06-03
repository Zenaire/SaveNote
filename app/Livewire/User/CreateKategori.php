<?php

namespace App\Livewire\User;

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateKategori extends Component
{
    public $name = '';

    public function createKategori()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
        ]);

        return redirect('/kategori');
    }

    public function render()
    {
        return view('livewire.user.create-kategori');
    }
}