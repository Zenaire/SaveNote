<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth as AuthFacade;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Auth extends Component
{

    public $mode = 'login';

    public $name = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (AuthFacade::attempt($credentials)) {

            session()->regenerate();

            return redirect('/dashboard');
        }

        $this->addError(
            'email',
            'Email atau password salah.'
        );
    }

    public function register()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset([
            'name',
            'email',
            'password',
            'password_confirmation',
        ]);

        $this->mode = 'login';

        session()->flash(
            'success',
            'Register berhasil. Silakan login.'
        );
    }

    public function logout()
    {
        AuthFacade::logout(); 
        session()->invalidate();
    
        session()->regenerateToken();
    
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.auth.auth');
    }
}