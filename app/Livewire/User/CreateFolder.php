<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Polder;

class CreateFolder extends Component
{
    use WithFileUploads;

    public $name;
    public $thumbnail;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $path = null;

        if ($this->thumbnail) {
            $path = $this->thumbnail->store('folders', 'public');
        }

        Polder::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
            'thumbnail' => $path,
        ]);

        $this->reset(['name', 'thumbnail']);

        return redirect('/folders');
    }

    public function render()
    {
        return view('livewire.user.create-folder');
    }
}
