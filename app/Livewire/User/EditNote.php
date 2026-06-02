<?php

namespace App\Livewire\User;

use App\Models\Kategori;
use App\Models\Not;
use App\Models\Polder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditNote extends Component
{
    use WithFileUploads;

    public $note;

    public $title;
    public $subtitle;
    public $content;

    public $category_id;
    public $folder_id;

    public $media;
    public $oldMedia;

    public $categories = [];
    public $folders = [];

    public function mount()
    {
        $id = request()->route('id');

        $this->note = Not::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->title = $this->note->title;
        $this->subtitle = $this->note->subtitle;
        $this->content = $this->note->content;

        $this->category_id = $this->note->category_id;
        $this->folder_id = $this->note->folder_id;

        $this->oldMedia = $this->note->media;

        $this->categories = Kategori::all();
        $this->folders = Polder::where('user_id', Auth::id())->get();
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|min:3',
            'content' => 'required',
        ]);

        $mediaPath = $this->oldMedia;

        if ($this->media) {
            $mediaPath = $this->media->store('notes', 'public');
        }

        $this->note->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'folder_id' => $this->folder_id,
            'media' => $mediaPath,
        ]);

        session()->flash('success', 'Catatan berhasil diperbarui!');

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.user.edit-note');
    }
}