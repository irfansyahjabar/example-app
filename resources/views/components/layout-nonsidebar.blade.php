<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'FGas - Sistem Pencarian Penjual LPG' }}</title>
    <link rel="stylesheet" href="{{ asset('css/penjual.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    {{ $slot }}

    <x-footer />

    <script>
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

        // Form submissions
        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword.length < 8) {
                alert('Password baru harus minimal 8 karakter!');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('Konfirmasi password tidak cocok!');
                return;
            }

            if (confirm('Apakah Anda yakin ingin mengganti password?')) {
                alert('Password berhasil diganti!');
                this.reset();
            }
        });

        // Logout functionality
        document.getElementById('logoutBtn').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Redirect to login page
                window.location.href = '/penjual/login';
            }
        });

        // Password strength indicator (optional enhancement)
        document.getElementById('newPassword').addEventListener('input', function() {
            const password = this.value;
            const strength = calculatePasswordStrength(password);
            // You can add visual feedback for password strength here
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }
    </script>
</body>

</html>
