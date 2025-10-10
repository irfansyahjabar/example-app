<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>FGas Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-image: url('/images/lpg.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    /* Tambahan agar latar tidak terlalu mencolok */
    .bg-overlay {
      background-color: rgba(59, 196, 0, 0.9); /* setara dengan bg-[#3BC400] bg-opacity-90 */
    }
  </style>
</head>
<body class="min-h-screen bg-overlay text-white">

  <!-- Navbar -->
  <header class="bg-gray-800 flex justify-between items-center px-4 py-3 z-50 relative">
    <div class="text-2xl font-bold">FGas</div>
    <button onclick="toggleSidebar()" class="text-white text-xl">
      <i class="fas fa-bars"></i>
    </button>
  </header>

  <!-- Sidebar -->
  <aside id="sidebar"
         class="fixed top-0 left-0 w-64 h-full bg-gray-800 text-white p-6 transform -translate-x-full transition-transform duration-300 z-40">
    <h2 class="text-2xl font-bold mb-8">FGas</h2>
    <ul class="space-y-4">
      <li><a href="/dashboardpencari" class="flex items-center space-x-3"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
      <li><a href="#" class="flex items-center space-x-3"><i class="fas fa-map-pin"></i><span>Daftar Lokasi</span></a></li>
      <li><a href="/mappencari" class="flex items-center space-x-3"><i class="fas fa-map"></i><span>Map</span></a></li>
      <li><a href="/" class="flex items-center space-x-3"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a></li>
    </ul>
  </aside>

  <!-- Overlay -->
  <div id="overlay"
       class="fixed inset-0 bg-black bg-opacity-50 hidden z-30"
       onclick="toggleSidebar()">
  </div>

  <!-- Content -->
  <main class="flex flex-col items-center justify-center text-center mt-10 space-y-8 px-4">
    <h1 class="text-3xl font-bold">WELCOME</h1>
    <div class="flex flex-wrap justify-center gap-6">
      <a href="/dashboardpencari" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-6 w-32 flex flex-col items-center text-white">
        <i class="fas fa-home text-2xl mb-2"></i>
        <span>Dashboard</span>
      </a>
      <a href="/mappencari" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-6 w-32 flex flex-col items-center text-white">
        <i class="fas fa-map text-2xl mb-2"></i>
        <span>Map</span>
      </a>
      <a href="/daftarlokasi" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-6 w-32 flex flex-col items-center text-white">
        <i class="fas fa-folder text-2xl mb-2"></i>
        <span>Daftar lokasi</span>
      </a>
      <a href="/" class="bg-gray-700 hover:bg-gray-600 rounded-lg p-6 w-32 flex flex-col items-center text-white">
        <i class="fas fa-sign-out-alt text-2xl mb-2"></i>
        <span>Keluar</span>
      </a>
    </div>
  </main>

  <!-- JS Script -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');

      const isVisible = sidebar.classList.contains('translate-x-0');

      if (isVisible) {
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
