<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePenjualController extends Controller
{
    // Menampilkan halaman profil penjual
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Kirim ke view
        return view('penjual.profilepenjual', compact('user'));
    }
}
