<?php

namespace App\Livewire\User;

use App\Models\Not;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditNote extends Component
{
    public $note;
    public $title;
    public $content;

    public function mount()
    {
        $id = request()->route('id');

        $this->note = Not::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->title = $this->note->title;
        $this->content = $this->note->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $this->note->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Catatan berhasil diperbarui!');

        return redirect('/home');
    }

    public function render()
    {
        return view('livewire.user.edit-note');
    }
    public function edit(){
        
    }
}