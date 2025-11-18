{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FGas Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .sidebar {
      width: 250px;
      background-color: #2c3e50;
      color: white;
      transition: transform 0.3s ease;
    }
    .sidebar.hide {
      transform: translateX(-100%);
    }
    .sidebar h2 {
      text-align: center;
      padding: 1rem;
      background-color: #1a252f;
      margin: 0;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar ul li {
      padding: 15px 20px;
      border-bottom: 1px solid #34495e;
    }
    .sidebar ul li a {
      color: white;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .content {
      flex-grow: 1;
      background-color: #32cd32;
      padding: 1rem;
      position: relative;
    }
    .topbar {
      background-color: #444;
      color: white;
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .menu-toggle {
      font-size: 1.5rem;
      cursor: pointer;
    }
    .dashboard-buttons {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 2rem;
      gap: 2rem;
    }
    .dashboard-buttons a {
      background-color: #444;
      color: white;
      text-align: center;
      padding: 1rem;
      border-radius: 10px;
      width: 120px;
      text-decoration: none;
      transition: 0.2s;
    }
    .dashboard-buttons a:hover {
      background-color: #555;
    }
    .dashboard-buttons a i {
      display: block;
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar" id="sidebar">
      <h2>FGas</h2>
      <ul>
        <li><a href="/dashboardadmin"><i class="fas fa-home"></i>Dashboard</a></li>
        <li><a href="/penjuallpg"><i class="fas fa-user"></i>Penjual LPG</a></li>
        <li><a href="#"><i class="fas fa-key"></i>Password</a></li>
        <li><a href="#"><i class="fas fa-map-pin"></i>Daftar Lokasi</a></li>
        <li><a href="/mapadmin"><i class="fas fa-map"></i>Map</a></li>
        <li><a href="/logout"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
      </ul>
    </div>
    <div class="content">
      <div class="topbar">
        <span class="menu-toggle" onclick="toggleMenu()"><i class="fas fa-bars"></i></span>
        <h1>WELCOME</h1>
      </div>
      <div class="dashboard-buttons">
        <a href="/dashboardadmin"><i class="fas fa-home"></i>Dashboard</a>
        <a href="/penjuallpg"><i class="fas fa-user"></i>Penjual LPG</a>
        <a href="#"><i class="fas fa-key"></i>Password</a>
        <a href="#"><i class="fas fa-map-pin"></i>Daftar Lokasi</a>
        <a href="/mapadmin"><i class="fas fa-map"></i>Map</a>
        <a href="/login"><i class="fas fa-sign-out-alt"></i>Log Out</a>
      </div>
    </div>
  </div>

  <script>
    function toggleMenu() {
      document.getElementById('sidebar').classList.toggle('hide');
    }
  </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FGas Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      background-image: url('/images/lpg.png');
      background-size: cover;
      background-position: center;
    }
  </style>
</head>
<body class="min-h-screen bg-[#3BC400] bg-opacity-90 text-white">

  <!-- Navbar -->
  <div class="bg-gray-800 flex items-center justify-between p-4">
    <h1 class="text-2xl font-bold">FGas</h1>
    <button onclick="toggleSidebar()" class="text-white focus:outline-none">
      <i class="fas fa-bars text-2xl"></i>
    </button>
  </div>

  <!-- Sidebar -->
  <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-40">
    <h1 class="text-3xl font-bold mb-10">FGas</h1>
    <ul class="space-y-4">
      <li><a href="/dashboardadmin" class="flex items-center space-x-2"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
      <li><a href="/penjuallpg" class="flex items-center space-x-2"><i class="fas fa-user"></i><span>Penjual LPG</span></a></li>
      <li><a href="#" class="flex items-center space-x-2"><i class="fas fa-key"></i><span>Password</span></a></li>
      <li><a href="/daftarlokasiadmin" class="flex items-center space-x-2"><i class="fas fa-map-pin"></i><span>Daftar Lokasi</span></a></li>
      <li><a href="/mapadmin" class="flex items-center space-x-2"><i class="fas fa-map"></i><span>Map</span></a></li>
      <li><a href="/login" class="flex items-center space-x-2"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a></li>
    </ul>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30" onclick="toggleSidebar()"></div>

  <!-- Konten Utama -->
  <div id="mainContent" class="p-10 flex flex-col items-center transition-all duration-300">
    <div class="text-4xl font-bold text-center mb-6">WELCOME</div>

    <div class="dashboard-buttons flex flex-wrap justify-center gap-6">
      <a href="/dashboardadmin" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-home text-xl mb-2 block"></i>Dashboard
      </a>
      <a href="/penjuallpg" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-user text-xl mb-2 block"></i>Penjual LPG
      </a>
      <a href="#" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-key text-xl mb-2 block"></i>Password
      </a>
      <a href="/daftarlokasiadmin" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-map-pin text-xl mb-2 block"></i>Daftar Lokasi
      </a>
      <a href="/mapadmin" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-map text-xl mb-2 block"></i>Map
      </a>
      <a href="/login" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-4 rounded-lg text-center w-36">
        <i class="fas fa-sign-out-alt text-xl mb-2 block"></i>Log Out
      </a>
    </div>
  </div>

  <!-- Toggle Sidebar Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');

      if (sidebar.classList.contains('translate-x-0')) {
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
</html>
