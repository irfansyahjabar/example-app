<?php

namespace App\Http\Controllers;

use App\Models\StokLpg;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('penjual')->user();

        // Ambil semua stok milik user yang login
        $stokAsli = StokLpg::where('user_id', $user->id)->get();

        // Hitung total stok semua jenis LPG
        $totalStok = $stokAsli->sum('stok');

        // Hitung berapa jenis LPG yang dijual user
        $jumlahJenis = $stokAsli->groupBy('jenis')->count();

        // Hitung kategori stok
        $stokAdequate = $stokAsli->where('status', 'adequate')->count();
        $stokLow      = $stokAsli->where('status', 'low')->count();
        $stokCritical = $stokAsli->where('status', 'critical')->count();

        return view('penjual.dashboard', compact(
            'user',
            'totalStok',
            'jumlahJenis',
            'stokAdequate',
            'stokLow',
            'stokCritical'
        ));
    }

    // Endpoint buat refresh dashboard data secara AJAX
    public function getDashboardData()
    {
        $user = Auth::guard('penjual')->user();

        $stokAsli = StokLpg::where('user_id', $user->id)->get();

        return response()->json([
            'totalStok'    => $stokAsli->sum('stok'),
            'jumlahJenis'  => $stokAsli->groupBy('jenis')->count(),
            'stokAdequate' => $stokAsli->where('status', 'adequate')->count(),
            'stokLow'      => $stokAsli->where('status', 'low')->count(),
            'stokCritical' => $stokAsli->where('status', 'critical')->count(),
        ]);
    }
}
