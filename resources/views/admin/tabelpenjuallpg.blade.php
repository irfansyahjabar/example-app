<x-layout>
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Tabel Akun Penjual LPG</h2>
        </div>
    </div>

    <!-- Table Section -->
    <div class="table-container">
        <div class="table-header">
            <h3><i class="fas fa-list"></i> Daftar Penjual LPG</h3>

            <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>

                <a href="{{ route('sellers.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Penjual
                </a>

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
                        <td>
                    <div class="action-buttons">
                        <a href="{{ route('sellers.edit', $seller->id) }}" class="btn-icon btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('sellers.destroy', $seller->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon btn-delete" onclick="return confirm('Yakin mau hapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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
