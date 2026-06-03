<?php

namespace App\Livewire\User;

use Livewire\Component;

class EditKategori extends Component
{
    public function render()
    {
        return view('livewire.user.edit-kategori');
    }

    public function edit()
    {
        $categories = Kategori::all();
        
    }
}
