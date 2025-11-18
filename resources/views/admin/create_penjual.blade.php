<x-layout title="Form Tambah Penjual">
    <!-- Header -->
    <div class="header">
        <div class="page-title">
            <h2>Tambah Penjual LPG</h2>
            <ul class="breadcrumb">
                <li>Dashboard</li>
                <li>Penjual LPG</li>
                <li>Tambah Baru</li>
            </ul>
        </div>

        <div class="header-actions">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>

            <a href="/admin/sellers" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-container">
        <div class="form-header">
            <h3><i class="fas fa-plus-circle"></i> Form Tambah Penjual LPG</h3>
        </div>

        <form id="addSellerForm" action="{{ route('sellers.store') }}" method="POST">
            @csrf  

            <div class="form-grid">
                <div class="form-group">
                    <label for="ownerName">Nama Pemilik <span style="color: var(--danger);">*</span></label>
                    <input type="text" id="ownerName" name="ownerName" placeholder="Masukkan nama pemilik toko"
                        required>
                </div>

                <div class="form-group">
                    <label for="shopName">Nama Toko <span style="color: var(--danger);">*</span></label>
                    <input type="text" id="shopName" name="shopName" placeholder="Masukkan nama toko" required>
                </div>

                <div class="form-group">
                    <label for="email">Email <span style="color: var(--danger);">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password <span style="color: var(--danger);">*</span></label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
                </div>

                <div class="form-group">
                    <label for="phoneNumber">No. HP <span style="color: var(--danger);">*</span></label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Masukkan nomor telepon"
                        required>
                </div>
            </div>

            <div class="map-picker">
                <div class="location-coordinates">
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude" placeholder="Koordinat latitude">
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude" placeholder="Koordinat longitude">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check"></i> Simpan Data
                </button>
                <button type="button" class="btn btn-outline">
                    <i class="fas fa-times"></i> Batal
                </button>
            </div>
        </form>
    </div>
</x-layout>
