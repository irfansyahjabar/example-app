<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Penjual LPG</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
            border-radius: 10px;
            margin-top: 20px;
        }

        button {
            background-color: #16a34a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h2>Peta Sebaran Penjual LPG</h2>
    <button onclick="findLokasi()">Find Lokasi Penjual</button>
    <div id="map"></div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        let map;

        function findLokasi() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Browser Anda tidak mendukung geolokasi!");
            }
        }

        function showPosition(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            // Tampilkan peta di posisi pengguna
            map = L.map('map').setView([lat, lon], 14);

            // Tambahkan layer peta
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            // Marker posisi pengguna
            const userMarker = L.marker([lat, lon]).addTo(map);
            userMarker.bindPopup("<b>Lokasi Anda</b>").openPopup();

            // Ambil data penjual dari backend
            fetch('get_penjual.php')
                .then(response => response.json())
                .then(data => {
                    data.forEach(penjual => {
                        const marker = L.marker([penjual.latitude, penjual.longitude]).addTo(map);
                        marker.bindPopup(`
              <b>${penjual.nama_penjual}</b><br>
              ${penjual.alamat}<br>
              Status: ${penjual.status}
            `);
                    });
                })
                .catch(error => console.error(error));
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
                    alert("Permintaan lokasi melebihi waktu batas.");
                    break;
                default:
                    alert("Terjadi kesalahan yang tidak diketahui.");
            }
        }
    </script>

</body>

</html>
