{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Lokasi Penjual</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-image: url('/images/lpg.png');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="bg-[#3BC400] bg-opacity-90 text-white min-h-screen">

  <!-- Sidebar -->
  <aside id="sidebar"
         class="fixed top-0 left-0 h-full w-64 bg-gray-700 text-white p-6 transform -translate-x-full transition-transform duration-300 z-40">
    <div class="text-3xl font-bold mb-10">FGas</div>
    <nav class="space-y-6">
      <a href="/dashboardpencari" class="flex items-center space-x-3"><i class="fas fa-home"></i><span>Dashboard</span></a>
      <a href="/daftarlokasi" class="flex items-center space-x-3"><i class="fas fa-map-pin"></i><span>Daftar Lokasi</span></a>
      <a href="/mappencari" class="flex items-center space-x-3"><i class="fas fa-map"></i><span>Map</span></a>
      <a href="/login" class="flex items-center space-x-3"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a>
    </nav>
  </aside>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30" onclick="toggleSidebar()"></div>

  <!-- Header -->
  <header class="bg-gray-800 text-white h-16 flex items-center justify-between px-6 z-50 relative">
    <div class="text-xl font-bold">FGas</div>
    <button onclick="toggleSidebar()" class="text-2xl block">
      <i class="fas fa-bars"></i>
    </button>
  </header>

  <!-- Konten Utama -->
  <main class="p-6 mt-4">
    <div class="bg-gray-700 p-6 rounded-lg max-w-5xl mx-auto">
      <div class="bg-white text-black text-center p-6 rounded mb-6">
        <h2 class="text-xl font-semibold">Tabel Daftar Lokasi Penjual</h2>
      </div>

      <!-- Tabel -->
      <div class="overflow-x-auto bg-white rounded shadow-md">
        <table class="min-w-full text-sm text-black text-left">
          <thead class="bg-gray-200 font-bold">
            <tr>
              <th class="px-4 py-2">No</th>
              <th class="px-4 py-2">Nama Toko</th>
              <th class="px-4 py-2">Pemilik</th>
              <th class="px-4 py-2">Lokasi</th>
              <th class="px-4 py-2">No HP</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-gray-100">
              <td class="px-4 py-2">1</td>
              <td class="px-4 py-2">Toko LPG A</td>
              <td class="px-4 py-2">Budi</td>
              <td class="px-4 py-2">Jl. Merdeka No. 10</td>
              <td class="px-4 py-2">081234567890</td>
            </tr>
            <tr class="hover:bg-gray-100">
              <td class="px-4 py-2">2</td>
              <td class="px-4 py-2">Toko LPG B</td>
              <td class="px-4 py-2">Sari</td>
              <td class="px-4 py-2">Jl. Hasanuddin No. 20</td>
              <td class="px-4 py-2">082345678901</td>
            </tr>
            <!-- Tambah data lainnya jika perlu -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Script: Toggle Sidebar -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const isOpen = sidebar.classList.contains('translate-x-0');

      if (isOpen) {
        sidebar.classList.remove('translate-x-0');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      } else {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('translate-x-0');
        overlay.classList.remove('hidden');
      }
    }
  </script>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lokasi Penjual LPG - FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF7F00;
            --primary-dark: #E67200;
            --secondary: #2D5B7C;
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

        /* Table Section */
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
            position: sticky;
            top: 0;
        }

        .data-table td {
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }

        .data-table tr:hover {
            background-color: #f8f9fa;
        }

        .status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-active {
            background-color: rgba(40, 167, 69, 0.15);
            color: var(--success);
        }

        .status-inactive {
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

        .btn-view {
            background-color: var(--secondary);
        }

        .btn-view:hover {
            background-color: #244c6d;
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

        /* Map Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: white;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            max-height: 80vh;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
        }

        .modal-header h3 {
            color: var(--dark);
            font-size: 1.2rem;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }

        .modal-body {
            padding: 20px;
            height: 500px;
        }

        #modalMap {
            width: 100%;
            height: 100%;
            border-radius: 8px;
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
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-gas-pump"></i> Penjual LPG</a></li>
            <li><a href="#"><i class="fas fa-key"></i> Password</a></li>
            <li><a href="#" class="active"><i class="fas fa-map-marker-alt"></i> Daftar Lokasi</a></li>
            <li><a href="#"><i class="fas fa-map"></i> Map</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
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
                <h2>Daftar Lokasi Penjual LPG</h2>
                <ul class="breadcrumb">
                    <li>Dashboard</li>
                    <li>Lokasi</li>
                    <li>Daftar Lokasi</li>
                </ul>
            </div>
            
            <div class="header-actions">
                <button class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Lokasi
                </a>
                
                <a href="#" class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </a>
            </div>
        </div>

        <!-- Table Section -->
        <div class="table-container">
            <div class="table-header">
                <h3><i class="fas fa-list"></i> Daftar Semua Lokasi</h3>
                
                <div class="table-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari lokasi...">
                    </div>
                    
                    <div class="filter-box">
                        <select class="filter-select" id="statusFilter">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Nonaktif</option>
                        </select>
                        
                        <select class="filter-select" id="areaFilter">
                            <option value="">Semua Area</option>
                            <option value="jakarta-pusat">Jakarta Pusat</option>
                            <option value="jakarta-selatan">Jakarta Selatan</option>
                            <option value="jakarta-barat">Jakarta Barat</option>
                            <option value="jakarta-timur">Jakarta Timur</option>
                            <option value="jakarta-utara">Jakarta Utara</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Pemilik</th>
                        <th>Lokasi</th>
                        <th>Area</th>
                        <th>Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Toko Sumber Rejeki</td>
                        <td>Budi Santoso</td>
                        <td>Jl. Merdeka No. 123</td>
                        <td>Jakarta Pusat</td>
                        <td>0812-3456-7890</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="1" data-name="Toko Sumber Rejeki">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Warung Bu Siti</td>
                        <td>Siti Rahayu</td>
                        <td>Jl. Sudirman No. 45</td>
                        <td>Jakarta Selatan</td>
                        <td>0813-4567-8901</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="2" data-name="Warung Bu Siti">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Agen LPG Sejahtera</td>
                        <td>Agus Prasetyo</td>
                        <td>Jl. Thamrin No. 67</td>
                        <td>Jakarta Pusat</td>
                        <td>0811-2233-4455</td>
                        <td><span class="status status-inactive">Nonaktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="3" data-name="Agen LPG Sejahtera">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Toko LPG Mantap</td>
                        <td>Rina Wijaya</td>
                        <td>Jl. Gatot Subroto No. 89</td>
                        <td>Jakarta Selatan</td>
                        <td>0821-3344-5566</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="4" data-name="Toko LPG Mantap">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Depot LPG Jaya</td>
                        <td>Joko Susilo</td>
                        <td>Jl. Pangeran Antasari No. 12</td>
                        <td>Jakarta Selatan</td>
                        <td>0856-7890-1234</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="5" data-name="Depot LPG Jaya">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Toko LPG Andalan</td>
                        <td>Dewi Kusuma</td>
                        <td>Jl. Rasuna Said No. 10</td>
                        <td>Jakarta Selatan</td>
                        <td>0812-9988-7766</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="6" data-name="Toko LPG Andalan">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Agen LPG Terang</td>
                        <td>Bambang Sutrisno</td>
                        <td>Jl. Hayam Wuruk No. 25</td>
                        <td>Jakarta Barat</td>
                        <td>0813-5566-7788</td>
                        <td><span class="status status-inactive">Nonaktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="7" data-name="Agen LPG Terang">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Toko LPG Sehat</td>
                        <td>Linda Suryani</td>
                        <td>Jl. Mangga Besar No. 8</td>
                        <td>Jakarta Barat</td>
                        <td>0822-1122-3344</td>
                        <td><span class="status status-active">Aktif</span></td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-icon btn-view" data-id="8" data-name="Toko LPG Sehat">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>
                                <a href="#" class="btn-icon btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn-icon btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="table-footer">
                <div class="table-info">
                    Menampilkan 1 hingga 8 dari 25 entri
                </div>
                
                <div class="pagination">
                    <a href="#" class="pagination-btn"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="pagination-btn active">1</a>
                    <a href="#" class="pagination-btn">2</a>
                    <a href="#" class="pagination-btn">3</a>
                    <a href="#" class="pagination-btn">4</a>
                    <a href="#" class="pagination-btn"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div class="modal" id="mapModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Lokasi Penjual</h3>
                <button class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <div id="modalMap"></div>
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
        const areaFilter = document.getElementById('areaFilter');
        const tableRows = document.querySelectorAll('.data-table tbody tr');
        
        function filterTable() {
            const searchText = searchInput.value.toLowerCase();
            const statusValue = statusFilter.value;
            const areaValue = areaFilter.value;
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const name = cells[1].textContent.toLowerCase();
                const owner = cells[2].textContent.toLowerCase();
                const location = cells[3].textContent.toLowerCase();
                const area = cells[4].textContent.toLowerCase();
                const status = cells[6].querySelector('.status').classList.contains('status-active') ? 'active' : 'inactive';
                
                const matchesSearch = name.includes(searchText) || owner.includes(searchText) || location.includes(searchText);
                const matchesStatus = statusValue === '' || status === statusValue;
                const matchesArea = areaValue === '' || area.includes(areaValue);
                
                row.style.display = (matchesSearch && matchesStatus && matchesArea) ? '' : 'none';
            });
        }
        
        searchInput.addEventListener('input', filterTable);
        statusFilter.addEventListener('change', filterTable);
        areaFilter.addEventListener('change', filterTable);

        // Map modal functionality
        const mapModal = document.getElementById('mapModal');
        const modalTitle = document.getElementById('modalTitle');
        const closeBtn = document.querySelector('.close-btn');
        const viewButtons = document.querySelectorAll('.btn-view');
        
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                
                modalTitle.textContent = `Lokasi: ${name}`;
                mapModal.style.display = 'flex';
                
                // Initialize map in modal
                setTimeout(() => {
                    const modalMap = L.map('modalMap').setView([-6.2088, 106.8456], 13);
                    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(modalMap);
                    
                    // Add marker for the selected location
                    L.marker([-6.2088, 106.8456])
                        .addTo(modalMap)
                        .bindPopup(`<strong>${name}</strong><br>ID: ${id}`)
                        .openPopup();
                }, 100);
            });
        });
        
        closeBtn.addEventListener('click', function() {
            mapModal.style.display = 'none';
        });
        
        window.addEventListener('click', function(event) {
            if (event.target === mapModal) {
                mapModal.style.display = 'none';
            }
        });
    </script>
</body>
</html>