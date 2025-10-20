<x-layout>
    <div class="header">
        <div class="page-title">
            <h2>Dashboard</h2>
            <ul class="breadcrumb">
                <li>Home</li>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>

    <div class="dashboard-cards">
        <div class="card">
            <div class="stat-icon stat-penjual">
                <i class="fas fa-store"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $jumlahPenjual }}</h3>
                <p>Penjual Terdaftar</p>
            </div>
        </div>

        <div class="card">
            <div class="stat-icon stat-admin">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $jumlahAdmin }}</h3>
                <p>Admin Terdaftar</p>
            </div>
        </div>
    </div>
</x-layout>
