<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map Penjual LPG - Admin FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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

        /* Map Section */
        .map-container {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            height: 600px;
            position: relative;
        }

        .map-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .map-header h3 {
            color: var(--dark);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .map-header h3 i {
            color: var(--primary);
        }

        .map-controls {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            width: 250px;
            font-size: 0.9rem;
            outline: none;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .filter-box {
            display: flex;
            gap: 10px;
        }

        .filter-select {
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.9rem;
            outline: none;
            background-color: white;
        }

        #map {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            z-index: 1;
        }

        .map-legend {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            z-index: 1000;
            font-size: 0.9rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 5px;
        }

        .legend-color {
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }

        .legend-gas {
            background-color: var(--primary);
        }

        .legend-cluster {
            background-color: var(--secondary);
        }

        /* Stats Section */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .stat-1 {
            background-color: rgba(255, 127, 0, 0.15);
            color: var(--primary);
        }

        .stat-2 {
            background-color: rgba(45, 91, 124, 0.15);
            color: var(--secondary);
        }

        .stat-3 {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .stat-info h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.9rem;
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
            
            .search-box input {
                width: 100%;
            }
            
            .map-controls {
                flex-direction: column;
                width: 100%;
            }
            
            .filter-box {
                width: 100%;
            }
            
            .filter-select {
                flex: 1;
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
            
            .map-header {
                flex-direction: column;
                align-items: flex-start;
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
            <li><a href="/admin/mapadmin" class="active"><i class="fas fa-map"></i> Map</a></li>
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
                <h2>Peta Lokasi Penjual LPG</h2>
                <ul class="breadcrumb">
                    <li>Dashboard</li>
                    <li>Map</li>
                </ul>
            </div>
            
            <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Penjual
                </a>
                
                <a href="#" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon stat-1">
                    <i class="fas fa-gas-pump"></i>
                </div>
                <div class="stat-info">
                    <h3>42</h3>
                    <p>Total Penjual LPG</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon stat-2">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>5</h3>
                    <p>Area Tercover</p>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon stat-3">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>15</h3>
                    <p>Penjual Aktif Hari Ini</p>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-container">
            <div class="map-header">
                <h3><i class="fas fa-map"></i> Peta Sebaran Penjual LPG</h3>
                
                <div class="map-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="mapSearch" placeholder="Cari lokasi...">
                    </div>
                    
                    <div class="filter-box">
                        <select class="filter-select" id="areaFilter">
                            <option value="">Semua Area</option>
                            <option value="jakarta-pusat">Jakarta Pusat</option>
                            <option value="jakarta-selatan">Jakarta Selatan</option>
                            <option value="jakarta-barat">Jakarta Barat</option>
                            <option value="jakarta-timur">Jakarta Timur</option>
                            <option value="jakarta-utara">Jakarta Utara</option>
                        </select>
                        
                        <select class="filter-select" id="statusFilter">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div id="map"></div>
            
            <div class="map-legend">
                <div class="legend-item">
                    <div class="legend-color legend-gas"></div>
                    <span>Penjual LPG</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color legend-cluster"></div>
                    <span>Cluster Penjual</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize map
        const map = L.map('map').setView([-6.2088, 106.8456], 13); // Jakarta coordinates

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Sample data for gas stations
        const gasStations = [
            { id: 1, lat: -6.2000, lng: 106.8450, name: 'Toko Sumber Rejeki', address: 'Jl. Merdeka No. 123, Jakarta Pusat', phone: '0812-3456-7890', status: 'active', area: 'jakarta-pusat' },
            { id: 2, lat: -6.2120, lng: 106.8400, name: 'Warung Bu Siti', address: 'Jl. Sudirman No. 45, Jakarta Selatan', phone: '0813-4567-8901', status: 'active', area: 'jakarta-selatan' },
            { id: 3, lat: -6.2050, lng: 106.8550, name: 'Agen LPG Sejahtera', address: 'Jl. Thamrin No. 67, Jakarta Pusat', phone: '0811-2233-4455', status: 'inactive', area: 'jakarta-pusat' },
            { id: 4, lat: -6.2150, lng: 106.8350, name: 'Toko LPG Mantap', address: 'Jl. Gatot Subroto No. 89, Jakarta Selatan', phone: '0821-3344-5566', status: 'active', area: 'jakarta-selatan' },
            { id: 5, lat: -6.1950, lng: 106.8500, name: 'Depot LPG Jaya', address: 'Jl. Pangeran Antasari No. 12, Jakarta Selatan', phone: '0856-7890-1234', status: 'active', area: 'jakarta-selatan' },
            { id: 6, lat: -6.2200, lng: 106.8300, name: 'Toko LPG Andalan', address: 'Jl. Rasuna Said No. 10, Jakarta Selatan', phone: '0812-9988-7766', status: 'active', area: 'jakarta-selatan' },
            { id: 7, lat: -6.1900, lng: 106.8600, name: 'Agen LPG Terang', address: 'Jl. Hayam Wuruk No. 25, Jakarta Barat', phone: '0813-5566-7788', status: 'inactive', area: 'jakarta-barat' },
            { id: 8, lat: -6.1800, lng: 106.8400, name: 'Toko LPG Sehat', address: 'Jl. Mangga Besar No. 8, Jakarta Barat', phone: '0822-1122-3344', status: 'active', area: 'jakarta-barat' },
            { id: 9, lat: -6.2300, lng: 106.8200, name: 'Toko LPG Makmur', address: 'Jl. Casablanca No. 15, Jakarta Selatan', phone: '0811-3344-5566', status: 'active', area: 'jakarta-selatan' },
            { id: 10, lat: -6.1700, lng: 106.8700, name: 'Agen LPG Sentosa', address: 'Jl. Gajah Mada No. 20, Jakarta Barat', phone: '0823-4455-6677', status: 'active', area: 'jakarta-barat' }
        ];

        // Add gas stations markers
        const markers = [];
        gasStations.forEach(station => {
            const marker = L.marker([station.lat, station.lng])
                .addTo(map)
                .bindPopup(`
                    <div style="min-width: 200px;">
                        <h3 style="margin-bottom: 10px; color: var(--primary);">${station.name}</h3>
                        <p style="margin-bottom: 8px;"><i class="fas fa-map-marker-alt" style="color: var(--primary);"></i> ${station.address}</p>
                        <p style="margin-bottom: 8px;"><i class="fas fa-phone" style="color: var(--primary);"></i> ${station.phone}</p>
                        <p style="margin-bottom: 8px;">
                            <span class="status" style="display: inline-block; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 500; background-color: ${station.status === 'active' ? 'rgba(40, 167, 69, 0.15)' : 'rgba(220, 53, 69, 0.15)'}; color: ${station.status === 'active' ? '#28A745' : '#DC3545'};">
                                ${station.status === 'active' ? 'Aktif' : 'Nonaktif'}
                            </span>
                        </p>
                        <div style="display: flex; gap: 10px; margin-top: 15px;">
                            <button style="padding: 8px 12px; background-color: var(--primary); color: white; border: none; border-radius: 5px; cursor: pointer;">Edit</button>
                            <button style="padding: 8px 12px; background-color: #DC3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Hapus</button>
                        </div>
                    </div>
                `);
            
            markers.push(marker);
        });

        // Filter functionality
        const areaFilter = document.getElementById('areaFilter');
        const statusFilter = document.getElementById('statusFilter');
        
        function filterMarkers() {
            const areaValue = areaFilter.value;
            const statusValue = statusFilter.value;
            
            markers.forEach((marker, index) => {
                const station = gasStations[index];
                const matchesArea = areaValue === '' || station.area === areaValue;
                const matchesStatus = statusValue === '' || station.status === statusValue;
                
                if (matchesArea && matchesStatus) {
                    map.addLayer(marker);
                } else {
                    map.removeLayer(marker);
                }
            });
        }
        
        areaFilter.addEventListener('change', filterMarkers);
        statusFilter.addEventListener('change', filterMarkers);

        // Search functionality
        const mapSearch = document.getElementById('mapSearch');
        
        mapSearch.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            
            markers.forEach((marker, index) => {
                const station = gasStations[index];
                const matchesSearch = station.name.toLowerCase().includes(searchText) || 
                                     station.address.toLowerCase().includes(searchText);
                
                if (matchesSearch) {
                    map.addLayer(marker);
                } else {
                    map.removeLayer(marker);
                }
            });
        });

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
    </script>
</body>
</html>