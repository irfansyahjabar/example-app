<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StokLpgController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilePenjualController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\MapController;

// ======== API DATA PENJUAL LPG ======== \\
Route::get('/data-findlpg', [MapController::class, 'getData'])->name('data-findlpg');

// ======== Halaman Awal ======== \\
Route::get('/', fn() => view('welcome'));

// ======== Register Penjual LPG ======== \\
Route::get('/penjual/register', [RegisterController::class, 'showForm'])->name('penjual.register.form');
Route::post('/penjual/register', [RegisterController::class, 'register'])->name('penjual.register');

// ======== Login Penjual LPG ======== \\
Route::get('/penjual/login', [LoginController::class, 'showLoginForm'])->name('penjual.login.form');
Route::post('/penjual/login', [LoginController::class, 'login'])->name('penjual.login');
Route::post('/penjual/logout', [LoginController::class, 'logout'])->name('penjual.logout');

// ======== Halaman Penjual (butuh login) ======== \\
Route::prefix('penjual')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('penjual.dashboard');
    Route::get('/profile', [ProfilePenjualController::class, 'index'])->name('penjual.profile');
    Route::resource('stoklpg', StokLpgController::class);
});

// ======== Login Admin (tidak butuh auth agar bisa akses form login) ======== \\
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ======== Halaman Admin (butuh login admin) ======== \\
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/mapadmin', [AdminController::class, 'showMap'])->name('admin.mapadmin');
    Route::get('/data', [AdminController::class, 'getDataMap'])->name('data');
    Route::resource('sellers', SellersController::class);
});
