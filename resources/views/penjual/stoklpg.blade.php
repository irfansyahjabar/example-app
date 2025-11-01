<x-layout title="Stok LPG">
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Kelola Stok LPG</h2>
            <ul class="breadcrumb">
                <li>Dashboard</li>
                <li>Stok LPG</li>
            </ul>
        </div>

        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('stoklpg.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Stok
            </a>
        </div>
    </div>

    <!-- Stock Overview -->
    {{-- <div class="stock-overview">
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
    </div> --}}

    <!-- Stock Table -->
    <div class="table-container">
        <div class="table-header">
            <h3><i class="fas fa-list"></i> Daftar Stok LPG</h3>

            <div class="table-controls">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari jenis LPG...">
                </div>

                <div class="filter-box">
                    <select class="filter-select" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="adequate">Stok Cukup</option>
                        <option value="low">Stok Menipis</option>
                        <option value="critical">Stok Kritis</option>
                    </select>

                    <select class="filter-select" id="typeFilter">
                        <option value="">Semua Jenis</option>
                        <option value="3kg">LPG 3kg</option>
                        <option value="5kg">LPG 5kg</option>
                        <option value="12kg">LPG 12kg</option>
                        <option value="50kg">LPG 50kg</option>
                    </select>
                </div>
            </div>
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Jenis LPG</th>
                    <th>Stok Tersedia</th>
                    <th>Harga per Unit</th>
                    <th>Status</th>
                    <th>Terakhir Diupdate</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stok as $item)
                    <tr>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ $item->total_stok }}</td>

                        {{-- Ambil data harga & status dari stok terbaru berdasarkan id --}}
                        @php
                            $stokTerbaru = \App\Models\StokLpg::find($item->id);
                        @endphp

                        <td>
                            @if ($stokTerbaru)
                                Rp {{ number_format($stokTerbaru->harga, 0, ',', '.') }}
                            @else
                                Rp 0
                            @endif
                        </td>

                        <td>
                            @if ($stokTerbaru && $stokTerbaru->status == 'adequate')
                                <span class="stock-status status-adequate">Cukup</span>
                            @elseif($stokTerbaru && $stokTerbaru->status == 'low')
                                <span class="stock-status status-low">Menipis</span>
                            @elseif($stokTerbaru && $stokTerbaru->status == 'critical')
                                <span class="stock-status status-critical">Kritis</span>
                            @else
                                <span class="stock-status status-critical">-</span>
                            @endif
                        </td>

                        <td>
                            @if ($stokTerbaru && $stokTerbaru->updated_at)
                                {{ $stokTerbaru->updated_at->format('d M Y, H:i') }}
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <div class="action-buttons">
                                @if ($stokTerbaru)
                                    <a href="{{ route('stoklpg.edit', $stokTerbaru->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('stoklpg.destroy', $stokTerbaru->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="table-footer">
            <div class="table-info">
                Menampilkan 1 hingga 4 dari 4 entri
            </div>

            <div class="pagination">
                <a href="#" class="pagination-btn"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="pagination-btn active">1</a>
                <a href="#" class="pagination-btn"><i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div>

</x-layout>
