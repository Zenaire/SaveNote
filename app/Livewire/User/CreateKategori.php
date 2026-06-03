<?php

namespace App\Livewire\User;

use Livewire\Component;

class CreateKategori extends Component
{
    public function render()
    {
  
        return view('livewire.user.create-kategori');
    }
public function createKategori()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Kategori::create([
            'name' => $this->name,
        ]);

        session()->flash('message', 'Category created successfully!');
    }

}
