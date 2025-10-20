<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Sistem Pencarian Penjual LPG' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

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


        // // Inisialisasi peta kosong tanpa setView dulu
        // const map = L.map('map');

        // // Tambahkan layer dari OpenStreetMap
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);

        // // Ambil data dari API penjual (pastikan route /api/penjual sudah aktif)
        // fetch('{{ route('data') }}')
        //     .then(response => response.json())
        //     .then(data => {
        //         const bounds = []; // untuk menyimpan semua titik marker

        //         data.forEach(seller => {
        //             if (seller.latitude && seller.longitude) {
        //                 // Buat marker
        //                 const marker = L.marker([
        //                     parseFloat(seller.latitude),
        //                     parseFloat(seller.longitude)
        //                 ]).addTo(map);

        //                 // Isi popup marker
        //                 marker.bindPopup(`
    //             <div style="min-width: 200px;">
    //                 <h4 style="color: #28a745; margin-bottom: 5px;">${seller.store_name}</h4>
    //                 <p style="margin: 0;"><i class="fas fa-user"></i> ${seller.name}</p>
    //                 <p style="margin: 0;"><i class="fas fa-phone"></i> ${seller.phone}</p>
    //                 <p style="margin: 0;"><i class="fas fa-map-marker-alt"></i> ${seller.address}</p>
    //                 <div style="margin-top: 10px;">
    //                     <button style="background-color: #28a745; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Edit</button>
    //                     <button style="background-color: #dc3545; color: white; border: none; border-radius: 5px; padding: 5px 10px; cursor: pointer;">Hapus</button>
    //                 </div>
    //             </div>
    //         `);

        //                 // Simpan titik marker ke bounds untuk perhitungan area tampilan
        //                 bounds.push([parseFloat(seller.latitude), parseFloat(seller.longitude)]);
        //             }
        //         });

        //         // Jika ada marker, peta akan menyesuaikan otomatis
        //         if (bounds.length > 0) {
        //             map.fitBounds(bounds, {
        //                 padding: [50, 50]
        //             });
        //         } else {
        //             // Jika belum ada data, fallback ke posisi default Majene
        //             map.setView([-3.5456, 118.9833], 12);
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Gagal memuat data penjual:', error);
        //         // fallback ke tampilan default jika API error
        //         map.setView([-3.5456, 118.9833], 12);
        //     });

        // Inisialisasi map
        // const map = L.map('map').setView([-3.5456, 118.9833], 18);

        // // Tambahkan peta dari OpenStreetMap
        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; OpenStreetMap contributors'
        // }).addTo(map);

        // // Ambil data penjual LPG dari backend
        // fetch('{{ route('data') }}')
        //     .then(response => response.json())
        //     .then(data => {
        //         data.forEach(seller => {
        //             if (seller.latitude && seller.longitude) {
        //                 const marker = L.marker([seller.latitude, seller.longitude])
        //                     .addTo(map)
        //                     .bindPopup(`
    //                 <div style="min-width: 220px;">
    //                     <h3 style="margin-bottom: 10px; color: var(--primary);">
    //                         ${seller.store_name}
    //                     </h3>
    //                     <p style="margin-bottom: 8px;">
    //                         <i class="fas fa-user" style="color: var(--primary);"></i> ${seller.name}
    //                     </p>
    //                     <p style="margin-bottom: 8px;">
    //                         <i class="fas fa-phone" style="color: var(--primary);"></i> ${seller.phone}
    //                     </p>
    //                     <p style="margin-bottom: 8px;">
    //                         <i class="fas fa-map-marker-alt" style="color: var(--primary);"></i> ${seller.address || 'Alamat tidak ditemukan'}
    //                     </p>
    //                     <div style="display: flex; gap: 10px; margin-top: 15px;">
    //                         <button style="padding: 8px 12px; background-color: var(--primary); color: white; border: none; border-radius: 5px; cursor: pointer;">
    //                             Edit
    //                         </button>
    //                         <button style="padding: 8px 12px; background-color: #DC3545; color: white; border: none; border-radius: 5px; cursor: pointer;">
    //                             Hapus
    //                         </button>
    //                     </div>
    //                 </div>
    //             `);
        //             }
        //         });
        //     })
        //     .catch(error => {
        //         console.error('Gagal memuat data penjual:', error);
        //     });

        // Add gas stations markers
        // const markers = [];
        // gasStations.forEach(station => {
        //     const marker = L.marker([station.lat, station.lng])
        //         .addTo(map)
        //         .bindPopup(`
    //             <div style="min-width: 200px;">
    //                 <h3 style="margin-bottom: 10px; color: var(--primary);">${station.name}</h3>
    //                 <p style="margin-bottom: 8px;"><i class="fas fa-map-marker-alt" style="color: var(--primary);"></i> ${station.address}</p>
    //                 <p style="margin-bottom: 8px;"><i class="fas fa-phone" style="color: var(--primary);"></i> ${station.phone}</p>
    //                 <p style="margin-bottom: 8px;">
    //                     <span class="status" style="display: inline-block; padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; font-weight: 500; background-color: ${station.status === 'active' ? 'rgba(40, 167, 69, 0.15)' : 'rgba(220, 53, 69, 0.15)'}; color: ${station.status === 'active' ? '#28A745' : '#DC3545'};">
    //                         ${station.status === 'active' ? 'Aktif' : 'Nonaktif'}
    //                     </span>
    //                 </p>
    //                 <div style="display: flex; gap: 10px; margin-top: 15px;">
    //                     <button style="padding: 8px 12px; background-color: var(--primary); color: white; border: none; border-radius: 5px; cursor: pointer;">Edit</button>
    //                     <button style="padding: 8px 12px; background-color: #DC3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Hapus</button>
    //                 </div>
    //             </div>
    //         `);

        //     markers.push(marker);
        // });

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
        document.querySelector('.logout-btn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                alert('Logout berhasil!');
                // In a real application, this would redirect to login page
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
    </script>
</body>

</html>
