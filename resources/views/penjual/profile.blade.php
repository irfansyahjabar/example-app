<x-layout-nonsidebar title="Profile Penjual">
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">F<span>Gas</span></div>
            <div class="header-content">
                <h1><i class="fas fa-user-circle"></i> Profile Penjual</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('penjual.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            > <span>Profile</span>
        </div>

        <!-- Profile Container -->
        <div class="profile-container">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-avatar">
                    T
                </div>
                <div class="profile-info">
                    <h2>{{ $user->store_name }}</h2>
                    <div class="role">Penjual LPG</div>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">{{ $totalStok }}</div>
                        <div class="stat-label">Total Stok</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $jumlahJenis }}</div>
                        <div class="stat-label">Jenis LPG</div>
                    </div>
                    {{-- <div class="stat-item">
                        <div class="stat-number">28</div>
                        <div class="stat-label">Pesanan/Bln</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4.8</div>
                        <div class="stat-label">Rating</div>
                    </div> --}}
                </div>

                <!-- Navigation Buttons -->
                <div class="nav-buttons">
                    <a href="/penjual/stoklpg" class="nav-btn">
                        <i class="fas fa-boxes"></i>
                        <span>Kelola Stok LPG</span>
                    </a>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Ganti Password Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <h3><i class="fas fa-key"></i> Ganti Password</h3>
                    </div>

                    <form id="passwordForm">
                        <div class="form-group">
                            <label for="currentPassword" class="required">Password Saat Ini</label>
                            <input type="password" id="currentPassword" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="newPassword" class="required">Password Baru</label>
                                <input type="password" id="newPassword" required>
                                <div class="form-help">Minimal 8 karakter</div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword" class="required">Konfirmasi Password</label>
                                <input type="password" id="confirmPassword" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Ganti Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout-nonsidebar>
