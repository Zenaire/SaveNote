<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public $photo;
    public $oldPhoto;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->oldPhoto = Auth::user()->profile_photo_path;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'nullable|min:8|same:password_confirmation',
            'photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = $this->oldPhoto;

        if ($this->photo) {
            $photoPath = $this->photo->store('profiles', 'public');
        }

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'profile_photo_path' => $photoPath,
        ];

        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        Auth::user()->update($data);
        session()->flash(
            'success',
            'Profile updated successfully!'
        );

        return redirect('/profile');
    }

    public function render()
    {
        return view('livewire.user.edit-profile');
    }
}