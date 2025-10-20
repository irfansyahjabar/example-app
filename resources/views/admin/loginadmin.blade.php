<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - FGas</title>
    <link rel="stylesheet" href="{{ asset('css/loginAdmin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">FGas</div>
            <h2>Haloo Admin</h2>
            <h2>Selamat Datang Kembali</h2>
            <p>Masuk Untuk Mengelola Data Penjual LPG.</p>
        </div>

        <div class="right-panel">
            <h2>Masuk ke Akun Anda</h2>

            <form action="{{ route('admin.login.post') }}" method="POST" autocomplete="on" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Alamat email Anda" required
                            autocomplete="email">
                    </div>
                    @error('email')
                        <div class="error" role="alert" aria-live="polite">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" required
                            autocomplete="current-password">
                        <button type="button" class="toggle-password" id="togglePassword"
                            aria-label="Toggle password visibility">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error" role="alert" aria-live="polite">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login" id="loginButton">
                    <i class="fas fa-sign-in-alt"></i>
                    <span id="loginText">Masuk</span>
                    <div class="loading-spinner" id="loadingSpinner"></div>
                </button>

                <div class="additional-links">
                    <div class="register-link">
                        Penjual LPG? <a href="/penjual/login">Masuk di sini</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
                this.setAttribute('aria-label', 'Sembunyikan kata sandi');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
                this.setAttribute('aria-label', 'Tampilkan kata sandi');
            }
        });

        // Form submission dengan loading state
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            const text = document.getElementById('loginText');
            const spinner = document.getElementById('loadingSpinner');

            // Validasi form sebelum submit
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!email || !password) {
                e.preventDefault();
                return;
            }

            // Tampilkan loading state
            button.disabled = true;
            text.textContent = 'Memproses...';
            spinner.style.display = 'block';

            // Simulasi timeout untuk mencegah spinner hilang terlalu cepat
            setTimeout(() => {
                button.disabled = false;
                text.textContent = 'Masuk';
                spinner.style.display = 'none';
            }, 3000);
        });

        // Validasi real-time untuk memberikan feedback langsung
        document.getElementById('email').addEventListener('blur', function() {
            validateEmail(this);
        });

        document.getElementById('password').addEventListener('blur', function() {
            validatePassword(this);
        });

        function validateEmail(input) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(input.value) && input.value !== '') {
                showError(input, 'Format email tidak valid');
            } else {
                clearError(input);
            }
        }

        function validatePassword(input) {
            if (input.value.length < 6 && input.value !== '') {
                showError(input, 'Kata sandi minimal 6 karakter');
            } else {
                clearError(input);
            }
        }

        function showError(input, message) {
            // Hapus error sebelumnya
            clearError(input);

            // Tambahkan class error ke input
            input.style.borderColor = '#e63946';

            // Buat elemen error
            const errorElement = document.createElement('div');
            errorElement.className = 'error';
            errorElement.textContent = message;
            errorElement.setAttribute('role', 'alert');

            // Sisipkan setelah input container
            input.parentNode.parentNode.appendChild(errorElement);
        }

        function clearError(input) {
            // Hapus border error
            input.style.borderColor = '';

            // Hapus elemen error jika ada
            const errorElement = input.parentNode.parentNode.querySelector('.error:not([role="alert"])');
            if (errorElement) {
                errorElement.remove();
            }
        }

        // Improved focus management untuk aksesibilitas
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
            });
        });
    </script>
</body>

</html>
