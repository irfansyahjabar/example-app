{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Penjual LPG</title>
  <script src="https://cdn.tailwindcss.com"></script>
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
      <!-- Hamburger Icon -->
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- Sidebar -->
  <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-40">
    <h1 class="text-3xl font-bold mb-10">FGas</h1>
    <ul class="space-y-4">
      <li><a href="/dashboardadmin" class="flex items-center space-x-2"><span>📊</span><span>Dashboard</span></a></li>
      <li><a href="/penjuallpg" class="flex items-center space-x-2"><span>🛒</span><span>Penjual LPG</span></a></li>
      <li><a href="#" class="flex items-center space-x-2"><span>🔒</span><span>Password</span></a></li>
      <li><a href="#" class="flex items-center space-x-2"><span>📍</span><span>Daftar Lokasi</span></a></li>
      <li><a href="/map" class="flex items-center space-x-2"><span>🗺️</span><span>Map</span></a></li>
      <li><a href="/login" class="flex items-center space-x-2"><span>🚪</span><span>Log Out</span></a></li>
    </ul>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30" onclick="toggleSidebar()"></div>

  <!-- Konten Utama -->
  <div id="mainContent" class="p-10 flex flex-col items-center transition-all duration-300">
    <div class="bg-white text-black w-full max-w-xl p-10 rounded shadow-md text-center mb-6">
      <p class="text-xl font-semibold">Tabel akun<br>penjual LPG</p>
    </div>

    <button onclick="window.location.href='{{ url('tambahpenjuallpg') }}'"
            class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-6 rounded">
      Tambah penjual LPG
    </button>
  </div>

  <!-- JavaScript untuk toggle -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('mainContent');

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
  <title>Daftar Penjual LPG</title>
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
      <li><a href="/dashboardadmin" class="flex items-center space-x-3"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
      <li><a href="/penjuallpg" class="flex items-center space-x-3"><i class="fas fa-user"></i><span>Penjual LPG</span></a></li>
      <li><a href="#" class="flex items-center space-x-3"><i class="fas fa-key"></i><span>Password</span></a></li>
      <li><a href="/daftarlokasiadmin" class="flex items-center space-x-3"><i class="fas fa-map-pin"></i><span>Daftar Lokasi</span></a></li>
      <li><a href="/mapadmin" class="flex items-center space-x-3"><i class="fas fa-map"></i><span>Map</span></a></li>
      <li><a href="/login" class="flex items-center space-x-3"><i class="fas fa-sign-out-alt"></i><span>Log Out</span></a></li>
    </ul>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30" onclick="toggleSidebar()"></div>

  <!-- Konten Utama -->
  <div id="mainContent" class="p-10 flex flex-col items-center transition-all duration-300">
    <div class="bg-white text-black w-full max-w-xl p-10 rounded shadow-md text-center mb-6">
      <p class="text-xl font-semibold">Tabel akun<br>penjual LPG</p>
    </div>

    <button onclick="window.location.href='{{ url('tambahpenjuallpg') }}'"
            class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-6 rounded">
      Tambah penjual LPG
    </button>
  </div>

  <!-- JavaScript untuk toggle -->
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
