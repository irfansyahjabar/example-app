<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjual - FGas</title>
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

        @media (max-width: 992px) {
            .dashboard-content {
                grid-template-columns: 1fr;
            }
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

        /* Recent Orders */
        .orders-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .orders-header {
            margin-bottom: 20px;
        }

        .orders-header h3 {
            font-size: 1.1rem;
            color: var(--dark);
        }

        .orders-list {
            list-style: none;
            padding: 0;
        }

        .order-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .order-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1rem;
            background-color: rgba(255, 127, 0, 0.15);
            color: var(--primary);
        }

        .order-info {
            flex: 1;
        }

        .order-info h4 {
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .order-info p {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .order-time {
            font-size: 0.8rem;
            color: var(--gray);
            text-align: right;
        }

        /* Stock Alert */
        .stock-alert {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            border-left: 4px solid var(--warning);
        }

        .stock-alert-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .stock-alert-header h3 {
            font-size: 1.1rem;
            color: var(--dark);
            margin-left: 10px;
        }

        .stock-alert-header i {
            color: var(--warning);
            font-size: 1.2rem;
        }

        .stock-alert p {
            color: var(--gray);
            margin-bottom: 15px;
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
            <li><a href="/penjual/dahsboardpenjuallpg" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="/penjual/stoklpg"><i class="fas fa-gas-pump"></i> Stok LPG</a></li>
            <li><a href="#"><i class="fas fa-map"></i> Map</a></li>
            <li><a href="{{ route('penjual.profilepenjual') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="/"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ $user->name }}</div>
                    <div class="user-role">{{ $user->email }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="page-title">
                <h2>Dashboard Penjual</h2>
                <ul class="breadcrumb">
                    <li>Home</li>
                    <li>Dashboard</li>
                </ul>
            </div>
            
            <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                {{-- <a href="#" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">5</span>
                </a> --}}
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            @foreach($stok as $item)
                <div class="card stat-card">
                    <div class="stat-icon stat-1">
                        <i class="fas fa-gas-pump"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $item->total_stok }}</h3>
                        <p>Stok LPG {{ $item->jenis }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Charts and Orders -->
        {{-- <div class="dashboard-content">
            <div class="chart-container">
                <div class="chart-header">
                    <h3>Statistik Penjualan</h3>
                    <div class="chart-actions">
                        <select>
                            <option>Minggu Ini</option>
                            <option>Bulan Ini</option>
                            <option>3 Bulan Terakhir</option>
                        </select>
                    </div>
                </div>
                <div class="chart-placeholder">
                    <i class="fas fa-chart-bar" style="font-size: 2rem; margin-right: 10px;"></i>
                    <span>Grafik Statistik Penjualan</span>
                </div>
            </div>
            
            <div class="orders-container">
                <div class="orders-header">
                    <h3>Pesanan Terbaru</h3>
                </div>
                
                <ul class="orders-list">
                    <li class="order-item">
                        <div class="order-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="order-info">
                            <h4>Pesanan #FG-0987</h4>
                            <p>3 tabung LPG 3kg</p>
                        </div>
                        <div class="order-time">2 jam lalu</div>
                    </li>
                    
                    <li class="order-item">
                        <div class="order-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="order-info">
                            <h4>Pesanan #FG-0986</h4>
                            <p>2 tabung LPG 12kg</p>
                        </div>
                        <div class="order-time">5 jam lalu</div>
                    </li>
                    
                    <li class="order-item">
                        <div class="order-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="order-info">
                            <h4>Pesanan #FG-0985</h4>
                            <p>1 tabung LPG 5kg</p>
                        </div>
                        <div class="order-time">8 jam lalu</div>
                    </li>
                    
                    <li class="order-item">
                        <div class="order-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="order-info">
                            <h4>Pesanan #FG-0984</h4>
                            <p>4 tabung LPG 3kg</p>
                        </div>
                        <div class="order-time">12 jam lalu</div>
                    </li>
                </ul>
            </div>
        </div> --}}

        <!-- Stock Alert -->
        <div class="stock-alert">
            <div class="stock-alert-header">
                <i class="fas fa-exclamation-triangle"></i>
                <h3>Peringatan Stok</h3>
            </div>
            <p>Stok LPG 3kg Anda hampir habis. Sisa stok: 15 tabung. Segera lakukan pengadaan untuk menghindari kehabisan stok.</p>
            <button class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Stok
            </button>
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

        // Simulate logout
        document.querySelector('.logout-btn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                alert('Logout berhasil!');
                // In a real application, this would redirect to login page
            }
        });
    </script>
</body>
</html>