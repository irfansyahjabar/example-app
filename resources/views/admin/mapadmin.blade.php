<x-layout>
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Peta Lokasi Penjual LPG</h2>
            <ul class="breadcrumb">
                <li>Dashboard</li>
                <li>Map</li>
            </ul>
        </div>

        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penjual
            </a>

            <a href="#" class="notification-btn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </a>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon stat-1">
                <i class="fas fa-gas-pump"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $totalPenjual }}</h3>
                <p>Total Penjual LPG</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-2">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="stat-info">
                <h3>5</h3>
                <p>Area Tercover</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon stat-3">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>15</h3>
                <p>Penjual Aktif Hari Ini</p>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <div class="map-header">
            <h3><i class="fas fa-map"></i> Peta Sebaran Penjual LPG</h3>

            <div class="map-controls">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="mapSearch" placeholder="Cari lokasi...">
                </div>

                <div class="filter-box">
                    <select class="filter-select" id="areaFilter">
                        <option value="">Semua Area</option>
                        <option value="jakarta-pusat">Jakarta Pusat</option>
                        <option value="jakarta-selatan">Jakarta Selatan</option>
                        <option value="jakarta-barat">Jakarta Barat</option>
                        <option value="jakarta-timur">Jakarta Timur</option>
                        <option value="jakarta-utara">Jakarta Utara</option>
                    </select>

                    <select class="filter-select" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                </div>
            </div>
        </div>

        <div id="map"></div>

        <div class="map-legend">
            <div class="legend-item">
                <div class="legend-color legend-gas"></div>
                <span>Penjual LPG</span>
            </div>
            <div class="legend-item">
                <div class="legend-color legend-cluster"></div>
                <span>Cluster Penjual</span>
            </div>
        </div>
    </div>
</x-layout>
