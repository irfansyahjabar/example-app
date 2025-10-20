<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Temukan Penjual LPG Terdekat' }}</title>

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    @include('layouts.header')

    <!-- Hero Section -->
    <section class="hero" id="Home">
        <div class="hero-content">
            <h2>Menemukan penjual LPG sambil rebahan</h2>
            <p>Cari lokasi penjual LPG terdekat terlebih dahulu sebelum berangkat menjemput LPG.</p>
            <div class="hero-buttons">
                {{-- <a href="/findlpg" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Find Lokasi Penjual
                </a> --}}
                <button id="findLocationBtn" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Find Lokasi Penjual
                </button>
            </div>
            <!-- Div untuk menampung peta -->
            <div id="map" style="height: 200px; display: none;"></div>
        </div>


    </section>
    <!-- Footer -->
    @include('layouts.footer')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.getElementById("findLocationBtn").addEventListener("click", () => {
            // Tampilkan peta
            document.getElementById("map").style.display = "block";

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showMap, showError);
            } else {
                alert("Browser Anda tidak mendukung geolocation.");
            }
        });

        function showMap(position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            // Buat peta dan arahkan ke lokasi pengguna
            const map = L.map('map').setView([userLat, userLng], 15);

            // Tambahkan tile dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Marker lokasi pengguna
            const userMarker = L.marker([userLat, userLng]).addTo(map);
            userMarker.bindPopup("<b>Lokasi Anda</b>").openPopup();

            // Ambil data penjual LPG dari backend
            fetch('{{ route('data-findlpg') }}')
                .then(response => response.json())
                .then(data => {
                    data.forEach(penjual => {
                        const marker = L.marker([penjual.latitude, penjual.longitude], {
                            icon: greenIcon
                        }).addTo(map);
                        marker.bindPopup(`<b>${penjual.store_name}</b><br>${penjual.address}`);

                        // Simpan posisi penjual untuk perhitungan jarak
                        penjual.distance = getDistance(userLat, userLng, penjual.latitude, penjual.longitude);
                    });

                    // Cari penjual terdekat
                    const nearest = data.reduce((a, b) => (a.distance < b.distance ? a : b));
                    console.log("Penjual terdekat:", nearest);

                    // Gambar garis rute (sementara, sebelum A*)
                    L.polyline([
                        [userLat, userLng],
                        [nearest.latitude, nearest.longitude]
                    ], {
                        color: 'blue'
                    }).addTo(map);
                });
        }

        // Fungsi menghitung jarak antar dua koordinat (Haversine Formula)
        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // km
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Izin lokasi ditolak pengguna.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Informasi lokasi tidak tersedia.");
                    break;
                case error.TIMEOUT:
                    alert("Waktu permintaan lokasi habis.");
                    break;
                default:
                    alert("Terjadi kesalahan tidak diketahui.");
                    break;
            }
        }

        // Ikon hijau untuk penjual
        const greenIcon = new L.Icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149059.png',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });
    </script>

</body>

</html>
