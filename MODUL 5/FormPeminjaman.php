<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Model.php';?>

<?php
require_once 'Model.php';

$edit_id = null;
$peminjaman = null;
$page_title = "Tambah Peminjaman";

$members = Model::getMember();
$buku_list = Model::getBuku();

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $peminjaman = Model::getPeminjamanById($edit_id);
    $page_title = "Edit Peminjaman";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    
    if ($edit_id) {
        $status = $_POST['status'];
        if (Model::updatePeminjaman($edit_id, $id_member, $id_buku, $tanggal_kembali, $status)) {
            header('Location: Peminjaman.php?success=Data peminjaman berhasil diupdate');
            exit;
        } else {
            $error = "Gagal mengupdate peminjaman";
        }
    } else {
        if (Model::insertPeminjaman($id_member, $id_buku, $tanggal_kembali)) {
            header('Location: Peminjaman.php?success=Peminjaman baru berhasil ditambahkan');
            exit;
        } else {
            $error = "Gagal menambahkan peminjaman";
        }
    }
}
?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Sistem Perpustakaan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        
        button, .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-submit {
            background: #667eea;
            color: white;
        }
        
        .btn-submit:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-cancel {
            background: #ddd;
            color: #333;
        }
        
        .btn-cancel:hover {
            background: #ccc;
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $page_title; ?></h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="id_member">Nama Member *</label>
                <select id="id_member" name="id_member" required>
                    <option value="">-- Pilih Member --</option>
                    <?php foreach ($members as $member): ?>
                        <option value="<?php echo $member['id_member']; ?>" 
                                <?php echo ($peminjaman && $peminjaman['id_member'] == $member['id_member']) ? 'selected' : ''; ?>>
                            <?php echo $member['nama']; ?> (<?php echo $member['email']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_buku">Judul Buku *</label>
                <select id="id_buku" name="id_buku" required>
                    <option value="">-- Pilih Buku --</option>
                    <?php foreach ($buku_list as $buku): ?>
                        <option value="<?php echo $buku['id_buku']; ?>" 
                                <?php echo ($peminjaman && $peminjaman['id_buku'] == $buku['id_buku']) ? 'selected' : ''; ?>>
                            <?php echo $buku['judul']; ?> (Stok: <?php echo $buku['jumlah_stok']; ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali *</label>
                <input type="date" id="tanggal_kembali" name="tanggal_kembali" required 
                       value="<?php echo $peminjaman ? $peminjaman['tanggal_kembali'] : ''; ?>">
            </div>
            
            <?php if ($edit_id): ?>
                <div class="form-group">
                    <label for="status">Status *</label>
                    <select id="status" name="status" required>
                        <option value="Dipinjam" <?php echo ($peminjaman['status'] == 'Dipinjam') ? 'selected' : ''; ?>>Dipinjam</option>
                        <option value="Dikembalikan" <?php echo ($peminjaman['status'] == 'Dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                    </select>
                </div>
            <?php endif; ?>
            
            <div class="button-group">
                <button type="submit" class="btn-submit"><?php echo $edit_id ? 'Update' : 'Tambah'; ?></button>
                <a href="Peminjaman.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>