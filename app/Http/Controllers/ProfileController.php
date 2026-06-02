<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
public function index()
{
    $user = Auth::user(); // Ambil data pengguna yang sedang login
    return view('user.profile', compact('user')); // Kirim data pengguna ke view
}

 public function edit()
{
    $user = Auth::user(); // Ambil data pengguna yang sedang login
    return view('user.edit-profile', compact('user')); // Kirim data pengguna ke view
}
}
