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
            </div>
        </div>

        <div id="map"></div>
    </div>
</x-layout>
