<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Temukan Penjual LPG Terdekat' }}</title>

    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
</head>

<body>
    @include('layouts.header')

    <section class="hero" id="Home">
        <div class="hero-content">
            <h2>Selamat Datang Di FGas</h2>
            <p>Cari lokasi penjual LPG terdekat terlebih dahulu sebelum berangkat menjemput LPG.</p>
            <div class="hero-buttons" style="margin-top:16px;">
                <button id="findLocationBtn" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Find Location
                </button>
            </div>
        </div>
    </section>

    <div id="loadingOverlay">
        <div class="spinner"></div>
        <div id="loadingText">Mendeteksi lokasi Anda... 🔍</div>
    </div>

    <section id="mapSection" aria-hidden="true">
        <div id="mapTitle">Lokasi Anda & Penjual LPG Terdekat</div>
        <div id="map" role="region" aria-label="Peta penjual LPG"></div>
    </section>

    @include('layouts.footer')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const findBtn = document.getElementById("findLocationBtn");
            const mapSection = document.getElementById("mapSection");
            const loadingOverlay = document.getElementById("loadingOverlay");
            let map, userMarker, graph, sellersData;
            let distanceControl = null;
            let straightLineLayer = null;

            const greenIcon = new L.Icon({
                iconUrl: 'https://cdn-icons-png.flaticon.com/512/149/149059.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });

            // ----------------- EVENT FIND LOCATION -----------------
            findBtn.addEventListener("click", () => {
                if (!confirm("Aktifkan lokasi Anda untuk menemukan penjual LPG terdekat")) return;

                loadingOverlay.style.display = "flex";
                mapSection.style.display = "block";
                mapSection.setAttribute("aria-hidden", "false");

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showMap, showError, {
                        timeout: 15000,
                        enableHighAccuracy: true
                    });
                } else {
                    alert("Browser Anda tidak mendukung geolocation");
                }
            });

            // ------------------ HELPER FUNCTION ------------------
            function getDistance(lat1, lon1, lat2, lon2) {
                const R = 6371;
                const dLat = (lat2 - lat1) * Math.PI / 180;
                const dLon = (lon2 - lon1) * Math.PI / 180;
                const a =
                    Math.sin(dLat / 2) ** 2 +
                    Math.cos(lat1 * Math.PI / 180) *
                    Math.cos(lat2 * Math.PI / 180) *
                    Math.sin(dLon / 2) ** 2;
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }

            function buildGraphFromGeoJSON(geojson) {
                const graph = {};
                const features = geojson.features.filter(f => f.geometry.type === "LineString");

                features.forEach(feature => {
                    const coords = feature.geometry.coordinates;
                    for (let i = 0; i < coords.length - 1; i++) {
                        const [lon1, lat1] = coords[i];
                        const [lon2, lat2] = coords[i + 1];
                        const key1 = `${lat1},${lon1}`;
                        const key2 = `${lat2},${lon2}`;
                        const distance = getDistance(lat1, lon1, lat2, lon2);

                        if (!graph[key1]) graph[key1] = [];
                        if (!graph[key2]) graph[key2] = [];

                        graph[key1].push({
                            node: key2,
                            cost: distance
                        });
                        graph[key2].push({
                            node: key1,
                            cost: distance
                        });
                    }
                });
                return graph;
            }

            function findNearestNode(lat, lon, graph) {
                let nearest = null;
                let min = Infinity;
                for (const key in graph) {
                    const [nLat, nLon] = key.split(',').map(Number);
                    const dist = getDistance(lat, lon, nLat, nLon);
                    if (dist < min) {
                        min = dist;
                        nearest = key;
                    }
                }
                return nearest;
            }

            function aStarGraph(graph, startNode, goalNode) {
                const openSet = new Set([startNode]);
                const cameFrom = {};
                const gScore = {};
                const fScore = {};

                for (const node in graph) {
                    gScore[node] = Infinity;
                    fScore[node] = Infinity;
                }

                gScore[startNode] = 0;
                fScore[startNode] = getDistance(...startNode.split(',').map(Number), ...goalNode.split(',').map(
                    Number));

                //Memulai algoritma A* atau Loop pencarian jalur
                while (openSet.size > 0) {
                    let current = [...openSet].reduce((a, b) => fScore[a] < fScore[b] ? a : b);

                    if (current === goalNode) {
                        const path = [];
                        let temp = current;
                        while (temp in cameFrom) {
                            path.unshift(temp);
                            temp = cameFrom[temp];
                        }
                        path.unshift(startNode);
                        return path;
                    }

                    openSet.delete(current);

                    //caek rute apakah lebih baik atau lebih murah dan efisien
                    for (const neighbor of graph[current]) {
                        const tentative = gScore[current] + neighbor.cost;

                        //jika rute lebih baik, update jalur
                        if (tentative < gScore[neighbor.node]) {
                            cameFrom[neighbor.node] = current;
                            gScore[neighbor.node] = tentative;
                            fScore[neighbor.node] = tentative + getDistance(...neighbor.node.split(',').map(Number),
                                ...goalNode.split(',').map(Number));
                            openSet.add(neighbor.node);
                        }
                    }
                }
                return [];
            }

            // ------------------ DRAW ROUTE FUNCTION ------------------
            function redrawRoute(userLat, userLng) {
                map.eachLayer(layer => {
                    if (layer instanceof L.Polyline && !(layer instanceof L.TileLayer)) {
                        map.removeLayer(layer);
                    }
                });

                if (distanceControl) {
                    try {
                        map.removeControl(distanceControl);
                    } catch (e) {}
                    distanceControl = null;
                }

                const selectedType = document.getElementById('filterLpg')?.value || '';
                const cheapestMode = document.getElementById('cheapestMode')?.checked || false;

                const validSellers = (sellersData || []).filter(s => {
                    const hasStock = s.stok_lpg?.some(item =>
                        (!selectedType || item.jenis.toLowerCase() === selectedType.toLowerCase())
                    );
                    return isFinite(s.latitude) && isFinite(s.longitude) && hasStock;
                });

                if (validSellers.length === 0) {
                    alert("Tidak ada penjual dengan stok sesuai filter!");
                    return;
                }

                let targetSeller;

                // 🔹 kalau mode termurah aktif + jenis dipilih
                if (cheapestMode && selectedType) {
                    let minPrice = Infinity;
                    validSellers.forEach(s => {
                        const stok = s.stok_lpg.find(i => i.jenis.toLowerCase() === selectedType
                            .toLowerCase());
                        if (stok && stok.harga < minPrice) {
                            minPrice = stok.harga;
                            targetSeller = s;
                        }
                    });
                    if (!targetSeller) {
                        alert("⚠️ Tidak ditemukan penjual dengan harga untuk jenis itu.");
                        return;
                    }
                } else {
                    // 🔹 kalau filter dimatikan → balik ke penjual terdekat default
                    targetSeller = validSellers.reduce((a, b) =>
                        getDistance(userLat, userLng, a.latitude, a.longitude) <
                        getDistance(userLat, userLng, b.latitude, b.longitude) ? a : b
                    );
                }

                // lanjut ke pathfinding (nggak diubah)
                const start = findNearestNode(userLat, userLng, graph);
                const goal = findNearestNode(Number(targetSeller.latitude), Number(targetSeller.longitude), graph);
                if (!start || !goal) return;

                const path = aStarGraph(graph, start, goal);
                // 🔹 Tampilkan rute A*
                if (path.length > 1) {
                    const latlngs = path.map(p => p.split(',').map(Number));
                    L.polyline(latlngs, {
                        color: cheapestMode ? 'orange' : 'blue',
                        weight: 4
                    }).addTo(map);
                    map.fitBounds(latlngs);

                    const totalDistance = latlngs.reduce((acc, cur, i) => {
                        if (i === 0) return 0;
                        const [lat1, lng1] = latlngs[i - 1];
                        const [lat2, lng2] = cur;
                        return acc + getDistance(lat1, lng1, lat2, lng2);
                    }, 0);

                    const midPoint = latlngs[Math.floor(latlngs.length / 2)];
                    L.popup()
                        .setLatLng(midPoint)
                        .setContent(`
                            <b>Tujuan:</b> ${targetSeller.store_name ?? '-'}<br>
                            <b>${cheapestMode ? 'Harga termurah' : 'Penjual terdekat'}</b><br>
                            <b>Jarak Rute:</b> ${totalDistance.toFixed(2)} km
                        `)
                        .openOn(map);
                } else {
                    console.warn("⚠️ Jalur A* gagal, fallback garis lurus.");
                    L.polyline([
                        [userLat, userLng],
                        [targetSeller.latitude, targetSeller.longitude]
                    ], {
                        color: 'gray',
                        weight: 4,
                        dashArray: '6 6'
                    }).addTo(map);
                    map.fitBounds([
                        [userLat, userLng],
                        [targetSeller.latitude, targetSeller.longitude]
                    ]);
                }

                // 🔹 Garis lurus tambahan (popup seperti rute)
                const showStraight = document.getElementById('showStraightLine')?.checked || false;
                if (straightLineLayer) {
                    map.removeLayer(straightLineLayer);
                    straightLineLayer = null;
                }

                if (showStraight) {
                    const startPoint = [userLat, userLng];
                    const endPoint = [targetSeller.latitude, targetSeller.longitude];
                    const straightDist = getDistance(userLat, userLng, targetSeller.latitude, targetSeller
                        .longitude);

                    // gambar garis putus-putus
                    straightLineLayer = L.polyline([startPoint, endPoint], {
                        color: 'gray',
                        weight: 3,
                        dashArray: '6 6',
                        opacity: 0.8
                    }).addTo(map);

                    // titik tengah garis lurus
                    const midLat = (userLat + targetSeller.latitude) / 2;
                    const midLng = (userLng + targetSeller.longitude) / 2;

                    // popup gaya sama kayak popup rute
                    L.popup()
                        .setLatLng([midLat, midLng])
                        .setContent(`
                            <b>Garis Lurus:</b><br>
                            <b>Jarak:</b> ${straightDist.toFixed(2)} km
                        `)
                        .addTo(map);
                }
            }

            // ------------------ SHOW MAP ------------------
            function showMap(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                if (map) map.remove();
                map = L.map('map').setView([userLat, userLng], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap'
                }).addTo(map);

                // UI Filter + Toggle
                const filterContainer = L.control({
                    position: 'topright'
                });
                filterContainer.onAdd = function() {
                    const div = L.DomUtil.create('div', 'filter-box');
                    div.innerHTML = `
                    <div style="background:white; padding:8px 12px; border-radius:8px; box-shadow:0 2px 6px rgba(0,0,0,0.2); font-size:14px;">
                        <select id="filterLpg" style="margin-bottom:6px; width:100%; padding:4px;">
                            <option value="">-- Pilih Jenis LPG --</option>
                            <option value="3kg">LPG 3 kg</option>
                            <option value="5.5kg">LPG 5.5 kg</option>
                            <option value="12kg">LPG 12 kg</option>
                        </select>
                        <label style="display:flex; align-items:center; gap:6px; font-size:13px; cursor:pointer;">
                            <input type="checkbox" id="cheapestMode"/> Harga Termurah 💸
                        </label>
                        <label style="display:flex; align-items:center; gap:6px; font-size:13px; cursor:pointer; margin-top:4px;">
                            <input type="checkbox" id="showStraightLine"/> Tampilkan Garis Lurus 📏
                        </label>
                    </div>`;
                    return div;
                };
                filterContainer.addTo(map);

                userMarker = L.marker([userLat, userLng], {
                        draggable: true
                    })
                    .addTo(map)
                    .bindPopup("<b>Lokasi Anda</b>")
                    .openPopup();

                userMarker.on('dragend', e => {
                    const newPos = e.target.getLatLng();
                    redrawRoute(newPos.lat, newPos.lng);
                });

                Promise.all([
                        fetch('/storage/data/majene_highway.geojson').then(r => r.json()),
                        fetch('{{ route('data-findlpg') }}').then(r => r.json())
                    ])
                    .then(([geoData, sellers]) => {
                        sellersData = sellers;
                        graph = buildGraphFromGeoJSON(geoData);

                        L.geoJSON(geoData, {
                            filter: f => f.geometry.type === "LineString",
                            style: {
                                color: '#4ade80',
                                weight: 1
                            }
                        }).addTo(map);

                        sellers.forEach(s => {
                            const lat = Number(s.latitude);
                            const lng = Number(s.longitude);
                            if (!isFinite(lat) || !isFinite(lng)) return;

                            const stokList = (s.stok_lpg && s.stok_lpg.length > 0) ?
                                s.stok_lpg.map(item =>
                                    `<li>${item.jenis}: <b>${item.stok}</b> (${item.status})</li>`)
                                .join('') :
                                '<li><i>Tidak tersedia</i></li>';

                            const popupHTML = `
                            <div class="popup-content" style="font-size:14px; line-height:1.4;">
                                <b style="font-size:16px;">${s.store_name ?? '-'}</b><br>
                                <i class="fas fa-phone"></i> ${s.phone ?? '-'}<br>
                                <i class="fas fa-map-marker-alt"></i> ${s.address ?? 'Alamat tidak diketahui'}<br>
                                <hr style="margin:4px 0;">
                                <b>Stok LPG:</b>
                                <ul style="margin:4px 0; padding-left:16px;">${stokList}</ul>
                            </div>`;
                            L.marker([lat, lng], {
                                    icon: greenIcon
                                })
                                .addTo(map)
                                .bindPopup(popupHTML);
                        });

                        redrawRoute(userLat, userLng);
                        loadingOverlay.style.display = "none";

                        // event filter / toggle
                        document.getElementById('filterLpg').addEventListener('change', () => {
                            const pos = userMarker.getLatLng();
                            redrawRoute(pos.lat, pos.lng);
                        });
                        document.getElementById('cheapestMode').addEventListener('change', () => {
                            const pos = userMarker.getLatLng();
                            redrawRoute(pos.lat, pos.lng);
                        });
                        document.getElementById('showStraightLine').addEventListener('change', () => {
                            const pos = userMarker.getLatLng();
                            redrawRoute(pos.lat, pos.lng);
                        });
                    })
                    .catch(err => {
                        console.error('❌ Gagal memuat data:', err);
                        alert("Gagal memuat data jalan atau penjual.");
                        loadingOverlay.style.display = "none";
                    });
            }

            function showError(error) {
                loadingOverlay.style.display = "none";
                const msg = {
                    1: "Izin lokasi ditolak.",
                    2: "Informasi lokasi tidak tersedia.",
                    3: "Waktu permintaan lokasi habis.",
                } [error.code] || "Terjadi kesalahan tidak diketahui.";
                alert(msg);
            }
        });
    </script>

</body>

</html>
