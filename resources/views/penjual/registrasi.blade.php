{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - FGas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #00b327, #017c11);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .left-panel h2 {
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .left-panel p {
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .logo {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 5px;
        }
        
        .right-panel {
            flex: 1.5;
            padding: 40px;
        }
        
        .right-panel h2 {
            color: #01497c;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
            border-color: #2ca036;
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 125, 160, 0.2);
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .error {
            color: #e63946;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        .btn-register {
            width: 100%;
            padding: 14px;
            background-color:#017c11;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn-register:hover {
            background-color:#017c11;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .login-link a {
            color: #017c11;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel {
                padding: 30px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">FGas</div>
            <h2>Bergabunglah dengan Kami</h2>
            <p>Lakukan pendaftaran untuk mengakses layanan lengkap dari FGas.</p>
        </div>
        
        <div class="right-panel">
            <h2>Buat Akun Baru</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="store_name" placeholder="Nama Toko" value="{{ old('store_name') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" placeholder="Nomor Telepon" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" class="btn-register">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #00b327, #017c11);
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        
        .left-panel h2 {
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .left-panel p {
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .logo {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 5px;
        }
        
        .right-panel {
            flex: 1.5;
            padding: 40px;
        }
        
        .right-panel h2 {
            color: #2ca036;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
            border-color: #2ca036;
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 125, 160, 0.2);
        }
        
        .password-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .password-input-container input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .password-input-container input:focus {
            border-color: #2ca036;
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 125, 160, 0.2);
        }
        
        .toggle-password {
            position: absolute;
            right: 15px;
            color: #777;
            cursor: pointer;
            font-size: 18px;
            background: none;
            border: none;
            outline: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .toggle-password:hover {
            color: #017c11;
        }
        
        .form-row {
            display: flex;
            gap: 15px;
        }
        
        .form-row .form-group {
            flex: 1;
        }
        
        .error {
            color: #e63946;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        .password-info {
            color: #666;
            font-size: 13px;
            margin-top: 5px;
        }
        
        .btn-register {
            width: 100%;
            padding: 14px;
            background-color:#017c11;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        
        .btn-register:hover {
            background-color:#017c11;
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .login-link a {
            color: #017c11;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel {
                padding: 30px 20px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <div class="logo">FGas</div>
            <h2>Bergabunglah dengan Kami</h2>
            <p>Lakukan pendaftaran untuk mengakses layanan lengkap dari FGas.</p>
        </div>
        
        <div class="right-panel">
            <h2>Buat Akun Baru</h2>
            <form id="registerForm" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="name" placeholder="Nama" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <input type="text" name="store_name" id="store_name" placeholder="Nama Toko" value="{{ old('store_name') }}" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
                    <div class="error" id="emailError">Format email tidak valid</div>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder="Nomor Telepon" value="{{ old('phone') }}" required>
                </div>
                <div class="form-group">
                    <div class="password-input-container">
                        <input type="password" name="password" id="password" placeholder="Password" required minlength="8">
                        <button type="button" class="toggle-password" id="togglePassword">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-info">Kata sandi minimal 8 karakter</div>
                    <div class="error" id="passwordError">Kata sandi harus minimal 8 karakter</div>
                </div>
                <div class="form-group">
                    <div class="password-input-container">
                        <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Konfirmasi Password" required minlength="8">
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
                    Sudah punya akun? <a href="/penjual/login">Masuk di sini</a>
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
        
        document.addEventListener("DOMContentLoaded", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function (error) {
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