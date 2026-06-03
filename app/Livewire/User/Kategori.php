<?php

namespace App\Livewire\User;

use App\Models\Kategori as KategoriModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Kategori extends Component
{
    public $categories = [];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = KategoriModel::where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function destroy($id)
    {
        $category = KategoriModel::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $category->delete();

        $this->loadCategories();

        session()->flash('success', 'Kategori berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.user.kategori');
    }
}