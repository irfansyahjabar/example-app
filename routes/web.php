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
    use App\Http\Controllers\AStarController;
    use App\Http\Controllers\PbfController;

    // ==================== Rute Konversi PBF ke GeoJSON ==================== \\
    Route::get('/convert-pbf', [PbfController::class, 'convertToGeoJson']);

    // ==================== Rute A* ==================== \\
    Route::get('/astar-route', [AStarController::class, 'getRoute'])->name('astar.route');
    Route::get('/graph-data', [AStarController::class, 'getGraphData']);

    // ==================== API DATA PENJUAL LPG ==================== \\
    Route::get('/data-findlpg', [MapController::class, 'getData'])->name('data-findlpg');

    // ==================== Halaman Awal ==================== \\
    Route::get('/', fn() => view('welcome'));

    // ==================== Register Penjual LPG ==================== \\
    Route::get('/penjual/register', [RegisterController::class, 'showForm'])->name('penjual.register.form');
    Route::post('/penjual/register', [RegisterController::class, 'register'])->name('penjual.register');

    // ==================== Login Penjual LPG ==================== \\
    Route::get('/penjual/login', [LoginController::class, 'showLoginForm'])->name('penjual.login.form');
    Route::post('/penjual/login', [LoginController::class, 'login'])->name('penjual.login');
    
    // ==================== Halaman Penjual (Butuh Login) ==================== \\
    Route::prefix('penjual')->middleware('auth:penjual')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('penjual.dashboard');
        Route::get('/dashboard/data', [DashboardController::class, 'getDashboardData'])->name('penjual.dashboard.data');
        Route::get('/profile', [ProfilePenjualController::class, 'index'])->name('penjual.profile');
        Route::post('/logout', [LoginController::class, 'logout'])->name('penjual.logout');
        Route::resource('stoklpg', StokLpgController::class);
    });
    
    // ==================== Login Admin ==================== \\
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // ==================== Halaman Admin (Butuh Login Admin) ==================== \\
    Route::prefix('admin')->middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/mapadmin', [AdminController::class, 'showMap'])->name('admin.mapadmin');
        Route::get('/data', [AdminController::class, 'getDataMap'])->name('data');

        // ==================== CRUD Penjual LPG ==================== \\
        Route::resource('sellers', SellersController::class)->names([
            'index'   => 'admin.sellers.index',
            'create'  => 'admin.sellers.create',
            'store'   => 'admin.sellers.store',
            'show'    => 'admin.sellers.show',
            'edit'    => 'admin.sellers.edit',
            'update'  => 'admin.sellers.update',
            'destroy' => 'admin.sellers.destroy',
        ]);
        // ======== Alias untuk route sellers tanpa prefix "admin." ======== \\
        Route::get('/sellers', [App\Http\Controllers\SellersController::class, 'index'])->name('sellers.index');
        Route::get('/sellers/create', [App\Http\Controllers\SellersController::class, 'create'])->name('sellers.create');
        Route::post('/sellers', [App\Http\Controllers\SellersController::class, 'store'])->name('sellers.store');
        Route::get('/sellers/{id}', [App\Http\Controllers\SellersController::class, 'show'])->name('sellers.show');
        Route::get('/sellers/{id}/edit', [App\Http\Controllers\SellersController::class, 'edit'])->name('sellers.edit');
        Route::put('/sellers/{id}', [App\Http\Controllers\SellersController::class, 'update'])->name('sellers.update');
        Route::delete('/sellers/{id}', [App\Http\Controllers\SellersController::class, 'destroy'])->name('sellers.destroy');
    });
