<?php

require_once 'Model.php';

$edit_id = null;
$buku = null;
$page_title = "Tambah Buku";

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $buku = Model::getBukuById($edit_id);
    $page_title = "Edit Buku";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $jumlah_stok = $_POST['jumlah_stok'];
    
    if ($edit_id) {
        if (Model::updateBuku($edit_id, $judul, $pengarang, $penerbit, $isbn, $tahun_terbit, $jumlah_stok)) {
            header('Location: Buku.php?success=Data buku berhasil diupdate');
            exit;
        } else {
            $error = "Gagal mengupdate buku";
        }
    } else {
        if (Model::insertBuku($judul, $pengarang, $penerbit, $isbn, $tahun_terbit, $jumlah_stok)) {
            header('Location: Buku.php?success=Buku baru berhasil ditambahkan');
            exit;
        } else {
            $error = "Gagal menambahkan buku";
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
        
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input:focus {
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
                <label for="judul">Judul Buku *</label>
                <input type="text" id="judul" name="judul" required 
                       value="<?php echo $buku ? $buku['judul'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="pengarang">Pengarang *</label>
                <input type="text" id="pengarang" name="pengarang" required 
                       value="<?php echo $buku ? $buku['pengarang'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="penerbit">Penerbit *</label>
                <input type="text" id="penerbit" name="penerbit" required 
                       value="<?php echo $buku ? $buku['penerbit'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" 
                       value="<?php echo $buku ? $buku['isbn'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit *</label>
                <input type="number" id="tahun_terbit" name="tahun_terbit" required 
                       value="<?php echo $buku ? $buku['tahun_terbit'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="jumlah_stok">Jumlah Stok *</label>
                <input type="number" id="jumlah_stok" name="jumlah_stok" required 
                       value="<?php echo $buku ? $buku['jumlah_stok'] : ''; ?>">
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn-submit"><?php echo $edit_id ? 'Update' : 'Tambah'; ?></button>
                <a href="Buku.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>