<x-layout title="Dashboard Penjual">
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Dashboard Penjual</h2>
            <ul class="breadcrumb">
                <li>Home</li>
                <li>Dashboard</li>
            </ul>
        </div>

        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Stock Overview -->
    <div class="stock-overview">
        <div class="stock-card">
            <div class="stock-icon stock-1">
                <i class="fas fa-gas-pump"></i>
            </div>
            <div class="stock-info">
                <h3>{{ $totalStok }}</h3>
                <p>Total Stok LPG</p>
            </div>
        </div>

        <div class="stock-card">
            <div class="stock-icon stock-2">
                <i class="fas fa-box"></i>
            </div>
            <div class="stock-info">
                <h3>{{ $jumlahJenis }}</h3>
                <p>Jenis LPG</p>
            </div>
        </div>

        <div class="stock-card">
            <div class="stock-icon stock-3">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stock-info">
                <h3>{{ $stokAdequate }}</h3>
                <p>Stok Cukup</p>
            </div>
        </div>

        <div class="stock-card">
            <div class="stock-icon stock-4">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="stock-info">
                <h3>{{ $stokLow + $stokCritical }}</h3>
                <p>Stok Menipis / Kritis</p>
            </div>
        </div>
    </div>

    {{-- <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        @foreach ($stok as $item)
            <div class="card stat-card">
                <div class="stat-icon stat-1">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $item->total_stok }}</h3>
                    <p>Stok LPG {{ $item->jenis }}</p>
                </div>
            </div>
        @endforeach
    </div> --}}

    <!-- Charts and Orders -->
    {{-- <div class="dashboard-content">
        <div class="chart-container">
            <div class="chart-header">
                <h3>Statistik Penjualan</h3>
                <div class="chart-actions">
                    <select>
                        <option>Minggu Ini</option>
                        <option>Bulan Ini</option>
                        <option>3 Bulan Terakhir</option>
                    </select>
                </div>
            </div>
            <div class="chart-placeholder">
                <i class="fas fa-chart-bar" style="font-size: 2rem; margin-right: 10px;"></i>
                <span>Grafik Statistik Penjualan</span>
            </div>
        </div>

        <div class="orders-container">
            <div class="orders-header">
                <h3>Pesanan Terbaru</h3>
            </div>

            <ul class="orders-list">
                <li class="order-item">
                    <div class="order-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="order-info">
                        <h4>Pesanan #FG-0987</h4>
                        <p>3 tabung LPG 3kg</p>
                    </div>
                    <div class="order-time">2 jam lalu</div>
                </li>

                <li class="order-item">
                    <div class="order-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="order-info">
                        <h4>Pesanan #FG-0986</h4>
                        <p>2 tabung LPG 12kg</p>
                    </div>
                    <div class="order-time">5 jam lalu</div>
                </li>

                <li class="order-item">
                    <div class="order-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="order-info">
                        <h4>Pesanan #FG-0985</h4>
                        <p>1 tabung LPG 5kg</p>
                    </div>
                    <div class="order-time">8 jam lalu</div>
                </li>

                <li class="order-item">
                    <div class="order-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="order-info">
                        <h4>Pesanan #FG-0984</h4>
                        <p>4 tabung LPG 3kg</p>
                    </div>
                    <div class="order-time">12 jam lalu</div>
                </li>
            </ul>
        </div>
    </div> --}}

    <!-- Stock Alert -->
    <div class="stock-alert">
        <div class="stock-alert-header">
            <i class="fas fa-exclamation-triangle"></i>
            <h3>Peringatan Stok</h3>
        </div>
        <p>Stok LPG 3kg Anda hampir habis. Sisa stok: 15 tabung. Segera lakukan pengadaan untuk menghindari
            kehabisan stok.</p>
        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('stoklpg.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Stok
            </a>
        </div>
    </div>
    <Script>
        document.addEventListener("DOMContentLoaded", function () {
        const totalEl = document.querySelector(".stock-card:nth-child(1) h3");
        const jenisEl = document.querySelector(".stock-card:nth-child(2) h3");
        const adequateEl = document.querySelector(".stock-card:nth-child(3) h3");
        const lowEl = document.querySelector(".stock-card:nth-child(4) h3");

        async function refreshDashboard() {
            try {
                const res = await fetch("{{ route('penjual.dashboard.data') }}");
                const data = await res.json();

                totalEl.textContent = data.totalStok;
                jenisEl.textContent = data.jumlahJenis;
                adequateEl.textContent = data.stokAdequate;
                lowEl.textContent = data.stokLow + data.stokCritical;
            } catch (err) {
                console.error("Gagal memperbarui dashboard:", err);
            }
        }

        // Refresh pertama kali dan tiap 10 detik
        refreshDashboard();
        setInterval(refreshDashboard, 10000);
    });
    </Script>
</x-layout>
