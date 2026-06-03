<?php

namespace App\Livewire\User;

use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditFolder extends Component
{
    use WithFileUploads;

    public $folder;

    public $name;

    public $thumbnail;
    public $oldThumbnail;

    public function mount()
    {
        $id = request()->route('id');

        $this->folder = Polder::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->name = $this->folder->name;
        $this->oldThumbnail = $this->folder->thumbnail;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $thumbnailPath = $this->oldThumbnail;

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('folders', 'public');
        }

        $this->folder->update([
            'name' => $this->name,
            'thumbnail' => $thumbnailPath,
        ]);

        session()->flash('success', 'Folder berhasil diperbarui!');

        return redirect('/folders');
    }

    public function render()
    {
        return view('livewire.user.edit-folder');
    }
}