<?php

namespace App\Http\Controllers;

use App\Models\StokLpg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePenjualController extends Controller
{
    // Menampilkan halaman profil penjual
    public function index()
    {
        // Ambil data user yang sedang login
        $user = Auth::guard('penjual')->user();

        // Ambil data user yang sedang login
        $stok = StokLpg::where('user_id', $user->id)
            ->selectRaw('MAX(id) as id, jenis, SUM(stok) as total_stok')
            ->groupBy('jenis')
            ->get();

        // Hitung total stok user login
        $totalStok = $stok->sum('total_stok');

        // Hitung jumlah jenis LPG user login
        $jumlahJenis = $stok->count();

        // Kirim ke view
        return view('penjual.profile', compact(
            'user',
            'totalStok',
            'jumlahJenis'
        ));
    }
}
