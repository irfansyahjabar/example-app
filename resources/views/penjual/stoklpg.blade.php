<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Stok LPG - Penjual FGas</title>
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

        .btn-success {
            background-color: var(--success);
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
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

        /* Stock Overview */
        .stock-overview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stock-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
        }

        .stock-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .stock-1 {
            background-color: rgba(255, 127, 0, 0.15);
            color: var(--primary);
        }

        .stock-2 {
            background-color: rgba(45, 91, 124, 0.15);
            color: var(--secondary);
        }

        .stock-3 {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .stock-4 {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        .stock-info h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
        }

        .stock-info p {
            color: var(--gray);
            font-size: 0.9rem;
        }

        /* Stock Table */
        .table-container {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h3 {
            color: var(--dark);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-header h3 i {
            color: var(--primary);
        }

        .table-controls {
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

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .data-table th {
            background-color: #f8f9fa;
            text-align: left;
            padding: 15px;
            font-weight: 600;
            color: var(--dark);
            border-bottom: 2px solid #e9ecef;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background-color: #f8f9fa;
        }

        .stock-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-adequate {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .status-low {
            background-color: rgba(255, 193, 7, 0.15);
            color: var(--warning);
        }

        .status-critical {
            background-color: rgba(220, 53, 69, 0.15);
            color: var(--danger);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-edit {
            background-color: var(--warning);
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            background-color: var(--danger);
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-info {
            font-size: 0.9rem;
            color: var(--gray);
        }

        .pagination {
            display: flex;
            gap: 8px;
        }

        .pagination-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1px solid #e0e0e0;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .pagination-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .pagination-btn:hover:not(.active) {
            background-color: #f8f9fa;
        }

        /* Stock Alert */
        .stock-alert {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
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
            
            .table-controls {
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
            
            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .data-table {
                min-width: 800px;
            }
            
            .table-footer {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .pagination {
                width: 100%;
                justify-content: center;
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
            <li><a href="/penjual/dashboardpenjuallpg"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="/penjual/stoklpg" class="active"><i class="fas fa-gas-pump"></i> Stok LPG</a></li>
            <li><a href="#"><i class="fas fa-map"></i> Map</a></li>
            <li><a href="{{ route('penjual.profilepenjual') }}"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="/penjual/login"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
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
                 
                {{-- <a href="#" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a> --}}
            </div>
        </div>

        <!-- Stock Overview -->
        <div class="stock-overview">
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
        </div>


        <!-- Stock Table -->
        <div class="table-container">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> Daftar Stok LPG</h3>
                
                <div class="table-controls">
                    {{-- <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari jenis LPG...">
                    </div> --}}
                    
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
                            @if($stokTerbaru)
                                Rp {{ number_format($stokTerbaru->harga, 0, ',', '.') }}
                            @else
                                Rp 0
                            @endif
                        </td>

                        <td>
                            @if($stokTerbaru && $stokTerbaru->status == 'adequate')
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
                            @if($stokTerbaru && $stokTerbaru->updated_at)
                                {{ $stokTerbaru->updated_at->format('d M Y, H:i') }}
                            @else
                                -
                            @endif
                        </td>

                        <td>
                            <div class="action-buttons">
                                @if($stokTerbaru)
                                    <a href="{{ route('stoklpg.edit', $stokTerbaru->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('stoklpg.destroy', $stokTerbaru->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus stok ini?')">
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

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const typeFilter = document.getElementById('typeFilter');
        const tableRows = document.querySelectorAll('.data-table tbody tr');
        
        function filterTable() {
            const searchText = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const typeValue = typeFilter.value;
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const type = cells[0].textContent.toLowerCase();
                const status = cells[3].querySelector('.stock-status').classList[1];
                
                const matchesSearch = type.includes(searchText);
                const matchesStatus = statusValue === '' || status.includes(statusValue);
                const matchesType = typeValue === '' || type.includes(typeValue);
                
                row.style.display = (matchesSearch && matchesStatus && matchesType) ? '' : 'none';
            });
        }
        
        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        typeFilter.addEventListener('change', filterTable);
    </script>
</body>
</html>