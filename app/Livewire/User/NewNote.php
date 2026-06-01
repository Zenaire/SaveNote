<?php

namespace App\Livewire\User;

use App\Models\Not;
use App\Models\Kategori; // Pastikan model ini di-import
use App\Models\Polder;   // Pastikan model ini di-import
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewNote extends Component
{
    use WithFileUploads;

    // Properti Form Note
    public $title;
    public $subtitle;
    public $content;
    public $media; 
    public $category_id = '';
    public $folder_id = '';   

    public $newFolderName = ''; 

    public function render()
    {
        $categories = Kategori::all(); 
        $folders = Polder::where('user_id', Auth::id())->get();

        return view('livewire.user.new-note', [
            'categories' => $categories,
            'folders' => $folders
        ]); 
    }

    public function createNote()
    {
        $this->validate([
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:255',
            'content'     => 'nullable|string',
            'media'       => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:kategoris,id',
            'folder_id'   => 'nullable|exists:polders,id', 
        ]);

        $mediaPath = null;
        if ($this->media) {
            $mediaPath = $this->media->store('notes', 'public');
        }

        Not::create([
            'user_id'     => Auth::id(),
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'content'     => $this->content,
            'media'       => $mediaPath,
            'category_id' => $this->category_id ?: null,
            'folder_id'   => $this->folder_id ?: null,   
        ]);

        session()->flash('success', 'Catatan berhasil ditambahkan!');
        return redirect('/dashboard'); 
    }

    public function createFolder()
    {
        $this->validate([
            'newFolderName' => 'required|string|max:255'
        ]);

        Polder::create([
            'user_id' => Auth::id(),
            'name'    => $this->newFolderName
        ]);

        $this->newFolderName = '';
        session()->flash('success', 'Folder berhasil dibuat!');
    }

  
}