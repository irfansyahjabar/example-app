<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Data Penjual LPG</title>
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
    <i class="fas fa-bars text-xl"></i> <!-- Hamburger icon -->
  </button>
</div>

<!-- Sidebar -->
<div id="sidebar"
     class="fixed top-0 left-0 h-full w-64 bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-40">
  <h1 class="text-3xl font-bold mb-10">FGas</h1>
  <ul class="space-y-4">
    <li>
      <a href="/dashboardadmin" class="flex items-center space-x-3">
        <i class="fas fa-home"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="/penjuallpg" class="flex items-center space-x-3">
        <i class="fas fa-store"></i>
        <span>Penjual LPG</span>
      </a>
    </li>
    <li>
      <a href="#" class="flex items-center space-x-3">
        <i class="fas fa-key"></i>
        <span>Password</span>
      </a>
    </li>
    <li>
      <a href="/daftarlokasi" class="flex items-center space-x-3">
        <i class="fas fa-map-pin"></i>
        <span>Daftar Lokasi</span>
      </a>
    </li>
    <li>
      <a href="/mapadmin" class="flex items-center space-x-3">
        <i class="fas fa-map"></i>
        <span>Map</span>
      </a>
    </li>
    <li>
      <a href="/login" class="flex items-center space-x-3">
        <i class="fas fa-sign-out-alt"></i>
        <span>Log Out</span>
      </a>
    </li>
  </ul>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-30" onclick="toggleSidebar()"></div>

<!-- Konten Form -->
<div id="mainContent" class="p-10 flex justify-center">
  <div class="bg-white bg-opacity-30 backdrop-blur-md p-8 rounded-lg shadow-md w-full max-w-md text-white">
    <form>
      <div class="mb-4">
        <label class="block font-semibold mb-1">Nama Toko:</label>
        <input type="text" placeholder="Masukkan Nama Toko"
               class="w-full p-2 rounded text-black focus:outline-none" />
      </div>
      <div class="mb-4">
        <label class="block font-semibold mb-1">Nama Penjual:</label>
        <input type="text" placeholder="Masukkan Nama Penjual"
               class="w-full p-2 rounded text-black focus:outline-none" />
      </div>
      <div class="mb-4">
        <label class="block font-semibold mb-1">Lokasi Toko:</label>
        <input type="text" placeholder="Masukkan Lokasi Toko"
               class="w-full p-2 rounded text-black focus:outline-none" />
      </div>
      <div class="mb-6">
        <label class="block font-semibold mb-1">No HP:</label>
        <input type="text" placeholder="Masukkan No HP"
               class="w-full p-2 rounded text-black focus:outline-none" />
      </div>
      <div class="text-right">
        <button type="submit"
                class="bg-[#3BC400] text-white px-5 py-2 rounded hover:bg-green-700 font-bold">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

<!-- JavaScript -->
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
</html>
