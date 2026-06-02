<?php

namespace App\Livewire\User;

use App\Models\Not;
use App\Models\Kategori;
use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $title;
    public $subtitle;
    public $content;

    public function render()
    {
        $notes = Not::where('user_id', Auth::id())->when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')->orWhere('subtitle', 'like', '%' . $this->search . '%')->orWhere('content', 'like', '%' . $this->search . '%');
            });
        })
            ->when($this->selectedCategory, function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->latest()
            ->get();

        $categories = Kategori::all();
        $folders = Polder::where('user_id', Auth::id())->get();

        return view('livewire.user.home', [
            'notes' => $notes,
            'categories' => $categories,
            'folders' => $folders,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }


     public function destroy($id)
    {
        $note = Not::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $note->delete();

        session()->flash('success', 'Catatan berhasil dihapus!');
    }
}