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

    // Home

    Route::get('/dashboard', function () {
        return view('user.biji');
    });

    Route::get('/detail/{id}', function ($id) {
        return view('user.detail');
    })->name('detail.note');

    // Persoalan Note

    Route::get('/newNote', function () {
        return view('user.notbaru');
    });

    Route::get('/edit/{id}', function ($id) {
        return view('user.editnot'); 
    })->name('edit.note');

    // Persoalan Profil

    Route::get('/profile', function () {
        return view('user.propil'); 
    });

   Route::get('/editProfile', function () {
        return view('user.editpropil'); 
    });

    // Persoalan Katek=gori

   Route::get('/kategori', function () {
        return view('user.kateg'); 
    });

   Route::get('/editkategori', function () {
        return view('user.editkateg'); 
    });

   Route::get('/createkategori', function () {
        return view('user.buatkateg'); 
    });

    // Persoalan Folder

   Route::get('/folders', function () {
        return view('user.polder'); 
    });

   Route::get('/hmmfolder/{id}', function ($id) {
        return view('user.dapolder'); 
    })->name('folder.view');

    Route::get('/editfolder/{id}', function ($id) {
        return view('user.editfpolder');
    })->name('edit.folder');

   Route::get('/createfolder', function () {
        return view('user.buatpolder'); 
    });

   Route::get('/ViewNotes/{id}', function ($id) {
        return view('user.notlis'); 
    });
});
