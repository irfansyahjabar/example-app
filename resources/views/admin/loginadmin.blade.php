{{-- <!DOCTYPE html>
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
            <h2>Haloo Admin</h2>
            <h2>Selamat Datang Kembali</h2>
            <p>Masuk Untuk Mengelola Data Penjual LPG.</p>
        </div>
        
        <div class="right-panel">
            <h2>Masuk ke Akun Anda</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Alamat email Anda" required>
                    </div>
                    <div class="error" id="emailError">Format email tidak valid</div>
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
                    <div class="error" id="passwordError">Kata sandi harus diisi</div>
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
                    Penjual LPG? <a href="/penjual/login">Masuk disini</a>
                </div>
                
            </form>
            {{-- <form action="/admin/loginadmin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form> --}}
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
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
            if (!password.value.trim()) {
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordError.style.display = 'none';
            }
            
            if (isValid) {
                // Simulasi proses login (dalam aplikasi nyata, ini akan mengirim ke server)
                alert('Login berhasil! Anda akan diarahkan ke dashboard.');
                this.reset();

                // Reset form setelah 2 detik
                setTimeout(() => {
                    this.reset();
                    // Dalam aplikasi nyata, ini akan mengarahkan ke dashboard admin
                    window.location.href = '/admin/dashboardadmin';
                }, 2000);
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
    </script>
</body>
{{-- </html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - FGas</title>
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
            margin-bottom: 10px;
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

        .input-container {
            position: relative;
        }

        .input-container i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #00b327;
            font-size: 18px;
            z-index: 1;
        }

        .input-container input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-container input:focus {
            border-color: #00b327;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 179, 39, 0.2);
        }

        /* Validasi input */
        .input-container input:valid {
            border-color: #00b327;
        }

        .input-container input:invalid:not(:focus):not(:placeholder-shown) {
            border-color: #e63946;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
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
            z-index: 1;
        }

        .toggle-password:hover {
            color: #00b327;
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
            position: relative;
        }

        .btn-login:hover:not(:disabled) {
            background-color: #026b0e;
        }

        .btn-login:disabled {
            background-color: #7a9c7e;
            cursor: not-allowed;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .error {
            color: #e63946;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .error[role="alert"] {
            padding: 5px;
            border-radius: 3px;
        }

        .additional-links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            text-align: center
        }

        .forgot-password, .register-link {
            color: #666;
        }

        .forgot-password a, .register-link a {
            color: #00b327;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password a:hover, .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .additional-links {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }
    </style>
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

            <form action="{{ route('loginadmin.post') }}" method="POST" autocomplete="on" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Alamat email Anda" 
                               required autocomplete="email">
                    </div>
                    @error('email')
                        <div class="error" role="alert" aria-live="polite">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <div class="input-container">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" 
                               required autocomplete="current-password">
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