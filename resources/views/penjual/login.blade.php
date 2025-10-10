{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FGas - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('/images/lpg.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100vh;
            color: white;
            text-align: center;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            color: white;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #6e6e6e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            box-sizing: border-box;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #3BC400;
            color: white;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #2fa000;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo"><strong><a href="/">FGas</a></strong></div>
        <div class="nav-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/profile">Profile</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <!-- Login form -->
    <div class="flex-grow flex items-center justify-center pt-32">
        <div class="px-8 py-10 rounded shadow-md w-full max-w-md" style="background-color: #6e6e6e;">
            <form id="loginForm" onsubmit="return validateLogin()">
                <div class="mb-4">
                    <label class="block text-white text-lg font-bold mb-2" for="username">
                        Username
                    </label>
                    <input class="w-full px-4 py-2 rounded text-black focus:outline-none" type="text" id="username"
                        name="username" placeholder="Masukan Username...">
                </div>
                <div class="mb-6">
                    <label class="block text-white text-lg font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="w-full px-4 py-2 rounded text-black focus:outline-none" type="password" id="password"
                        name="password" placeholder="Masukan Password...">
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="px-6 py-2 rounded font-bold">Login</button>
                </div>
                <p id="errorMsg" class="text-red-400 mt-4 hidden">Username atau Password salah!</p>
            </form>
        </div>
    </div>

    <!-- Script login -->
    <script>
        function validateLogin() {
            const user = document.getElementById("username").value.trim();
            const pass = document.getElementById("password").value.trim();
            const errorMsg = document.getElementById("errorMsg");

            // Cek admin login
            if (user === "admin" && pass === "admin123") {
                alert("Login berhasil sebagai admin!");
                window.location.href = "/dashboardadmin"; // Ganti sesuai halaman tujuan
                return false;
            } else {
                errorMsg.classList.remove("hidden");
                return false;
            }
        }
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FGas</title>
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
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .right-panel h2 {
            color: #00b327;
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
        
        .input-with-icon {
            position: relative;
        }
        
        .input-with-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #00b327;
            font-size: 18px;
        }
        
        .input-with-icon input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .input-with-icon input:focus {
            border-color: #00b327;
            outline: none;
            box-shadow: 0 0 0 2px rgba(44, 125, 160, 0.2);
        }
        
        .password-input-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        .password-input-container i.fa-lock {
            position: absolute;
            left: 15px;
            color: #00b327;
            font-size: 18px;
            z-index: 1;
        }
        
        .password-input-container input {
            width: 100%;
            padding: 12px 45px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .password-input-container input:focus {
            border-color: #00b327;
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
            color: #00b327;
        }
        
        .error {
            color: #e63946;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
        
        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #017c11;
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
        
        .btn-login:hover {
            background-color: #017c11;
        }
        
        .additional-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
        }
        
        .remember-me input {
            margin-right: 8px;
        }
        
        .forgot-password {
            color: #00b327;
            text-decoration: none;
            font-weight: 500;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
        }
        
        .register-link a {
            color: #00b327;
            text-decoration: none;
            font-weight: 500;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        
        .divider span {
            padding: 0 10px;
            color: #777;
            font-size: 14px;
        }
        
        .social-login {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: background-color 0.3s;
        }
        
        .social-btn:hover {
            background-color: #f9f9f9;
        }
        
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .left-panel {
                padding: 30px 20px;
            }
            
            .additional-options {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
    </style>
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
            <form action="{{ route('login') }}" method="POST">
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
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
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
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Ingat saya</label>
                    </div>
                    <a href="#" class="forgot-password">Lupa kata sandi?</a>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>
                
                <div class="register-link">
                    Belum punya akun? <a href="{{ route('register.form') }}">Daftar di sini</a>
                </div>
                
                <div class="register-link">
                    Admin? <a href="/admin/loginadmin">Masuk disini</a>
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