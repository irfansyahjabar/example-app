<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - FGas</title>
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">FGas</div>
            <h2>Bergabunglah dengan Kami</h2>
            <p>Lakukan pendaftaran untuk mengakses layanan lengkap dari FGas.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="right-panel">
            <h2>Buat Akun Baru</h2>
            <form id="registerForm" action="{{ route('penjual.register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}"
                        required>
                </div>
                <div class="form-group">
                    <input type="text" name="store_name" id="store_name" placeholder="Nama Toko"
                        value="{{ old('store_name') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"
                        required>
                    <div class="error" id="emailError">Format email tidak valid</div>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder="Nomor Telepon"
                        value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <div class="password-input-container">
                        <input type="password" name="password" id="password" placeholder="Password" required
                            minlength="8">
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-info">Kata sandi minimal 8 karakter</div>
                    <div class="error" id="passwordError">Kata sandi harus minimal 8 karakter</div>
                </div>
                <div class="form-group">
                    <div class="password-input-container">
                        <input type="password" name="password_confirmation" id="confirmPassword"
                            placeholder="Konfirmasi Password" required minlength="8">
                        <button type="button" class="toggle-password" id="toggleConfirmPassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="error" id="confirmPasswordError">Konfirmasi kata sandi tidak cocok</div>
                </div>

                {{-- hiden input latitude dan longitude --}}
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                {{-- <div class="form-group">
                    <input type="text" name="latitude" id="latitude" placeholder="Latitude" value="{{ old('latitude') }}">
                </div>
                <div class="form-group">
                    <input type="text" name="longitude" id="longitude" placeholder="Longitude" value="{{ old('longitude') }}">
                </div> --}}
                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus"></i> Daftar
                </button>
                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('penjual.login.form') }}">Masuk di sini</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let isValid = true;

            // Validasi email
            const email = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email.value)) {
                emailError.style.display = 'block';
                isValid = false;
            } else {
                emailError.style.display = 'none';
            }

            // Validasi password
            const password = document.getElementById('password');
            const passwordError = document.getElementById('passwordError');
            if (password.value.length < 8) {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }

            // Validasi konfirmasi password
            const confirmPassword = document.getElementById('confirmPassword');
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            if (password.value !== confirmPassword.value) {
                confirmPasswordError.style.display = 'block';
                isValid = false;
            } else {
                confirmPasswordError.style.display = 'none';
            }

            if (isValid) {
                // Jika valid, submit form
                this.submit();
            }
        });

        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });

        // Toggle confirm password visibility
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const eyeIcon = this.querySelector('i');

            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                confirmPasswordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
        //untuk mendapatkan lokasi secara otomatis
        // navigator.geolocation.getCurrentPosition(function(position) {
        //     document.getElementById('latitude').value = position.coords.latitude;
        //     document.getElementById('longitude').value = position.coords.longitude;
        // });

        document.addEventListener("DOMContentLoaded", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function(error) {
                    console.error("Error getting location:", error);
                    alert("Tidak bisa mendapatkan lokasi, silakan aktifkan GPS.");
                });
            } else {
                alert("Browser tidak mendukung geolocation.");
            }
        });
    </script>
</body>

</html>
