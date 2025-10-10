{{-- <!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
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

        .overlay {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: #5e5e5e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            z-index: 1000;
            box-sizing: border-box;
        }

        .navbar a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .hero button {
            background-color: #888;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 20px;
        }

        button {
            margin-top: 20px;
            padding: 15px 40px;
            background-color: #444;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 32px;
            cursor: pointer;
        }

        button:hover {
            background-color: #666;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo"><strong><a href="/">FGas</a></strong></div>
        <div class="nav-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/profile">Profile</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <div class="overlay">
        <h1>Menemukan penjual LPG<br>sambil rebahan</h1>
        <button onclick="window.location.href='{{ url('mappencari') }}'">Find a Location</button>
    </div>
</body>

</html> --}}

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FGas - Menemukan penjual LPG sambil rebahan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FF7F00;
            --primary-dark: #E67200;
            --secondary: #2D5B7C;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --success: #28A745;
            --body-bg: #FFFFFF;
            --body-color: #212529;
            --card-bg: #FFFFFF;
            --header-bg: #FFFFFF;
            --footer-bg: #F8F9FA;
        }

        .dark-mode {
            --body-bg: #121212;
            --body-color: #E0E0E0;
            --card-bg: #1E1E1E;
            --header-bg: #1E1E1E;
            --footer-bg: #1E1E1E;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--body-bg);
            color: var(--body-color);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background-color: var(--header-bg);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            color: var(--primary);
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo span {
            color: var(--secondary);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 25px;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--body-color);
            font-weight: 500;
            position: relative;
            padding: 5px 0;
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }

        nav ul li a:hover:after {
            width: 100%;
        }

        .nav-buttons {
            display: flex;
            align-items: center;
        }

        .theme-toggle {
            background: none;
            border: none;
            color: var(--body-color);
            cursor: pointer;
            font-size: 1.2rem;
            margin-right: 15px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-login {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-login:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 2px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--body-color);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(45, 91, 124, 0.1) 100%);
            border-radius: 0 0 30px 30px;
            margin-bottom: 50px;
        }

        .hero-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .hero-text {
            flex: 1;
            padding-right: 30px;
        }

        .hero-text h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        .hero-image {
            flex: 1;
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Search Section */
        .search-section {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            margin-bottom: 50px;
        }

        .search-section h3 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--primary);
        }

        .search-form {
            display: flex;
            max-width: 700px;
            margin: 0 auto;
        }

        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--primary);
        }

        .search-btn {
            padding: 15px 25px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .search-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Features Section */
        .features {
            padding: 50px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--primary);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: var(--card-bg);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature-card h4 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-column h4 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            text-decoration: none;
            color: var(--body-color);
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            background-color: var(--primary-dark);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: var(--gray);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                flex-direction: column;
            }
            
            .hero-text {
                padding-right: 0;
                margin-bottom: 40px;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-wrap: wrap;
            }
            
            nav {
                order: 3;
                width: 100%;
                margin-top: 15px;
                display: none;
            }
            
            nav.active {
                display: block;
            }
            
            nav ul {
                flex-direction: column;
            }
            
            nav ul li {
                margin: 10px 0;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-input {
                border-radius: 50px;
                margin-bottom: 10px;
            }
            
            .search-btn {
                border-radius: 50px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1>F<span>Gas</span></h1>
                </div>
                
                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <i class="fas fa-bars"></i>
                </button>
                
                <nav id="mainNav">
                    <ul>
                        <li><a href="/about">ABOUT</a></li>
                        <li><a href="#">KONTAK</a></li>
                        <li><a href="/login">LOGIN</a></li>
                    </ul>
                </nav>
                
                <div class="nav-buttons">
                    <button class="theme-toggle" id="themeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    <a href="/login" class="btn btn-login">Login</a>
                </div>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Menemukan penjual LPG sambil rebahan</h2>
                    <p>Dapatkan LPG dengan mudah dan cepat tanpa harus keluar rumah. Pesan sekarang dan kami antar sampai depan pintu Anda.</p>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
                <div class="hero-image">
                    <img src="https://placehold.co/600x400/FF7F00/FFFFFF/png?text=FGas+LPG" alt="LPG Delivery">
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="search-section">
            <h3>Find a Location</h3>
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Masukkan lokasi Anda...">
                <button type="submit" class="search-btn">Cari</button>
            </form>
        </section>

        <section class="features">
            <h3 class="section-title">Mengapa Memilih FGas?</h3>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Pengiriman Cepat</h4>
                    <p>LPG diantar dalam waktu kurang dari 2 jam setelah pemesanan</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Terjamin Keamanannya</h4>
                    <p>Seluruh tabung LPG kami terjamin kualitas dan keamanannya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <h4>Harga Terjangkau</h4>
                    <p>Dapatkan LPG dengan harga terjangkau dan promo menarik</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h4>FGas</h4>
                    <p>Solusi terbaik untuk kebutuhan LPG Anda. Kami hadir untuk memudahkan Anda mendapatkan LPG tanpa repot.</p>
                </div>
                <div class="footer-column">
                    <h4>Link Cepat</h4>
                    <ul>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#">Pemesanan LPG</a></li>
                        <li><a href="#">Tracking Pesanan</a></li>
                        <li><a href="#">Bantuan</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Hubungi Kami</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> +62 21 1234 5678</li>
                        <li><i class="fas fa-envelope"></i> info@fgas.id</li>
                        <li><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</li>
                    </ul>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 FGas. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Toggle mobile menu
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mainNav').classList.toggle('active');
        });

        // Toggle dark mode
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = themeToggle.querySelector('i');
        
        themeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            
            if (document.body.classList.contains('dark-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        });

        // Simple animation on scroll
        const featureCards = document.querySelectorAll('.feature-card');
        
        function checkScroll() {
            featureCards.forEach(card => {
                const cardPosition = card.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (cardPosition < screenPosition) {
                    card.style.opacity = 1;
                    card.style.transform = 'translateY(0)';
                }
            });
        }
        
        // Initialize elements for animation
        featureCards.forEach(card => {
            card.style.opacity = 0;
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        });
        
        window.addEventListener('scroll', checkScroll);
        window.addEventListener('load', checkScroll);
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FGas - Temukan Penjual LPG Terdekat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00b327;
            --primary-dark: #017c11;
            --secondary: #212529;
            --light: #F8F9FA;
            --dark: #212529;
            --gray: #6C757D;
            --success: #28A745;
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
        }

        /* Header */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            color: var(--primary);
            font-size: 1.8rem;
            font-weight: 700;
        }

        .logo span {
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 25px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 2px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(255, 127, 0, 0.1) 0%, rgba(45, 91, 124, 0.1) 100%);
            padding: 80px 5%;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            color: var(--gray);
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-large {
            padding: 15px 30px;
            font-size: 1.1rem;
        }

        /* Features Section */
        .features {
            padding: 80px 5%;
            background-color: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h3 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background-color: var(--light);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature-card h4 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* How It Works */
        .how-it-works {
            padding: 80px 5%;
            background: linear-gradient(135deg, rgba(255, 127, 0, 0.05) 0%, rgba(45, 91, 124, 0.05) 100%);
        }

        .steps {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }

        .step {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            flex: 1;
            min-width: 250px;
            max-width: 350px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }

        /* Popular Sellers */
        .popular-sellers {
            padding: 80px 5%;
            background-color: white;
        }

        .sellers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .seller-card {
            background-color: var(--light);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .seller-card:hover {
            transform: translateY(-5px);
        }

        .seller-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .seller-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 15px;
        }

        .seller-info h4 {
            color: var(--dark);
            margin-bottom: 5px;
        }

        .seller-rating {
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .seller-details {
            margin-top: 15px;
        }

        .seller-detail {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: var(--gray);
        }

        .seller-detail i {
            margin-right: 10px;
            color: var(--primary);
        }

        /* CTA Section */
        .cta {
            padding: 80px 5%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
        }

        .cta h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .cta p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-light {
            background-color: white;
            color: var(--primary);
            border: 2px solid white;
        }

        .btn-light:hover {
            background-color: transparent;
            color: white;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 50px 5% 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto 30px;
        }

        .footer-column h4 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            transition: color 0.3s;
        }

        .footer-column ul li a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
            }
            
            .nav-buttons {
                width: 100%;
                justify-content: center;
            }
            
            .features-grid, .sellers-grid {
                grid-template-columns: 1fr;
            }
            
            .steps {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <h1>F<span>Gas</span></h1>
            </div>
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
            
            {{-- <ul class="nav-links">
                <li><a href="/">Home</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Cara Kerja</a></li>
                <li><a href="#">Kontak</a></li>
            </ul> --}}
            
            <div class="nav-buttons">
                <a href="/penjual/login" class="btn btn-outline">Login</a>
                <a href="/penjual/registrasi" class="btn btn-primary">Daftar</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Menemukan penjual LPG sambil rebahan</h2>
            <p>Cari lokasi penjual LPG terdekat terlebih dahulu sebelum berangkat menjemput LPG.</p>
            <div class="hero-buttons">
                <a href="#" class="btn btn-primary btn-large">
                    <i class="fas fa-map-marker-alt"></i> Find Lokasi Penjual
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="section-title">
            <h3>Mengapa Memilih FGas?</h3>
            <p>Kami menyediakan layanan terbaik untuk menemukan penjual LPG terdekat anda</p>
        </div>
        
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h4>Pencarian Lokasi Cepat</h4>
                <p>Dapat Menemukan Lokasi Penjual LPG Hanya dengan Mengaktifkan Lokasi anda</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Terjamin Keamanannya</h4>
                <p>Seluruh penjual LPG kami terjamin amanah dan kualitas LPG nya</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-wallet"></i>
                </div>
                <h4>Harga Terjangkau</h4>
                <p>Dapatkan LPG dengan harga terjangkau</p>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="section-title">
            <h3>Bagaimana Cara Kerjanya?</h3>
            <p>Hanya dalam 3 langkah mudah, LPG sampai di depan pintu Anda</p>
        </div>
        
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h4>Cari Penjual Terdekat</h4>
                <p>Temukan penjual LPG terdekat dengan lokasi Anda</p>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <h4>Aktifkan Lokasi Anda</h4>
                <p>Aktifkan lokasi anda ketika menekan find location</p>
            </div>
            
            <div class="step">
                <div class="step-number">3</div>
                <h4>Menuju Lokasi</h4>
                <p>Berangkat menuju lokasi penjual lpg terdekat</p>
            </div>
        </div>
    </section>

    <!-- Popular Sellers -->
    <section class="popular-sellers">
        <div class="section-title">
            <h3>Penjual Terpopuler</h3>
            <p>Penjual LPG terbaik dengan rating tertinggi</p>
        </div>
        
        <div class="sellers-grid">
            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">T</div>
                    <div class="seller-info">
                        <h4>Toko Sumber Rejeki</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.9 (142 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Merdeka No. 123, Jakarta Pusat</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 08.00-20.00</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0812-3456-7890</span>
                    </div>
                </div>
            </div>
            
            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">W</div>
                    <div class="seller-info">
                        <h4>Warung Bu Siti</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.8 (98 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Sudirman No. 45, Jakarta Selatan</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 07.00-21.00</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0813-4567-8901</span>
                    </div>
                </div>
            </div>
            
            <div class="seller-card">
                <div class="seller-header">
                    <div class="seller-avatar">A</div>
                    <div class="seller-info">
                        <h4>Agen LPG Sejahtera</h4>
                        <div class="seller-rating">
                            <i class="fas fa-star"></i>
                            <span>4.7 (87 ulasan)</span>
                        </div>
                    </div>
                </div>
                <div class="seller-details">
                    <div class="seller-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Thamrin No. 67, Jakarta Pusat</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-clock"></i>
                        <span>Buka 24 jam</span>
                    </div>
                    <div class="seller-detail">
                        <i class="fas fa-phone"></i>
                        <span>0811-2233-4455</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    {{-- <section class="cta">
        <h3>Temukan Penjual LPG Terdekat Sekarang</h3>
        <p>Jangan tunggu sampai kehabisan, pesan LPG Anda sekarang dan dapatkan pengiriman cepat ke lokasi Anda</p>
        <a href="map.html" class="btn btn-light btn-large">
            <i class="fas fa-map-marker-alt"></i> Find Lokasi Penjual
        </a>
    </section> --}}

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h4>FGas</h4>
                <p>Solusi terbaik untuk kebutuhan LPG Anda. Kami hadir untuk memudahkan Anda mendapatkan lokasi penjual LPG tanpa repot.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-x"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Kontak</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">Pemesanan LPG</a></li>
                    <li><a href="#">Tracking Pesanan</a></li>
                    <li><a href="#">Bantuan</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h4>Hubungi Kami</h4>
                <ul>
                    <li><i class="fas fa-phone"></i> +62 21 1234 5678</li>
                    <li><i class="fas fa-envelope"></i> info@fgas.id</li>
                    <li><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2023 FGas. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Simple mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>