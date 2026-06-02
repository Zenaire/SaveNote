<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\Auth;
use App\Livewire\User\Home;
use App\Models\Not;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth.auth');
    });

    Route::get('/login', function () {
        return view('auth.auth');
    })->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.biji');
    });
    Route::get('/newNote', function () {
        return view('user.notbaru');
    });
    Route::get('/edit', function () {
        return view('user.editnot'); 
    });
    Route::get('/profile', function () {
        return view('user.profile'); 
    });

   Route::get('/editProfile', function () {
        return view('user.edit-profile'); 
    });

});
