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

            <a href="/admin/tabelpenjuallpg" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>

            <a href="#" class="notification-btn">
                <i class="fas fa-bell"></i>
                <span class="notification-badge">3</span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-container">
        <div class="form-header">
            <h3><i class="fas fa-plus-circle"></i> Form Tambah Penjual LPG</h3>
        </div>

        <form id="addSellerForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="ownerName">Nama Pemilik <span style="color: var(--danger);">*</span></label>
                    <input type="text" id="ownerName" placeholder="Masukkan nama pemilik toko" required>
                </div>

                <div class="form-group">
                    <label for="shopName">Nama Toko <span style="color: var(--danger);">*</span></label>
                    <input type="text" id="shopName" placeholder="Masukkan nama toko" required>
                </div>

                <div class="form-group">
                    <label for="email">Email <span style="color: var(--danger);">*</span></label>
                    <input type="email" id="email" placeholder="Masukkan alamat email" required>
                </div>

                <div class="form-group">
                    <label for="phoneNumber">No. HP <span style="color: var(--danger);">*</span></label>
                    <input type="tel" id="phoneNumber" placeholder="Masukkan nomor telepon" required>
                </div>

                <div class="form-group">
                    <label for="address">Alamat Lengkap <span style="color: var(--danger);">*</span></label>
                    <textarea id="address" placeholder="Masukkan alamat lengkap toko" required></textarea>
                </div>

                <div class="form-group">
                    <label for="area">Area <span style="color: var(--danger);">*</span></label>
                    <select id="area" required>
                        <option value="">Pilih Area</option>
                        <option value="jakarta-pusat">Jakarta Pusat</option>
                        <option value="jakarta-selatan">Jakarta Selatan</option>
                        <option value="jakarta-barat">Jakarta Barat</option>
                        <option value="jakarta-timur">Jakarta Timur</option>
                        <option value="jakarta-utara">Jakarta Utara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="lpgTypes">Jenis LPG yang Dijual <span style="color: var(--danger);">*</span></label>
                    <select id="lpgTypes" multiple required>
                        <option value="3kg">LPG 3kg</option>
                        <option value="5kg">LPG 5kg</option>
                        <option value="12kg">LPG 12kg</option>
                        <option value="50kg">LPG 50kg</option>
                    </select>
                    <small>Gunakan Ctrl+Klik untuk memilih lebih dari satu</small>
                </div>

                <div class="form-group">
                    <label for="status">Status <span style="color: var(--danger);">*</span></label>
                    <select id="status" required>
                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="shopDescription">Deskripsi Toko</label>
                <textarea id="shopDescription" placeholder="Tambahkan deskripsi tentang toko"></textarea>
            </div>

            <div class="map-picker">
                <h4><i class="fas fa-map-marker-alt"></i> Pilih Lokasi di Peta</h4>
                <div class="map-placeholder">
                    <i class="fas fa-map" style="font-size: 2rem; margin-right: 10px;"></i>
                    <span>Peta pemilihan lokasi akan ditampilkan di sini</span>
                </div>

                <div class="location-coordinates">
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" placeholder="Koordinat latitude">
                    </div>

                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" placeholder="Koordinat longitude">
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
