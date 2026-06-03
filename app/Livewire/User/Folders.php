<?php

namespace App\Livewire\User;

use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Folders extends Component
{
    public $folders = [];

    public function mount()
    {
        $this->loadFolders();
    }

    public function loadFolders()
    {
        $this->folders = Polder::where('user_id', Auth::id())
            ->latest()
            ->get();
    }

    public function destroy($id)
    {
        $folder = Polder::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $folder->delete();

        $this->loadFolders();

        session()->flash('success', 'Folder berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.user.folders');
    }
}