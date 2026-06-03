<?php

namespace App\Livewire\User;

use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditKategori extends Component
{
    public $category;

    public $name;

    public function mount()
    {
        $id = request()->route('id');

        $this->category = Kategori::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->name = $this->category->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->category->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Kategori berhasil diperbarui!');

        return redirect('/kategori');
    }

    public function render()
    {
        return view('livewire.user.edit-kategori');
    }
}
