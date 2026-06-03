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
    Route::get('/edit/{id}', function ($id) {
        return view('user.editnot'); 
    })->name('edit.note');
    Route::get('/profile', function () {
        return view('user.propil'); 
    });
   Route::get('/editProfile', function () {
        return view('user.editpropil'); 
    });
   Route::get('/kategori', function () {
        return view('user.kateg'); 
    });
   Route::get('/editkategori', function () {
        return view('user.editkateg'); 
    });
   Route::get('/createkategori', function () {
        return view('user.buatkateg'); 
    });
   Route::get('/folders', function () {
        return view('user.polder'); 
    });
   Route::get('/editfolder', function () {
        return view('user.editfpolder'); 
    });
   Route::get('/createfolder', function () {
        return view('user.buatpolder'); 
    });

});
