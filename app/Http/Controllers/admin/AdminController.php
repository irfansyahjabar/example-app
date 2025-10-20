<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil admin yang sedang login
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.loginadmin')->withErrors('Silakan login terlebih dahulu.');
        }

        // Hitung jumlah penjual dari tabel users
        $jumlahPenjual = User::count();

        // Hitung jumlah admin dari tabel admins
        $jumlahAdmin = Admin::count();
        return view(
            'admin.dashboard',
            compact('admin', 'jumlahPenjual', 'jumlahAdmin')
        );
    }

    public function showSellers()
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.loginadmin')->withErrors('Silakan login terlebih dahulu.');
        }

        // Ambil semua data penjual dari tabel users
        $sellers = User::all();

        // Kirim data ke view
        return view('admin.tabelpenjuallpg', compact('admin', 'sellers'));
    }

    public function showMap()
    {
        $totalPenjual = User::count();

        return view('admin.mapadmin', compact('totalPenjual'));
    }

    // Ambil data penjual dalam format JSON
    public function getDataMap()
    {
        $users = User::whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->select('id', 'store_name', 'name', 'phone', 'latitude', 'longitude', 'address')
            ->get();

        return response()->json($users);
    }
}
