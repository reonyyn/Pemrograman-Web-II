<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku - Sistem Perpustakaan</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:#f5f5f5;
            color:#333;
        }

        .navbar{
            background:linear-gradient(135deg,#667eea 0%, #764ba2 100%);
            color:white;
            padding:20px 0;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-content{
            max-width:1200px;
            margin:0 auto;
            padding:0 20px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .navbar h1{
            font-size:28px;
        }

        .nav-links{
            display:flex;
            gap:15px;
        }

        .nav-links a{
            color:white;
            text-decoration:none;
            padding:8px 15px;
            border-radius:5px;
        }

        .container{
            max-width:1200px;
            margin:30px auto;
            padding:0 20px;
        }

        .header-section{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        h2{
            font-size:24px;
        }

        .btn-add{
            background:#667eea;
            color:white;
            text-decoration:none;
            padding:12px 25px;
            border-radius:5px;
            font-weight:600;
        }

        .table-responsive{
            background:white;
            border-radius:10px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            margin-bottom:25px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#f8f9fa;
            padding:15px;
            text-align:left;
            border-bottom:2px solid #ddd;
        }

        td{
            padding:15px;
            border-bottom:1px solid #ddd;
        }

        tr:hover{
            background:#f5f5f5;
        }

        .action-buttons{
            display:flex;
            gap:10px;
        }

        .btn-edit{
            background:#28a745;
            color:white;
            padding:8px 15px;
            border-radius:5px;
            text-decoration:none;
        }

        .btn-delete{
            background:#dc3545;
            color:white;
            padding:8px 15px;
            border-radius:5px;
            text-decoration:none;
        }

        .btn-back{
            display:inline-block;
            padding:12px 25px;
            background:#667eea;
            color:white;
            text-decoration:none;
            border-radius:5px;
            font-weight:600;
        }

        .alert{
            padding:15px;
            margin-bottom:20px;
            border-radius:5px;
        }

        .alert-success{
            background:#d4edda;
            color:#155724;
        }

        .empty-state{
            text-align:center;
            padding:40px;
            color:#999;
        }

        .stok-badge{
            padding:6px 12px;
            border-radius:4px;
            font-size:13px;
            font-weight:600;
            display:inline-block;
        }

        .stok-available{
            background:#d4edda;
            color:#155724;
        }

        .stok-low{
            background:#fff3cd;
            color:#856404;
        }

        .stok-empty{
            background:#f8d7da;
            color:#721c24;
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="navbar-content">
        <h1>📚 Sistem Perpustakaan</h1>

        <div class="nav-links">
            <a href="<?= base_url('member') ?>">Member</a>
            <a href="<?= base_url('buku') ?>">Buku</a>
            <a href="<?= base_url('peminjaman') ?>">Peminjaman</a>
            <a href="<?= base_url('logout') ?>">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="header-section">
        <h2>📖 Daftar Buku</h2>
        <a href="<?= base_url('buku/form') ?>" class="btn-add">
            + Tambah Buku
        </a>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">

        <?php if(!empty($buku_list)) : ?>

        <table>
            <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>ISBN</th>
                <th>Tahun Terbit</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

            <?php $no=1; foreach($buku_list as $buku): ?>
            <tr>

                <td><?= $no++ ?></td>
                <td><?= esc($buku['judul']) ?></td>
                <td><?= esc($buku['pengarang']) ?></td>
                <td><?= esc($buku['penerbit']) ?></td>
                <td><?= esc($buku['isbn']) ?></td>
                <td><?= esc($buku['tahun_terbit']) ?></td>
                <td>

                    <?php
                    $stok = $buku['jumlah_stok'];
                    if($stok == 0){
                        $class = 'stok-empty';
                    }
                    elseif($stok >= 1 && $stok <= 4){
                        $class = 'stok-low';
                    }
                    else{
                        $class = 'stok-available';
                    }
                    ?>

                    <span class="stok-badge <?= $class ?>">
                        <?= $stok ?> buku
                    </span>
                </td>

                <td>
                    <div class="action-buttons">
                        <a href="<?= base_url('buku/form/'.$buku['id_buku']) ?>"
                           class="btn-edit">
                           Edit
                        </a>
                        <a href="<?= base_url('buku/delete/'.$buku['id_buku']) ?>"
                           class="btn-delete"
                           onclick="return confirm('Yakin hapus?')">
                           Hapus
                        </a>
                    </div>
                </td>
            </tr>

            <?php endforeach; ?>

            </tbody>
        </table>

        <?php else: ?>
            <div class="empty-state">
                Tidak ada data buku
            </div>
        <?php endif; ?>

    </div>

    <a href="<?= base_url('dashboard') ?>" class="btn-back">
        ⬅ Back to Home
    </a>

</div>
</body>
</html>