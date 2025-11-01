<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Temukan Penjual LPG Terdekat' }}</title>

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .map-section {
            padding: 20px;
            display: none;
            min-height: 100vh;
        }

        #map {
            height: 70vh;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .map-section {
                padding: 10px;
                min-height: 80vh;
            }

            #map {
                height: 60vh;
            }
        }

        @media (max-width: 480px) {
            #map {
                height: 50vh;
            }

            .map-section {
                min-height: 70vh;
            }
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #backToTopBtn {
            margin-top: 15px;
        }
    </style>
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
                <button id="findLocationBtn" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Temukan Penjual
                </button>
            </div>
        </div>
    </section>

    {{-- Map Section --}}
    <section class="map-section" id="mapSection">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">
                <i class="fas fa-map-marked-alt"></i> Peta Penjual LPG Terdekat
            </h2>
            <div id="map"></div>
            <div style="text-align: center; margin-top: 15px;">
                <button id="backToTopBtn" class="btn btn-secondary" style="display: none;">
                    <i class="fas fa-arrow-up"></i> Kembali ke Atas
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Fungsi untuk auto-scroll
        function smoothScrollTo(element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Fungsi untuk menyesuaikan tinggi peta berdasarkan layar
        function adjustMapHeight() {
            const map = document.getElementById('map');
            if (window.innerWidth <= 768) {
                map.style.height = '60vh';
            } else if (window.innerWidth <= 480) {
                map.style.height = '50vh';
            } else {
                map.style.height = '70vh';
            }

            if (window.map) {
                setTimeout(() => {
                    window.map.invalidateSize();
                }, 100);
            }
        }

        document.getElementById("findLocationBtn").addEventListener("click", function() {
            const btn = this;
            const originalText = btn.innerHTML;
            const mapSection = document.getElementById("mapSection");

            // Tampilkan loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';
            btn.disabled = true;

            // Tampilkan section peta
            mapSection.style.display = "block";

            // Auto-scroll ke bagian peta
            setTimeout(() => {
                smoothScrollTo(mapSection);
            }, 100);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        initializeMap(position);
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    },
                    function(error) {
                        handleGeolocationError(error);
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    }, {
                        timeout: 10000,
                        enableHighAccuracy: true
                    }
                );
            } else {
                alert("Browser Anda tidak mendukung geolocation.");
                btn.innerHTML = originalText;
                btn.disabled = false;
            }
        });

        function initializeMap(position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            // Sesuaikan tinggi peta
            adjustMapHeight();

            // Inisialisasi peta dengan view ke lokasi user
            window.map = L.map('map').setView([userLat, userLng], 14);

            // --- PILIHAN LAYER (Satelit, Jalan, dan Hybrid) ---
            const googleStreets = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: '&copy; <a href="https://www.google.com/maps">Google Maps</a>'
            });

            const googleSat = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: '&copy; <a href="https://www.google.com/maps">Google Satellite</a>'
            });

            const googleHybrid = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: '&copy; <a href="https://www.google.com/maps">Google Hybrid</a>'
            });

            // Tambahkan layer default (hybrid seperti di gambar)
            googleHybrid.addTo(window.map);

            // Tambahkan kontrol untuk ganti layer
            const baseMaps = {
                "Google Streets": googleStreets,
                "Google Satellite": googleSat,
                "Google Hybrid": googleHybrid
            };
            L.control.layers(baseMaps).addTo(window.map);

            // Tambahkan marker untuk lokasi pengguna
            const userMarker = L.marker([userLat, userLng]).addTo(window.map);
            userMarker.bindPopup(`
                <div style="min-width: 200px;">
                    <b>📍 Lokasi Anda</b><br>
                    <small>Anda berada di sini</small>
                </div>
            `).openPopup();

            // --- AMBIL DATA PENJUAL LPG DARI API ---
            fetch('{{ route('data-findlpg') }}')
                .then(response => response.json())
                .then(data => {
                    const bounds = [
                        [userLat, userLng]
                    ]; // Mulai dengan lokasi user

                    data.forEach(seller => {
                        if (seller.latitude && seller.longitude) {
                            const marker = L.marker([
                                parseFloat(seller.latitude),
                                parseFloat(seller.longitude)
                            ]).addTo(window.map);

                            // Popup dengan styling (disesuaikan untuk user biasa)
                            marker.bindPopup(`
                                <div style="min-width: 200px;">
                                    <h4 style="color: #28a745; margin-bottom: 10px;">${seller.store_name}</h4>
                                    <p style="margin-bottom: 8px;"><i class="fas fa-map-marker-alt" style="color: #28a745;"></i> ${seller.address}</p>
                                    ${seller.name ? `<p style="margin: 0px;"><i class="fas fa-user" style="color: #28a745;"></i> ${seller.name}</p>` : ''}
                                    ${seller.phone ? `<p style="margin: 0px;"><i class="fas fa-phone" style="color: #28a745;"></i> ${seller.phone}</p>` : ''}
                                    <div style="margin-top: 15px;">
                                        <button onclick="showRoute(${userLat}, ${userLng}, ${seller.latitude}, ${seller.longitude}, '${seller.store_name}')"
                                                style="padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; width: 100%;">
                                            <i class="fas fa-route"></i> Tampilkan Rute
                                        </button>
                                    </div>
                                </div>
                            `);

                            bounds.push([parseFloat(seller.latitude), parseFloat(seller.longitude)]);
                        }
                    });

                    // Zoom peta untuk menampilkan semua marker (user + penjual)
                    if (bounds.length > 0) {
                        window.map.fitBounds(bounds, {
                            padding: [50, 50]
                        });
                    }
                })
                .catch(error => {
                    console.error('Gagal memuat data penjual:', error);
                    alert('Gagal memuat data penjual LPG. Silakan coba lagi.');
                });
        }

        // Fungsi untuk menampilkan rute (placeholder untuk A*)
        window.showRoute = function(startLat, startLng, endLat, endLng, storeName) {
            // Hapus rute sebelumnya jika ada
            if (window.routeLine) {
                window.map.removeLayer(window.routeLine);
            }

            // Untuk sementara, gambar garis lurus
            window.routeLine = L.polyline([
                [startLat, startLng],
                [endLat, endLng]
            ], {
                color: 'blue',
                weight: 4,
                opacity: 0.7,
                dashArray: '10, 10'
            }).addTo(window.map);

            // Hitung jarak
            const distance = calculateDistance(startLat, startLng, endLat, endLng);

            // Focus ke rute
            window.map.fitBounds(window.routeLine.getBounds());

            alert(
                `Rute ke ${storeName}\nJarak: ${distance.toFixed(2)} km\n\nFitur rute detail akan diimplementasi dengan algoritma A*`
            );
        }

        // Fungsi menghitung jarak (Haversine formula)
        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius bumi dalam km
            const dLat = (lat2 - lat1) * Math.PI / 180;
            const dLon = (lon2 - lon1) * Math.PI / 180;
            const a =
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            return R * c;
        }

        function handleGeolocationError(error) {
            let message = "Terjadi kesalahan dalam mengambil lokasi: ";

            switch (error.code) {
                case error.PERMISSION_DENIED:
                    message += "Izin lokasi ditolak. Silakan izinkan akses lokasi di pengaturan browser Anda.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message += "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    message += "Waktu permintaan lokasi habis.";
                    break;
                default:
                    message += "Kesalahan tidak diketahui.";
                    break;
            }

            alert(message);
            console.error("Geolocation error:", error);
        }

        // Tombol kembali ke atas
        document.getElementById("backToTopBtn").addEventListener("click", function() {
            smoothScrollTo(document.getElementById("Home"));
        });

        // Tampilkan tombol kembali ke atas ketika di-scroll
        window.addEventListener('scroll', function() {
            const backToTopBtn = document.getElementById("backToTopBtn");
            const mapSection = document.getElementById("mapSection");

            if (window.scrollY > mapSection.offsetTop) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        // Adjust map height ketika window di-resize
        window.addEventListener('resize', adjustMapHeight);

        // Inisialisasi awal
        document.addEventListener('DOMContentLoaded', function() {
            adjustMapHeight();
        });
    </script>
</body>

</html>
