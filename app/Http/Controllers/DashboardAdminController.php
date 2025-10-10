<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
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

        // Kirim data ke view
        // return view('admin.dashboardadmin');
        return view('admin.admindashboard', compact('admin', 'jumlahPenjual', 'jumlahAdmin'));
    }
}

