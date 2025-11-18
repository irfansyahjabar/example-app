<x-layout-nonsidebar title="Tambah Stok LPG">
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">F<span>Gas</span></div>
            <div class="header-content">
                <h1><i class="fas fa-gas-pump"></i> Edit Stok LPG</h1>
                <p>Kelola stok LPG toko Anda dengan mudah</p>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('penjual.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            > <a href="{{ route('stoklpg.index') }}">Stok LPG</a>
            > <span>Edit Stok</span>
        </div>

        <!-- Current Stock Info -->
        <div class="current-stock">
            <h3><i class="fas fa-boxes"></i> Stok Saat Ini</h3>
            <div class="stock-items">
                @forelse($stok as $item)
                    <div class="stock-item">
                        <div class="type">LPG {{ $item->jenis }}</div>
                        <div class="quantity">{{ $item->stok }}</div>
                        <div class="unit">tabung</div>
                    </div>
                @empty
                    <p>Belum ada stok yang tercatat.</p>
                @endforelse
            </div>
        </div>

        <!-- Form Tambah Stok -->
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-edit"></i> Form Edit Stok</h2>
            </div>

            <form action="{{ route('stoklpg.update', $stoklpg->id) }}" method="POST" id="addStockForm">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="lpgType" class="required">Jenis LPG</label>
                    <select name="jenis" id="lpgType" required>
                        <option value="">Pilih Jenis LPG</option>
                        <option value="3kg" {{ $stoklpg->jenis == '3kg' ? 'selected' : '' }}>LPG 3kg</option>
                        <option value="5kg" {{ $stoklpg->jenis == '5kg' ? 'selected' : '' }}>LPG 5kg</option>
                        <option value="12kg" {{ $stoklpg->jenis == '12kg' ? 'selected' : '' }}>LPG 12kg</option>
                        <option value="50kg" {{ $stoklpg->jenis == '50kg' ? 'selected' : '' }}>LPG 50kg</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity" class="required">Jumlah Stok</label>
                    <input type="number" name="stok" id="quantity" min="1" max="1000"
                        placeholder="Masukkan jumlah stok" value="{{ old('stok', $stoklpg->stok) }}">
                </div>

                <div class="form-group">
                    <label for="sellingPrice" class="required">Harga Jual per Tabung</label>
                    <input type="number" name="harga" id="sellingPrice" min="1000" placeholder="Contoh: 20000"
                        value="{{ old('harga', $stoklpg->harga) }}">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Stok
                    </button>
                    <a href="{{ route('stoklpg.index') }}" class="btn btn-outline">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout-nonsidebar>
