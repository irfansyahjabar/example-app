<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjual LPG - Admin FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00b327;
            --primary-dark: #017c11;
            --secondary: #212529;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --success: #28A745;
            --warning: #FFC107;
            --danger: #DC3545;
            --sidebar-width: 250px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7f9;
            color: var(--dark);
            line-height: 1.6;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo {
            padding: 0 20px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 20px;
        }

        .logo h1 {
            color: white;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo span {
            color: var(--secondary);
        }

        .nav-links {
            flex: 1;
            list-style: none;
            padding: 0;
        }

        .nav-links li {
            margin-bottom: 5px;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-links a:hover, .nav-links a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid white;
        }

        .nav-links i {
            margin-right: 15px;
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            color: var(--primary);
            font-weight: bold;
        }

        .user-details {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-role {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .logout-btn {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .page-title h2 {
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .breadcrumb {
            display: flex;
            list-style: none;
            padding: 0;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .breadcrumb li {
            margin-right: 10px;
        }

        .breadcrumb li:after {
            content: '/';
            margin-left: 10px;
            color: var(--gray);
        }

        .breadcrumb li:last-child:after {
            content: '';
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .notification-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark);
            text-decoration: none;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger);
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        /* Form Section */
        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .form-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .form-header h3 {
            color: var(--dark);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-header h3 i {
            color: var(--primary);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            border-color: var(--primary);
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-group small {
            display: block;
            margin-top: 5px;
            color: var(--gray);
            font-size: 0.8rem;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 10px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        /* Map Picker */
        .map-picker {
            margin-top: 20px;
        }

        .map-picker h4 {
            margin-bottom: 15px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .map-picker h4 i {
            color: var(--primary);
        }

        .map-placeholder {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            height: 300px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            margin-bottom: 15px;
        }

        .location-coordinates {
            display: flex;
            gap: 15px;
        }

        .location-coordinates .form-group {
            flex: 1;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .header-actions {
                margin-top: 15px;
                width: 100%;
                justify-content: space-between;
            }
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        @media (max-width: 992px) {
            .menu-toggle {
                display: block;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .location-coordinates {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <h1>F<span>Gas</span></h1>
        </div>
        
        <ul class="nav-links">
            <li><a href="/admin/dashboardadmin"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="/admin/tabelpenjuallpg"><i class="fas fa-gas-pump"></i> Penjual LPG</a></li>
            <li><a href="#"><i class="fas fa-key"></i> Password</a></li>
            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Daftar Lokasi</a></li>
            <li><a href="/admin/mapadmin"><i class="fas fa-map"></i> Map</a></li>
            <li><a href="/"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">A</div>
                <div class="user-details">
                    <div class="user-name">Admin FGas</div>
                    <div class="user-role">Super Admin</div>
                </div>
            </div>
            <button class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
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
    </div>

    <script>
        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth < 992 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Form validation
        document.getElementById('addSellerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const shopName = document.getElementById('shopName').value;
            const ownerName = document.getElementById('ownerName').value;
            const email = document.getElementById('email').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const address = document.getElementById('address').value;
            const area = document.getElementById('area').value;
            const lpgTypes = document.getElementById('lpgTypes');
            const status = document.getElementById('status').value;
            
            // Validasi field wajib
            if (!shopName || !ownerName || !email || !phoneNumber || !address || !area || !status) {
                alert('Harap isi semua field yang wajib diisi!');
                return;
            }
            
            // Validasi pilihan jenis LPG
            const selectedLpgTypes = Array.from(lpgTypes.selectedOptions).map(option => option.value);
            if (selectedLpgTypes.length === 0) {
                alert('Harap pilih minimal satu jenis LPG yang dijual!');
                return;
            }
            
            // Validasi email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Format email tidak valid!');
                return;
            }
            
            // Validasi nomor telepon
            const phonePattern = /^[0-9+\-\s()]{10,}$/;
            if (!phonePattern.test(phoneNumber)) {
                alert('Format nomor telepon tidak valid!');
                return;
            }
            
            // Simulasi pengiriman data
            const formData = {
                shopName,
                ownerName,
                email,
                phoneNumber,
                address,
                area,
                lpgTypes: selectedLpgTypes,
                status,
                description: document.getElementById('shopDescription').value,
                latitude: document.getElementById('latitude').value,
                longitude: document.getElementById('longitude').value
            };
            
            console.log('Data yang akan dikirim:', formData);
            
            // Simpan data (dalam aplikasi nyata, ini akan mengirim data ke server)
            alert('Data penjual LPG berhasil disimpan!');
            
            // Reset form
            this.reset();
        });

        // Auto generate coordinates (simulasi)
        document.querySelector('.map-placeholder').addEventListener('click', function() {
            // Simulasi pemilihan lokasi di peta
            const randomLat = -6.1 + (Math.random() * 0.2);
            const randomLng = 106.7 + (Math.random() * 0.2);
            
            document.getElementById('latitude').value = randomLat.toFixed(6);
            document.getElementById('longitude').value = randomLng.toFixed(6);
            
            alert('Lokasi telah dipilih secara acak. Dalam aplikasi nyata, Anda akan memilih lokasi di peta interaktif.');
        });
    </script>
</body>
</html>