<x-layout>
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Tabel Akun Penjual LPG</h2>
            <ul class="breadcrumb">
                <li>Dashboard</li>
                <li>Penjual LPG</li>
                <li>Daftar Penjual</li>
            </ul>
        </div>

        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <a href="/admin/tambahpenjuallpg" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Penjual
            </a>

            <a href="#" class="notification-btn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </a>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-container">
        <div class="table-header">
            <h3><i class="fas fa-list"></i> Daftar Penjual LPG</h3>

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Cari penjual...">
            </div>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Pemilik</th>
                    <th>Lokasi</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sellers as $index => $seller)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $seller->store_name }}</td>
                        <td>{{ $seller->name }}</td>
                        <td>
                            @if ($seller->address)
                                {{ $seller->address }}
                            @else
                                <span class="text-muted">Belum ada lokasi</span>
                            @endif
                        </td>
                        <td>{{ $seller->phone }}</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-edit"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn-icon btn-delete"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="table-footer">
            <div class="table-info">
                Menampilkan 1 hingga 5 dari 15 entri
            </div>

            <div class="pagination">
                <a href="#" class="pagination-btn"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn">2</a>
                <a href="#" class="pagination-btn">3</a>
                <a href="#" class="pagination-btn"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</x-layout>
