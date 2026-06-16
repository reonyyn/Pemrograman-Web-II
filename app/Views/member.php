<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member - Sistem Perpustakaan</title>

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
        <h2>📋 Daftar Member</h2>

        <a href="<?= base_url('member/form') ?>" class="btn-add">
            + Tambah Member
        </a>
    </div>

    <?php if(session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <?php if(!empty($members)) : ?>
        <table>
            <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>

            <?php $no=1; foreach($members as $member): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($member['nama']) ?></td>
                <td><?= esc($member['email']) ?></td>
                <td><?= esc($member['no_telp']) ?></td>
                <td><?= esc($member['alamat']) ?></td>
                <td><?= date('d/m/Y', strtotime($member['tanggal_daftar'])) ?></td>
                <td>
    <div class="action-buttons">
        <a href="<?= base_url('member/form/'.$member['id_member']) ?>"
            class="btn-edit"> Edit </a>

        <a href="<?= base_url('member/delete/'.$member['id_member']) ?>"
            class="btn-delete"
            onclick="return confirm('Yakin hapus?')"> Hapus </a>
        </div>
    </td>
</tr>
            <?php endforeach; ?>

            </tbody>
        </table>

        <?php else: ?>
            <div class="empty-state">
                Tidak ada data member
            </div>
        <?php endif; ?>

    </div>

    <a href="<?= base_url('dashboard') ?>" class="btn-back">
        ⬅ Back to Home
    </a>

</div>

</body>
</html>