<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Penjual - FGas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00b327;
            --primary-dark: #017c11;
            --secondary: #2D5B7C;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --success: #28A745;
            --warning: #FFC107;
            --danger: #DC3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7f9;
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 30px 0;
            text-align: center;
            margin-bottom: 20px;
            border-radius: 0 0 15px 15px;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .logo span {
            color: white;
        }

        .header-content h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        /* Navigation */
        .breadcrumb {
            background: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            font-size: 0.9rem;
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        /* Profile Container */
        .profile-container {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .profile-container {
                grid-template-columns: 1fr;
            }
        }

        /* Profile Sidebar */
        .profile-sidebar {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            text-align: center;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 15px;
            border: 4px solid white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .profile-info h2 {
            color: var(--dark);
            margin-bottom: 5px;
            font-size: 1.3rem;
        }

        .profile-info .role {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin: 20px 0;
        }

        .stat-item {
            text-align: center;
            padding: 10px;
            background: var(--light);
            border-radius: 8px;
        }

        .stat-number {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--gray);
        }

        /* Profile Content */
        .profile-content {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Profile Sections */
        .profile-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light);
        }

        .section-header h3 {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.2rem;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            min-width: 120px;
            justify-content: center;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
            width: 100%;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background: #c82333;
        }

        /* Navigation Buttons */
        .nav-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        .nav-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            background: var(--light);
            border-radius: 8px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .nav-btn:hover {
            background: white;
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .nav-btn i {
            color: var(--primary);
            font-size: 1.2rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 179, 39, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .required::after {
            content: " *";
            color: var(--danger);
        }

        .form-help {
            font-size: 0.8rem;
            color: var(--gray);
            margin-top: 4px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 25px;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px 0;
            color: var(--gray);
            margin-top: 30px;
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                min-width: auto;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .profile-section {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">F<span>Gas</span></div>
            <div class="header-content">
                <h1><i class="fas fa-user-circle"></i> Profile Penjual</h1>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="/penjual/dashboardpenjuallpg"><i class="fas fa-home"></i> Dashboard</a> 
            > <span>Profile</span>
        </div>

        <!-- Profile Container -->
        <div class="profile-container">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-avatar">
                    T
                </div>
                <div class="profile-info">
                    <h2>Toko Sumber Rejeki</h2>
                    <div class="role">Penjual LPG</div>
                    <p style="color: var(--gray); font-size: 0.9rem; margin-bottom: 15px;">
                        <i class="fas fa-map-marker-alt"></i> Jakarta Pusat
                    </p>
                </div>

                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">245</div>
                        <div class="stat-label">Total Stok</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4</div>
                        <div class="stat-label">Jenis LPG</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">28</div>
                        <div class="stat-label">Pesanan/Bln</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4.8</div>
                        <div class="stat-label">Rating</div>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="nav-buttons">
                    <a href="/penjual/stoklpg" class="nav-btn">
                        <i class="fas fa-boxes"></i>
                        <span>Kelola Stok LPG</span>
                    </a>
                </div>

                <button class="btn btn-danger" id="logoutBtn">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Ganti Password Section -->
                <div class="profile-section">
                    <div class="section-header">
                        <h3><i class="fas fa-key"></i> Ganti Password</h3>
                    </div>

                    <form id="passwordForm">
                        <div class="form-group">
                            <label for="currentPassword" class="required">Password Saat Ini</label>
                            <input type="password" id="currentPassword" required>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="newPassword" class="required">Password Baru</label>
                                <input type="password" id="newPassword" required>
                                <div class="form-help">Minimal 8 karakter</div>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword" class="required">Konfirmasi Password</label>
                                <input type="password" id="confirmPassword" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Ganti Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2023 FGas - Sistem Manajemen Penjual LPG</p>
        </div>
    </footer>

    <script>
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