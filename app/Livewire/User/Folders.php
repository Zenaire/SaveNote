<?php

namespace App\Livewire\User;

use App\Models\Not;
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

        Not::where('folder_id', $folder->id)
            ->update([
                'folder_id' => null,
            ]);

        $folder->delete();

        $this->loadFolders();
    }

    public function render()
    {
        return view('livewire.user.folders');
    }
}
