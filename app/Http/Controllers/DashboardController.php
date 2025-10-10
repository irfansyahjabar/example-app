<?php

// namespace App\Http\Controllers;
// use App\Models\StokLpg;
// use Illuminate\Http\Request;
// class DashboardController extends Controller
// {
//     public function index()
//     {
//         $user = auth()->user();

//         // hanya ambil stok milik user yang login
//         $totalStok = StokLpg::where('user_id', $user->id)->sum('stok');
//         $jumlahJenis = StokLpg::where('user_id', $user->id)->distinct('jenis')->count('jenis');
//         $stokAdequate = StokLpg::where('user_id', $user->id)->where('status', 'adequate')->count();
//         $stokLow = StokLpg::where('user_id', $user->id)->where('status', 'low')->count();
//         $stokCritical = StokLpg::where('user_id', $user->id)->where('status', 'critical')->count();

//         return view('penjual.dashboardpenjuallpg', compact(
//             'user',
//             'totalStok',
//             'jumlahJenis',
//             'stokAdequate',
//             'stokLow',
//             'stokCritical'
//         ));
//     }
// }

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $stok = $user->stokLpg; // semua stok milik user login
        return view('penjual.dashboardpenjuallpg', compact('user', 'stok'));
    }
}
