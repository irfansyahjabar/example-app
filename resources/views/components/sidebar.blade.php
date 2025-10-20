    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>F<span>Gas</span></h1>
        </div>

        @if (Auth::guard('admin')->check())
            <ul class="nav-links">
                <li><a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i
                            class="fas fa-home"></i> Dashboard</a></li>
                <li><a class="{{ Route::is('sellers.index') ? 'active' : '' }}" href="{{ route('sellers.index') }}"><i
                            class="fas fa-gas-pump"></i> Penjual LPG</a></li>
                <li><a href="#"><i class="fas fa-key"></i> Password</a></li>
                <li><a href="#"><i class="fas fa-map-marker-alt"></i> Daftar Lokasi</a></li>
                <li><a class="{{ Route::is('admin.mapadmin') ? 'active' : '' }}" href="{{ route('admin.mapadmin') }}"><i
                            class="fas fa-map"></i> Map</a></li>
            </ul>

            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}</div>
                    <div class="user-details">
                        <div class="user-name">{{ Auth::guard('admin')->user()->name }}</div>
                        <div class="user-role">{{ Auth::guard('admin')->user()->email }}</div>
                    </div>
                </div>
                <form action="{{ route('penjual.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Log Out</button>
                </form>
            </div>
        @elseif(Auth::check())
            <ul class="nav-links">
                <li><a class="{{ Route::is('penjual.dashboard') ? 'active' : '' }}"
                        href="{{ route('penjual.dashboard') }}"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a class="{{ Route::is('stoklpg.index') ? 'active' : '' }}" href="{{ route('stoklpg.index') }}"><i
                            class="fas fa-gas-pump"></i> Stok
                        LPG</a></li>
                <li><a href="#"><i class="fas fa-map"></i> Map</a></li>
                <li><a href="{{ route('penjual.profile') }}"><i class="fas fa-user"></i> Profile</a></li>
            </ul>
            <div class="sidebar-footer">
                <div class="user-info">
                    <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    <div class="user-details">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <form action="{{ route('penjual.logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Log Out</button>
                </form>
            </div>
        @endif
    </div>
