<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FGas</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">FGas</div>
            <h2>Selamat Datang Kembali</h2>
            <p>Masuk ke akun FGas Anda untuk mengakses data LPG anda.</p>
        </div>

        <div class="right-panel">
            <h2>Masuk ke Akun Anda</h2>
            <form action="{{ route('penjual.login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Alamat email Anda"
                            value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="password-input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                            required>
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="additional-options">
                    <div class="remember-me">
                        <div class="check-input">
                            <input type="checkbox" id="remember" name="remember">
                        </div>
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="#" class="forgot-password">Lupa kata sandi?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <div class="register-link">
                    Belum punya akun? <a href="{{ route('penjual.register.form') }}">Daftar di sini</a>
                </div>

                {{-- <div class="register-link">
                    Admin? <a href="{{ route('admin.login.form') }}">Masuk disini</a>
                </div> --}}
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
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
