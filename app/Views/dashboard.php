<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Perpustakaan</title>

    <link rel="stylesheet" href="<?= base_url('css/dashboard.css'); ?>">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-content">
            <h1>📚 Sistem Perpustakaan</h1>
            <div class="nav-links">
                <a href="<?= base_url('member'); ?>">Member</a>
                <a href="<?= base_url('buku'); ?>">Buku</a>
                <a href="<?= base_url('peminjaman'); ?>">Peminjaman</a>
                <a href="<?= base_url('logout'); ?>">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="welcome">
            <h1>Selamat Datang! 👋</h1>
            <p>
                Halo, Sistem Manajemen Perpustakaan - Kelola Anggota, Koleksi Buku, dan Peminjaman dengan Mudah
            </p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number"><?= $total_members ?? 0 ?></div>
                <div class="stat-label">Total Member</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📖</div>
                <div class="stat-number"><?= $total_buku ?? 0 ?></div>
                <div class="stat-label">Total Buku</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📋</div>
                <div class="stat-number"><?= $peminjaman_aktif ?? 0 ?></div>
                <div class="stat-label">Peminjaman Aktif</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">⚠️</div>
                <div class="stat-number"><?= $peminjaman_terlambat ?? 0 ?></div>
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
                    <p class="module-desc">
                    Tambah, edit, lihat, dan hapus data anggota perpustakaan.
                    Kelola informasi lengkap member: nama, email, nomor telepon, dan alamat.</p>

                    <a href="<?= base_url('member'); ?>" class="module-btn">
                        Buka Modul
                    </a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-header">
                    <div class="module-icon">📖</div>
                    <div class="module-title">Kelola Buku</div>
                </div>

                <div class="module-body">
                    <p class="module-desc">
                        Kelola koleksi buku perpustakaan. Tambah buku baru, edit data buku, pantau stok ketersediaan, dan hapus buku dari koleksi.
                    </p>

                    <a href="<?= base_url('buku'); ?>" class="module-btn">
                        Buka Modul
                    </a>
                </div>
            </div>

            <div class="module-card">
                <div class="module-header">
                    <div class="module-icon">📋</div>
                    <div class="module-title">Kelola Peminjaman</div>
                </div>

                <div class="module-body">
                    <p class="module-desc">
                        Catat peminjaman buku oleh member, pantau tanggal pengembalian, tandai buku yang sudah dikembalikan, dan kelola history peminjaman.
                    </p>

                    <a href="<?= base_url('peminjaman'); ?>" class="module-btn">
                        Buka Modul
                    </a>
                </div>
            </div>

        </div>

        <div class="alert-box">
            <strong>💡 Tips:</strong>
            Gunakan menu navigasi untuk mengelola data perpustakaan.
        </div>
    </div>
</body>
</html>