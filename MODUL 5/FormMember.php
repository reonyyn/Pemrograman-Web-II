<?php
date_default_timezone_set('Asia/Makassar');

require_once 'Model.php';
?>

<?php
require_once 'Model.php';

$edit_id = null;
$member = null;
$page_title = "Tambah Member";

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $member = Model::getMemberById($edit_id);
    $page_title = "Edit Member";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    
    if ($edit_id) {
        if (Model::updateMember($edit_id, $nama, $email, $no_telp, $alamat)) {
            header('Location: Member.php?success=Data member berhasil diupdate');
            exit;
        } else {
            $error = "Gagal mengupdate member";
        }
    } else {
        if (Model::insertMember($nama, $email, $no_telp, $alamat)) {
            header('Location: Member.php?success=Member baru berhasil ditambahkan');
            exit;
        } else {
            $error = "Gagal menambahkan member";
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
        
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        textarea {
            resize: vertical;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
                <label for="nama">Nama Lengkap *</label>
                <input type="text" id="nama" name="nama" required 
                       value="<?php echo $member ? $member['nama'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required 
                       value="<?php echo $member ? $member['email'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="no_telp">No. Telepon *</label>
                <input type="text" id="no_telp" name="no_telp" required 
                       value="<?php echo $member ? $member['no_telp'] : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4"><?php echo $member ? $member['alamat'] : ''; ?></textarea>
            </div>
            
            <div class="button-group">
                <button type="submit" class="btn-submit"><?php echo $edit_id ? 'Update' : 'Tambah'; ?></button>
                <a href="Member.php" class="btn btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
