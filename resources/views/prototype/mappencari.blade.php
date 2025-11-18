<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Peta Lokasi Penjual LPG</title>
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

<body class="min-h-screen bg-[#3BC400] bg-opacity-90">

  <!-- Navbar -->
  <header class="bg-gray-800 text-white flex items-center justify-between px-4 py-3">
    <div class="text-xl font-bold">FGas</div>
    <button onclick="toggleSidebar()" class="text-white text-2xl block">
      <i class="fas fa-bars"></i>
    </button>
  </header>

  <!-- Sidebar -->
  <aside id="sidebar"
    class="bg-gray-700 text-white w-64 fixed h-full top-0 left-0 transform -translate-x-full transition-transform duration-300 z-50">
    <div class="p-6">
      <h1 class="text-3xl font-bold mb-8">FGas</h1>
      <ul class="space-y-4">
        <li><a href="/dashboardpencari" class="flex items-center space-x-3"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
        <li><a href="/daftarlokasi" class="flex items-center space-x-3"><i class="fas fa-map-pin"></i><span>Daftar Lokasi</span></a></li>
        <li><a href="/mapadmin" class="flex items-center space-x-3"><i class="fas fa-map"></i><span>Map</span></a></li>
        <li><a href="/" class="flex items-center space-x-3"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a></li>
      </ul>
    </div>
  </aside>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="toggleSidebar()"></div>

  <!-- Konten Utama -->
  <main class="p-6 space-y-6">

    <!-- Form Pencarian -->
    <form method="POST" action="/simpan-lokasi"
      class="bg-white bg-opacity-30 backdrop-blur-md p-6 rounded-lg shadow-md text-white max-w-2xl mx-auto">
      @csrf
      <input id="lokasiInput" name="lokasi" type="text" placeholder="Masukan Lokasi..."
        class="w-full p-2 rounded text-black mb-4" required>
      <input type="hidden" name="lat" id="latInput">
      <input type="hidden" name="lng" id="lngInput">
      <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-800 font-bold">
        Simpan Lokasi
      </button>
    </form>

    <!-- Peta -->
    <div id="map" class="w-full h-[500px] rounded-lg shadow-lg"></div>
  </main>

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

  <script>
    const penjualLPG = [
      { nama: "Toko A", lat: -6.200000, lng: 106.816666 },
      { nama: "Toko B", lat: -6.201000, lng: 106.817000 }
    ];
  </script>

  <script>
    let map;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: -6.2, lng: 106.8 },
        zoom: 13,
      });

      tampilkanPenjual(map);
      lokasiSaya(map);
    }

    function tampilkanPenjual(map) {
      penjualLPG.forEach(p => {
        new google.maps.Marker({
          position: { lat: p.lat, lng: p.lng },
          map,
          title: p.nama
        });
      });
    }

    function lokasiSaya(map) {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          position => {
            const userPos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            map.setCenter(userPos);
            new google.maps.Marker({
              position: userPos,
              map,
              title: "Lokasi Saya",
              icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            });

            document.getElementById('latInput').value = userPos.lat;
            document.getElementById('lngInput').value = userPos.lng;
          },
          () => alert("Gagal mendapatkan lokasi.")
        );
      } else {
        alert("Browser tidak mendukung geolokasi.");
      }
    }
  </script>

  <!-- Ganti YOUR_API_KEY -->
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>

</body>

</html>
