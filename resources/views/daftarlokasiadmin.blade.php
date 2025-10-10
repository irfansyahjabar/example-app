<!DOCTYPE html>
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

</html>
