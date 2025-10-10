<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok LPG - FGas</title>
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
            padding: 40px 0;
            text-align: center;
            border-radius: 0 0 20px 20px;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .logo span {
            color: var(--secondary);
        }

        .header-content h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        /* Navigation */
        .breadcrumb {
            background: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .breadcrumb a {
            color: var(--primary);
            text-decoration: none;
        }

        .breadcrumb span {
            color: var(--gray);
        }

        /* Form Container */
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .form-header p {
            color: var(--gray);
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .required::after {
            content: " *";
            color: var(--danger);
        }

        .form-help {
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 5px;
        }

        /* Current Stock Info */
        .current-stock {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }

        .current-stock h3 {
            margin-bottom: 15px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .stock-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .stock-item {
            text-align: center;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .stock-item .type {
            font-weight: 600;
            color: var(--primary);
        }

        .stock-item .quantity {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--dark);
        }

        /* Button Styles */
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
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

        /* Footer */
        footer {
            text-align: center;
            padding: 30px 0;
            color: var(--gray);
            border-top: 1px solid #e0e0e0;
            margin-top: 50px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
            
            .stock-items {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .stock-items {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">F<span>Gas</span></div>
            <div class="header-content">
                <h1><i class="fas fa-gas-pump"></i> Tambah Stok LPG</h1>
                <p>Kelola stok LPG toko Anda dengan mudah</p>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ route('penjual.dashboardpenjuallpg') }}"><i class="fas fa-home"></i> Dashboard</a> 
            > <a href="{{ route('stoklpg.index') }}">Stok LPG</a> 
            > <span>Tambah Stok</span>
        </div>

        <!-- Current Stock Info -->
        <div class="current-stock">
            <h3><i class="fas fa-boxes"></i> Stok Saat Ini</h3>
            <div class="stock-items">
                @forelse($stok as $item)
                    <div class="stock-item">
                        <div class="type">LPG {{ $item->jenis }}</div>
                        <div class="quantity">{{ $item->stok }}</div>
                        <div class="unit">tabung</div>
                    </div>
                @empty
                    <p>Belum ada stok yang tercatat.</p>
                @endforelse
            </div>
        </div>

        <!-- Form Tambah Stok -->
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-plus-circle"></i> Form Tambah Stok</h2>
            </div>

            <form action="{{ route('stoklpg.store') }}" method="POST" id="addStockForm">
                @csrf
                <div class="form-group">
                    <label for="lpgType" class="required">Jenis LPG</label>
                    <select name="jenis" id="lpgType" required>
                        <option value="">Pilih Jenis LPG</option>
                        <option value="3kg">LPG 3kg</option>
                        <option value="5kg">LPG 5kg</option>
                        <option value="12kg">LPG 12kg</option>
                        <option value="50kg">LPG 50kg</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity" class="required">Jumlah Stok</label>
                    <input type="number" name="stok" id="quantity" min="1" max="1000" placeholder="Masukkan jumlah stok" required>
                </div>

                <div class="form-group">
                    <label for="sellingPrice" class="required">Harga Jual per Tabung</label>
                    <input type="number" name="harga" id="sellingPrice" min="1000" placeholder="Contoh: 20000" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Stok
                    </button>
                    <a href="{{ route('stoklpg.index') }}" class="btn btn-outline">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2023 FGas - Sistem Manajemen Stok LPG</p>
            <p>Need help? <a href="mailto:support@fgas.id" style="color: var(--primary);">support@fgas.id</a></p>
        </div>
    </footer>
</body>
</html>