<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Sistem Pencarian Penjual LPG' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sellers.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

</head>

<body>


    <x-sidebar></x-sidebar>

    <div class="main-content">
        {{ $slot }}
    </div>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta tanpa posisi awal
        const map = L.map('map');

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

        // Tambahkan layer default (satelit)
        googleSat.addTo(map);

        // Tambahkan kontrol untuk ganti layer
        const baseMaps = {
            "Google Streets": googleStreets,
            "Google Satellite": googleSat,
            "Google Hybrid": googleHybrid
        };
        L.control.layers(baseMaps).addTo(map);

        // --- AMBIL DATA DARI API ---
        fetch('{{ route('data') }}')
            .then(response => response.json())
            .then(data => {
                const bounds = [];

                data.forEach(seller => {
                    if (seller.latitude && seller.longitude) {
                        const marker = L.marker([
                            parseFloat(seller.latitude),
                            parseFloat(seller.longitude)
                        ]).addTo(map);

                        // Popup dengan styling
                        marker.bindPopup(`
                        <div style="min-width: 200px;">
                            <h4 style="color: #28a745; margin-bottom: 10px; color: var(--primary);">${seller.store_name}</h4>
                            <p style="margin-bottom: 8px;"><i class="fas fa-map-marker-alt" style="color: var(--primary);"></i> ${seller.address}</p>
                            <p style="margin: 0px;"><i class="fas fa-user" style="color: var(--primary);"></i> ${seller.name}</p>
                            <p style="margin: 0px;"><i class="fas fa-phone" style="color: var(--primary);"></i> ${seller.phone}</p>
                            <div style="display: flex; gap: 10px; margin-top: 15px;">
                                <button style="padding: 8px 12px; background-color: var(--primary); color: white; border: none; border-radius: 5px; cursor: pointer;">Edit</button>
                                <button style="padding: 8px 12px; background-color: #DC3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Hapus</button>
                            </div>
                        </div>
                    `);

                        bounds.push([parseFloat(seller.latitude), parseFloat(seller.longitude)]);
                    }
                });

                if (bounds.length > 0) {
                    map.fitBounds(bounds, {
                        padding: [50, 50]
                    });
                } else {
                    // fallback ke posisi Majene
                    map.setView([-3.5456, 118.9833], 12);
                }
            })
            .catch(error => {
                console.error('Gagal memuat data penjual:', error);
                map.setView([-3.5456, 118.9833], 12);
            });

        // Filter functionality
        const areaFilter = document.getElementById('areaFilter');
        const statusFilter = document.getElementById('statusFilter');

        function filterMarkers() {
            const areaValue = areaFilter.value;
            const statusValue = statusFilter.value;

            markers.forEach((marker, index) => {
                const station = gasStations[index];
                const matchesArea = areaValue === '' || station.area === areaValue;
                const matchesStatus = statusValue === '' || station.status === statusValue;

                if (matchesArea && matchesStatus) {
                    map.addLayer(marker);
                } else {
                    map.removeLayer(marker);
                }
            });
        }

        areaFilter.addEventListener('change', filterMarkers);
        statusFilter.addEventListener('change', filterMarkers);

        // Search functionality
        const mapSearch = document.getElementById('mapSearch');

        mapSearch.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();

            markers.forEach((marker, index) => {
                const station = gasStations[index];
                const matchesSearch = station.name.toLowerCase().includes(searchText) ||
                    station.address.toLowerCase().includes(searchText);

                if (matchesSearch) {
                    map.addLayer(marker);
                } else {
                    map.removeLayer(marker);
                }
            });
        });

        // Simulate logout
        // document.querySelector('.logout-btn').addEventListener('click', function() {
        //     if (confirm('Apakah Anda yakin ingin logout?')) {
        //         alert('Logout berhasil!');
        //         // In a real application, this would redirect to login page
        //     }
        // });

        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');

            if (window.innerWidth < 992 &&
                !sidebar.contains(event.target) &&
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Toggle sidebar on mobile
        document.querySelector('.menu-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const menuToggle = document.querySelector('.menu-toggle');

            if (window.innerWidth < 992 &&
                !sidebar.contains(event.target) &&
                !menuToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Form validation
        document.getElementById('addSellerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const shopName = document.getElementById('shopName').value;
            const ownerName = document.getElementById('ownerName').value;
            const email = document.getElementById('email').value;
            const phoneNumber = document.getElementById('phoneNumber').value;
            const address = document.getElementById('address').value;
            const area = document.getElementById('area').value;
            const lpgTypes = document.getElementById('lpgTypes');
            const status = document.getElementById('status').value;

            // Validasi field wajib
            if (!shopName || !ownerName || !email || !phoneNumber || !address || !area || !status) {
                alert('Harap isi semua field yang wajib diisi!');
                return;
            }

            // Validasi pilihan jenis LPG
            const selectedLpgTypes = Array.from(lpgTypes.selectedOptions).map(option => option.value);
            if (selectedLpgTypes.length === 0) {
                alert('Harap pilih minimal satu jenis LPG yang dijual!');
                return;
            }

            // Validasi email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Format email tidak valid!');
                return;
            }

            // Validasi nomor telepon
            const phonePattern = /^[0-9+\-\s()]{10,}$/;
            if (!phonePattern.test(phoneNumber)) {
                alert('Format nomor telepon tidak valid!');
                return;
            }

            // Simulasi pengiriman data
            const formData = {
                shopName,
                ownerName,
                email,
                phoneNumber,
                address,
                area,
                lpgTypes: selectedLpgTypes,
                status,
                description: document.getElementById('shopDescription').value,
                latitude: document.getElementById('latitude').value,
                longitude: document.getElementById('longitude').value
            };

            console.log('Data yang akan dikirim:', formData);

            // Simpan data (dalam aplikasi nyata, ini akan mengirim data ke server)
            alert('Data penjual LPG berhasil disimpan!');

            // Reset form
            this.reset();
        });

        // Auto generate coordinates (simulasi)
        document.querySelector('.map-placeholder').addEventListener('click', function() {
            // Simulasi pemilihan lokasi di peta
            const randomLat = -6.1 + (Math.random() * 0.2);
            const randomLng = 106.7 + (Math.random() * 0.2);

            document.getElementById('latitude').value = randomLat.toFixed(6);
            document.getElementById('longitude').value = randomLng.toFixed(6);

            alert(
                'Lokasi telah dipilih secara acak. Dalam aplikasi nyata, Anda akan memilih lokasi di peta interaktif.'
            );
        });
    </script>

    {{-- Include Fungsi Sweetalert --}}
    @include('sweetalert::alert')
</body>

</html>
