<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Auth extends Component
{
    public $mode = 'login';
    public function render()
    {
        return view('livewire.auth.auth');
    }
}
