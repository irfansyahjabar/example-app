<x-layout title="Stok LPG">
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Kelola Stok LPG</h2>
        </div>
    </div>

    <!-- Stock Table -->
    <div class="table-container">
        <div class="table-header">
            <h3><i class="fas fa-list"></i> Daftar Stok LPG</h3>

            <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('stoklpg.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Stok
                </a>
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
            @forelse ($stok as $item)
                <tr>
                    <td>{{ strtoupper($item->jenis) }}</td>
                    <td>{{ $item->stok }}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                    <td>
                        @if ($item->status === 'adequate')
                            <span class="stock-status status-adequate">Cukup</span>
                        @elseif ($item->status === 'low')
                            <span class="stock-status status-low">Menipis</span>
                        @elseif ($item->status === 'critical')
                            <span class="stock-status status-critical">Kritis</span>
                        @else
                            <span class="stock-status">-</span>
                        @endif
                    </td>

                    <td>{{ $item->updated_at ? $item->updated_at->format('d M Y, H:i') : '-' }}</td>

                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('stoklpg.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('stoklpg.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">Belum ada data stok.</td>
                </tr>
            @endforelse
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const deleteForms = document.querySelectorAll('form[method="POST"][action*="stoklpg"]');

    deleteForms.forEach(form => {
        const btn = form.querySelector('button[data-confirm-delete="true"]');
        if (!btn) return;

        btn.addEventListener("click", function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Hapus Data?",
                text: "Data stok ini akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>

</x-layout>

