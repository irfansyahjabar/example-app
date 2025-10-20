<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Temukan Penjual LPG Terdekat' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00b327;
            --primary-dark: #017c11;
            --secondary: #212529;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --success: #28A745;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7f9;
            color: var(--dark);
            line-height: 1.6;
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            color: var(--primary);
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo span {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 2px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(45, 91, 124, 0.1) 100%);
            padding: 80px 5%;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 15px 30px;
            font-size: 1.1rem;
        }

        /* Features Section */
        .features {
            padding: 80px 5%;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h3 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background-color: var(--light);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature-card h4 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* How It Works */
        .how-it-works {
            padding: 80px 5%;
            background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(45, 91, 124, 0.05) 100%);
        }

        .steps {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .step {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            flex: 1;
            min-width: 250px;
            max-width: 350px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        /* Popular Sellers */
        .popular-sellers {
            padding: 80px 5%;
            background-color: white;
        }

        .sellers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .seller-card {
            background-color: var(--light);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .seller-card:hover {
            transform: translateY(-5px);
        }

        .seller-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .seller-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 15px;
        }

        .seller-info h4 {
            color: var(--dark);
            margin-bottom: 5px;
        }

        .seller-rating {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .seller-details {
            margin-top: 15px;
        }

        .seller-detail {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--gray);
        }

        .seller-detail i {
            margin-right: 10px;
            color: var(--primary);
        }

        /* CTA Section */
        .cta {
            padding: 80px 5%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
        }

        .cta h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-light {
            background-color: white;
            color: var(--primary);
            border: 2px solid white;
        }

        .btn-light:hover {
            background-color: transparent;
            color: white;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 50px 5% 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto 30px;
        }

        .footer-column h4 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero h2 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }

            .nav-buttons {
                width: 100%;
                justify-content: center;
            }

            .features-grid,
            .sellers-grid {
                grid-template-columns: 1fr;
            }

            .steps {
                flex-direction: column;
                align-items: center;
            }
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

    <!-- Features Section -->
    <section class="features">
        <div class="section-title">
            <h3>Mengapa Memilih FGas?</h3>
            <p>Kami menyediakan layanan terbaik untuk menemukan penjual LPG terdekat anda</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h4>Pencarian Lokasi Cepat</h4>
                <p>Dapat Menemukan Lokasi Penjual LPG Hanya dengan Mengaktifkan Lokasi anda</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Terjamin Keamanannya</h4>
                <p>Seluruh penjual LPG kami terjamin amanah dan kualitas LPG nya</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <h4>Harga Terjangkau</h4>
                <p>Dapatkan LPG dengan harga terjangkau</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="section-title">
            <h3>Bagaimana Cara Kerjanya?</h3>
            <p>Hanya dalam 3 langkah mudah, LPG sampai di depan pintu Anda</p>
        </div>

        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h4>Cari Penjual Terdekat</h4>
                <p>Temukan penjual LPG terdekat dengan lokasi Anda</p>
            </div>

            <div class="step">
                <div class="step-number">2</div>
                <h4>Aktifkan Lokasi Anda</h4>
                <p>Aktifkan lokasi anda ketika menekan find location</p>
            </div>

            <div class="step">
                <div class="step-number">3</div>
                <h4>Menuju Lokasi</h4>
                <p>Berangkat menuju lokasi penjual lpg terdekat</p>
            </div>
        </div>
    </section>

    <!-- Popular Sellers -->
    <section class="popular-sellers">
        <div class="section-title">
            <h3>Penjual Terpopuler</h3>
            <p>Penjual LPG terbaik dengan rating tertinggi</p>
        </div>

        <div class="sellers-grid">
            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">T</div>
                    <div class="seller-info">
                        <h4>Toko Sumber Rejeki</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.9 (142 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Merdeka No. 123, Jakarta Pusat</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 08.00-20.00</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0812-3456-7890</span>
                    </div>
                </div>
            </div>

            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">W</div>
                    <div class="seller-info">
                        <h4>Warung Bu Siti</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8 (98 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Sudirman No. 45, Jakarta Selatan</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 07.00-21.00</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0813-4567-8901</span>
                    </div>
                </div>
            </div>

            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">A</div>
                    <div class="seller-info">
                        <h4>Agen LPG Sejahtera</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.7 (87 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Thamrin No. 67, Jakarta Pusat</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 24 jam</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0811-2233-4455</span>
                    </div>
                </div>
            </div>
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
