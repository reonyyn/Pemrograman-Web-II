<?php

require_once 'Model.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (Model::deleteMember($id)) {
        header('Location: Member.php?success=Member berhasil dihapus');
        exit;
    }
}

$members = Model::getMember();
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member - Sistem Perpustakaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
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
            margin: 30px auto;
            padding: 0 20px;
        }
        
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }
        
        h2 {
            font-size: 24px;
            color: #333;
        }
        
        .btn-add {
            background: #667eea;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            transition: all 0.3s;
            display: inline-block;
            font-weight: 600;
        }
        
        .btn-add:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .alert {
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .table-responsive {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f8f9fa;
            color: #333;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #ddd;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background: #f5f5f5;
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        
        .btn-edit, .btn-delete {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-edit {
            background: #28a745;
            color: white;
        }
        
        .btn-edit:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }
        
        .empty-state p {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
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
    
    <!-- Content -->
    <div class="container">
        <div class="header-section">
            <h2>📋 Daftar Member</h2>
            <a href="FormMember.php" class="btn-add">+ Tambah Member</a>
        </div>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
        <?php endif; ?>
        
        <div class="table-responsive">
            <?php if (count($members) > 0): ?>
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
                        <?php 
                        $no = 1;
                        foreach ($members as $member):
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $member['nama']; ?></td>
                                <td><?php echo $member['email']; ?></td>
                                <td><?php echo $member['no_telp']; ?></td>
                                <td><?php echo substr($member['alamat'], 0, 30); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($member['tanggal_daftar'])); ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="FormMember.php?edit=<?php echo $member['id_member']; ?>" class="btn-edit">Edit</a>
                                        <a href="Member.php?delete=<?php echo $member['id_member']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="empty-state">
                    <p>Tidak ada data member. <a href="FormMember.php" style="color: #667eea; text-decoration: none;">Tambah sekarang</a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>