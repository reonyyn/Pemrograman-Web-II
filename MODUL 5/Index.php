<?php

require_once 'Model.php';

$total_members = count(Model::getMember());
$total_buku = count(Model::getBuku());
$total_peminjaman = count(Model::getPeminjaman());

$peminjaman_list = Model::getPeminjaman();
$peminjaman_aktif = 0;
$peminjaman_terlambat = 0;

$hari_ini = new DateTime();
foreach ($peminjaman_list as $pinjam) {
    if ($pinjam['status'] == 'Dipinjam') {
        $peminjaman_aktif++;
        $tgl_kembali = new DateTime($pinjam['tanggal_kembali']);
        if ($hari_ini > $tgl_kembali) {
            $peminjaman_terlambat++;
        }
    }
}
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Perpustakaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #8ca0f4 0%, #896da5 100%); 
            min-height: 100vh;
            color: #333;
        }
        
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar h1 {
            font-size: 28px;
        }
        
        .nav-links {
            display: flex;
            gap: 15px;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
        }
        
        .welcome {
            text-align: center;
            color: white; 
            margin-bottom: 50px;
        }
        
        .welcome h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }
        
        .welcome p {
            font-size: 18px;
            opacity: 0.9;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #666;
            font-size: 16px;
        }
        
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .module-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }
        
        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .module-header {
            padding: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }
        
        .module-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }
        
        .module-title {
            font-size: 24px;
            font-weight: 600;
        }
        
        .module-body {
            padding: 20px;
        }
        
        .module-desc {
            color: #666;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.6;
        }
        
        .module-btn {
            display: inline-block;
            background: #667eea;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .module-btn:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .alert-box {
            background: rgba(255, 255, 255, 0.22);
            border-left: 4px solid white;
            padding: 15px 20px;
            color: white;
            margin-top: 20px;
            border-radius: 5px;
        }
        
        @media (max-width: 768px) {
            .navbar h1 {
                font-size: 20px;
            }
            
            .welcome h1 {
                font-size: 28px;
            }
            
            .stats-grid, .modules-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-content">
            <h1>📚 Sistem Perpustakaan</h1>
            <div class="nav-links">
                <a href="Member.php">Member</a>
                <a href="Buku.php">Buku</a>
                <a href="Peminjaman.php">Peminjaman</a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="welcome">
            <h1>Selamat Datang! 👋</h1>
            <p>Sistem Manajemen Perpustakaan - Kelola Anggota, Koleksi Buku, dan Peminjaman dengan Mudah</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number"><?php echo $total_members; ?></div>
                <div class="stat-label">Total Member</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📖</div>
                <div class="stat-number"><?php echo $total_buku; ?></div>
                <div class="stat-label">Total Buku</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-number"><?php echo $peminjaman_aktif; ?></div>
                <div class="stat-label">Peminjaman Aktif</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">⚠️</div>
                <div class="stat-number"><?php echo $peminjaman_terlambat; ?></div>
                <div class="stat-label">Peminjaman Terlambat</div>
            </div>
        </div>
        
        <div class="modules-grid">
            <div class="module-card">
                <div class="module-header">
                    <div class="module-icon">👥</div>
                    <div class="module-title">Kelola Member</div>
                </div>
                <div class="module-body">
                    <p class="module-desc">Tambah, edit, lihat, dan hapus data anggota perpustakaan. Kelola informasi lengkap member termasuk nama, email, nomor telepon, dan alamat.</p>
                    <a href="Member.php" class="module-btn">Buka Module</a>
                </div>
            </div>
            
            <div class="module-card">
                <div class="module-header">
                    <div class="module-icon">📖</div>
                    <div class="module-title">Kelola Buku</div>
                </div>
                <div class="module-body">
                    <p class="module-desc">Kelola koleksi buku perpustakaan. Tambah buku baru, edit data buku, pantau stok ketersediaan, dan hapus buku dari koleksi.</p>
                    <a href="Buku.php" class="module-btn">Buka Module</a>
                </div>
            </div>
            
            <div class="module-card">
                <div class="module-header">
                    <div class="module-icon">📋</div>
                    <div class="module-title">Kelola Peminjaman</div>
                </div>
                <div class="module-body">
                    <p class="module-desc">Catat peminjaman buku oleh member, pantau tanggal pengembalian, tandai buku yang sudah dikembalikan, dan kelola history peminjaman.</p>
                    <a href="Peminjaman.php" class="module-btn">Buka Module</a>
                </div>
            </div>
        </div>
        
        <div class="alert-box">
            <strong>💡 Tips:</strong> Gunakan menu navigasi di atas untuk berpindah antar module. Setiap module memiliki fitur CRUD lengkap untuk mengelola data.
        </div>
    </div>
</body>
</html>
