{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FGas</title>
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
            --header-height: 70px;
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

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 10px 15px 10px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 50px;
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

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-card {
            display: flex;
            align-items: center;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
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

        .stat-4 {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        .stat-info h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Charts and Tables */
        .dashboard-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .chart-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h3 {
            font-size: 1.1rem;
            color: var(--dark);
        }

        .chart-actions select {
            padding: 8px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            font-size: 0.9rem;
            outline: none;
        }

        .chart-placeholder {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            height: 250px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }

        /* Recent Activity */
        .activity-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .activity-header {
            margin-bottom: 20px;
        }

        .activity-header h3 {
            font-size: 1.1rem;
            color: var(--dark);
        }

        .activity-list {
            list-style: none;
            padding: 0;
        }

        .activity-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .activity-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
        }

        .activity-info {
            flex: 1;
        }

        .activity-info h4 {
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .activity-info p {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .activity-time {
            font-size: 0.8rem;
            color: var(--gray);
            text-align: right;
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
            
            .dashboard-content {
                grid-template-columns: 1fr;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .header-actions {
                margin-top: 15px;
                width: 100%;
            }
            
            .search-box {
                flex: 1;
            }
            
            .search-box input {
                width: 100%;
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
            <li><a href="/admin/dashboardadmin" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="/admin/tabelpenjuallpg" class="active"><i class="fas fa-gas-pump"></i> Penjual LPG</a></li>
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
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="page-title">
                <h2>Dashboard</h2>
                <ul class="breadcrumb">
                    <li>Home</li>
                    <li>Dashboard</li>
                </ul>
            </div>
            
            {{-- <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari sesuatu...">
                </div>
                
                <a href="#" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
            </div> --}}
</div>

<!-- Dashboard Cards -->
<div class="dashboard-cards">
    <div class="card stat-card">
        <div class="stat-icon stat-2">
            <i class="fas fa-store"></i>
        </div>
        <div class="stat-info">
            <h3>42</h3>
            <p>Penjual Terdaftar</p>
        </div>
    </div>
    <div class="card stat-card">
        <div class="stat-icon stat-4">
            <i class="fas fa-users"></i>
        </div>
        <div class="stat-info">
            <h3>2,189</h3>
            <p>Pengguna Terdaftar</p>
        </div>
    </div>
</div>
<!-- Charts and Tables -->
{{-- <div class="dashboard-content">
            <div class="chart-container">
                <div class="chart-header">
                    <h3>Statistik Penjualan</h3>
                    <div class="chart-actions">
                        <select>
                            <option>Bulan Ini</option>
                            <option>Bulan Lalu</option>
                            <option>3 Bulan Terakhir</option>
                        </select>
                    </div>
                </div>
                <div class="chart-placeholder">
                    <i class="fas fa-chart-bar" style="font-size: 2rem; margin-right: 10px;"></i>
                    <span>Grafik Statistik Penjualan</span>
                </div>
            </div>
            
            <div class="activity-container">
                <div class="activity-header">
                    <h3>Aktivitas Terbaru</h3>
                </div>
                
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon stat-1">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Pesanan Baru</h4>
                            <p>Pelanggan: Budi Santoso</p>
                        </div>
                        <div class="activity-time">2 jam lalu</div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon stat-2">
                            <i class="fas fa-store"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Penjual Baru</h4>
                            <p>Toko LPG Sejahtera terdaftar</p>
                        </div>
                        <div class="activity-time">5 jam lalu</div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon stat-3">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Pesanan Selesai</h4>
                            <p>Pesanan #FG-0987 telah selesai</p>
                        </div>
                        <div class="activity-time">12 jam lalu</div>
                    </li>
                    
                    <li class="activity-item">
                        <div class="activity-icon stat-4">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="activity-info">
                            <h4>Stok Menipis</h4>
                            <p>Stok LPG 3kg di Agen Sentosa menipis</p>
                        </div>
                        <div class="activity-time">1 hari lalu</div>
                    </li>
                </ul>
            </div>
        </div> --}}
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
</script>
</body>
{{-- </html> --}}

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #00b327;
            --primary-dark: #017c11;
            --secondary: #212529;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
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
            display: flex;
            background-color: #f5f7f9;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding: 20px 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
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
            list-style: none;
            padding: 0;
        }

        .nav-links li a {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.9);
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
        }

        .nav-links li a i {
            margin-right: 10px;
            width: 22px;
            text-align: center;
        }

        .nav-links li a:hover,
        .nav-links li a.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
            color: #fff;
        }

        .sidebar-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }

        .user-avatar {
            background-color: white;
            color: var(--primary);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .user-name {
            font-weight: 600;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .user-role {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        /* Main */
        .main-content {
            margin-left: 100px;
            padding: 30px;
            flex: 1;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .page-title h2 {
            color: var(--dark);
            font-weight: 600;
        }

        .breadcrumb {
            list-style: none;
            display: flex;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .breadcrumb li+li::before {
            content: "/";
            margin: 0 8px;
        }

        /* Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-right: 15px;
        }

        .stat-penjual {
            background-color: rgba(0, 179, 39, 0.15);
            color: var(--primary);
        }

        .stat-admin {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        .stat-info h3 {
            font-size: 1.8rem;
            margin-bottom: 5px;
        }

        .stat-info p {
            color: var(--gray);
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div>
            <div class="logo">
                <h1>F<span>Gas</span></h1>
            </div>
            <ul class="nav-links">
                <li><a href="/admin/dashboardadmin" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="/admin/tabelpenjuallpg"><i class="fas fa-gas-pump"></i> Penjual LPG</a></li>
                <li><a href="#"><i class="fas fa-key"></i> Password</a></li>
                <li><a href="#"><i class="fas fa-map-marker-alt"></i> Daftar Lokasi</a></li>
                <li><a href="/admin/mapadmin"><i class="fas fa-map"></i> Map</a></li>
                <li><a href="/"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
            </ul>
        </div>

        <div class="sidebar-footer">
            <div class="user-info">

                <div class="user-avatar">{{ strtoupper(substr($admin->name, 0, 1)) }}</div>
                <div>
                    <div class="user-name">{{ $admin->name }}</div>
                    <div class="user-role">Admin</div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
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
    </div>

</body>

</html>
