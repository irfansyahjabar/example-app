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

use App\Models\StokLpg;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        // Ambil stok user login, dikelompokkan berdasarkan jenis
        $stok = StokLpg::where('user_id', $user->id)
            ->selectRaw('MAX(id) as id, jenis, SUM(stok) as total_stok')
            ->groupBy('jenis')
            ->get();

        // Hitung total stok user login
        $totalStok = $stok->sum('total_stok');

        // Hitung jumlah jenis LPG user login
        $jumlahJenis = $stok->count();

        // Ambil data asli untuk hitung status
        $stokAsli = StokLpg::where('user_id', $user->id)->get();

        $stokAdequate = $stokAsli->where('status', 'adequate')->count();
        $stokLow      = $stokAsli->where('status', 'low')->count();
        $stokCritical = $stokAsli->where('status', 'critical')->count();

        return view('penjual.dashboard', compact(
            'user',
            'stok',
            'totalStok',
            'jumlahJenis',
            'stokAdequate',
            'stokLow',
            'stokCritical'
        ));
    }
}
