<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StokLpgController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilePenjualController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardAdminController;

// ======== Register & Login Penjual LPG ======== \\
Route::get('/penjual/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/penjual/register', [RegisterController::class, 'register'])->name('register');

Route::get('/penjual/login', [LoginController::class, 'showLoginForm'])->name('loginForm');
Route::post('/penjual/login', [LoginController::class, 'login'])->name('login');

// ======== Halaman Penjual (butuh login) ======== \\
Route::prefix('penjual')->middleware('auth')->group(function () {
    Route::get('dashboardpenjuallpg', [DashboardController::class, 'index'])->name('penjual.dashboardpenjuallpg');
    Route::get('stoklpg', [DashboardController::class, 'index'])->name('penjual.stoklpg');
    Route::get('profilepenjual', [ProfilePenjualController::class, 'index'])->name('penjual.profilepenjual');
    Route::get('tambahstoklpg', [DashboardController::class, 'index'])->name('penjual.tambahstoklpg');

    // resource stok LPG (CRUD)
    Route::resource('stoklpg', StokLpgController::class);
});

// ======== Halaman Admin ======== \\
Route::prefix('admin')->group(function () {
    Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('admin.loginadmin');
    Route::post('/loginadmin', [AdminAuthController::class, 'login'])->name('loginadmin.post');
    // Route::get('/dashboardadmin', fn() => view('admin.dashboardadmin'));
    Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('admin.dashboardadmin');
    Route::get('/tabelpenjuallpg', fn() => view('admin.tabelpenjuallpg'));
    Route::get('/mapadmin', fn() => view('admin.mapadmin'));
    Route::get('/tambahpenjuallpg', fn() => view('admin.tambahpenjuallpg'));
});

// ======== Halaman Awal ======== \\
Route::get('/', fn() => view('welcome'));

