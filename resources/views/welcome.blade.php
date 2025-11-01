<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Temukan Penjual LPG Terdekat' }}</title>

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Hero */
        .hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px 20px;
        }

        /* Map full-screen */
        #mapSection {
            display: none;
            width: 100%;
            height: 100vh;
            position: relative;
            padding: 0;
            margin: 0;
        }

        #map {
            height: 100%;
            width: 100%;
        }

        #mapTitle {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 18px;
            border-radius: 12px;
            font-weight: 700;
            z-index: 1000;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        /* Spinner / Loading overlay */
        #loadingOverlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.85);
            z-index: 9999;
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .spinner {
            border: 6px solid #e6e6e6;
            border-top: 6px solid #00b894;
            border-radius: 50%;
            width: 56px;
            height: 56px;
            animation: spin 1s linear infinite;
            margin-bottom: 12px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        #loadingText {
            font-weight: 600;
            color: #333;
        }

        .popup-content {
            font-size: 14px;
            line-height: 1.4;
        }

        .popup-content b { color: #007bff; }

        @media (max-width: 768px) {
            #mapTitle { width: 85%; font-size: 14px; }
            .hero { padding: 30px 12px; }
        }
    </style>
</head>

<body>
    @include('layouts.header')

    <!-- Hero Section -->
    <section class="hero" id="Home">
        <div class="hero-content">
            <h2>Menemukan penjual LPG sambil rebahan</h2>
            <p>Cari lokasi penjual LPG terdekat terlebih dahulu sebelum berangkat menjemput LPG.</p>
            <div class="hero-buttons" style="margin-top:16px;">
                <button id="findLocationBtn" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Temukan Penjual
                </button>
            </div>
        </div>
    </section>

    <!-- Loading Spinner -->
    <div id="loadingOverlay">
        <div class="spinner"></div>
        <div id="loadingText">Mendeteksi lokasi Anda... 🔍</div>
    </div>

    <!-- Fullscreen Map Section -->
    <section id="mapSection" aria-hidden="true">
        <div id="mapTitle">Lokasi Anda & Penjual LPG Terdekat</div>
        <div id="map" role="region" aria-label="Peta penjual LPG"></div>
    </section>

    @include('layouts.footer')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const findBtn = document.getElementById("findLocationBtn");
        const mapSection = document.getElementById("mapSection");
        const loadingOverlay = document.getElementById("loadingOverlay");
        let map;

        const greenIcon = new L.Icon({
            iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149059.png',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        findBtn.addEventListener("click", () => {
            const confirmLocation = confirm("Aktifkan lokasi Anda untuk menemukan penjual LPG terdekat");
            if (!confirmLocation) {
                alert("Aktifkan dulu lokasi kalau mau cari penjual terdekat ya!");
                return;
            }

            loadingOverlay.style.display = "flex";
            mapSection.style.display = "block";
            mapSection.setAttribute("aria-hidden", "false");
            mapSection.scrollIntoView({ behavior: "smooth" });

            setTimeout(() => {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showMap, showError, {
                        timeout: 15000,
                        enableHighAccuracy: true
                    });
                } else {
                    loadingOverlay.style.display = "none";
                    alert("Browser Anda tidak mendukung geolocation");
                }
            }, 300);
        });

        function showMap(position) {
            const userLat = Number(position.coords.latitude);
            const userLng = Number(position.coords.longitude);

            if (map) {
                map.remove();
            }

            map = L.map('map', { zoomControl: true }).setView([userLat, userLng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);

            const userMarker = L.marker([userLat, userLng]).addTo(map);
            userMarker.bindPopup("<b>Lokasi Anda</b>").openPopup();

            // Ambil data penjual dari backend
            fetch('{{ route('data-findlpg') }}')
                .then(res => res.json())
                .then(data => {
                    loadingOverlay.style.display = "none";

                    if (!Array.isArray(data) || data.length === 0) {
                        alert("Tidak ada data penjual ditemukan.");
                        return;
                    }

                    data.forEach(penjual => {
                        const lat = Number(penjual.latitude);
                        const lng = Number(penjual.longitude);
                        if (!isFinite(lat) || !isFinite(lng)) return;

                        const stokList = penjual.stok_lpg && penjual.stok_lpg.length > 0
                            ? penjual.stok_lpg.map(item => `${item.jenis}: ${item.stok}`).join('<br>')
                            : 'Tidak tersedia';

                        const popupHTML = `
                            <div class="popup-content">
                                <b>${penjual.store_name ?? '-'}</b><br>
                                <i class="fas fa-box"></i> ${stokList}<br>
                                <i class="fas fa-phone"></i> ${penjual.phone ?? '-'}<br>
                                <i class="fas fa-map-marker-alt"></i> ${penjual.address ?? 'Alamat tidak diketahui'}
                            </div>
                        `;

                        L.marker([lat, lng], { icon: greenIcon })
                            .addTo(map)
                            .bindPopup(popupHTML);

                        penjual.distance = getDistance(userLat, userLng, lat, lng);
                    });

                    // Temukan yang terdekat
                    const nearest = data.reduce((a, b) => (a.distance < b.distance ? a : b));
                    if (nearest && isFinite(nearest.latitude) && isFinite(nearest.longitude)) {
                        L.polyline([
                            [userLat, userLng],
                            [Number(nearest.latitude), Number(nearest.longitude)]
                        ], { color: 'blue', weight: 4, opacity: 0.7 }).addTo(map);

                        const bounds = L.latLngBounds([
                            [userLat, userLng],
                            [Number(nearest.latitude), Number(nearest.longitude)]
                        ]);
                        map.fitBounds(bounds, { padding: [50, 50] });
                    } else {
                        // Jika tidak ada nearest valid, fit ke semua marker secara general
                        try {
                            map.fitBounds(map.getBounds(), { padding: [40, 40] });
                        } catch (e) { /* ignore */ }
                    }
                })
                .catch(err => {
                    loadingOverlay.style.display = "none";
                    console.error('Gagal memuat data penjual:', err);
                    alert("Gagal memuat data penjual. Silakan coba lagi.");
                });
        }

        function getDistance(lat1, lon1, lat2, lon2) {
            const R = 6371;
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat / 2) ** 2 +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) ** 2;
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        function showError(error) {
            loadingOverlay.style.display = "none";
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Izin lokasi ditolak. Aktifkan dulu lokasinya, pren 🙏");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Informasi lokasi tidak tersedia");
                    break;
                case error.TIMEOUT:
                    alert("Waktu permintaan lokasi habis. Coba lagi.");
                    break;
                default:
                    alert("Terjadi kesalahan tidak diketahui");
                    break;
            }
            console.error('Geolocation error:', error);
        }
    </script>
</body>
</html>
