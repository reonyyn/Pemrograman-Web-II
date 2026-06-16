<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($buku) ? 'Edit Buku' : 'Tambah Buku'; ?></title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
            background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .container{
            width:100%;
            max-width:550px;
            background:#fff;
            padding:40px;
            border-radius:10px;
            box-shadow:0 10px 25px rgba(0,0,0,.2);
        }

        h1{
            text-align:center;
            margin-bottom:30px;
            color:#333;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:#555;
        }

        input{
            width:100%;
            padding:12px;
            border:2px solid #ddd;
            border-radius:5px;
            font-size:14px;
        }

        input:focus{
            outline:none;
            border-color:#667eea;
        }

        .alert{
            padding:12px;
            margin-bottom:20px;
            border-radius:5px;
        }

        .alert-danger{
            background:#f8d7da;
            color:#721c24;
            border:1px solid #f5c6cb;
        }

        .button-group{
            display:flex;
            gap:10px;
            margin-top:25px;
        }

        .btn{
            flex:1;
            padding:12px;
            text-align:center;
            text-decoration:none;
            border:none;
            border-radius:5px;
            cursor:pointer;
            font-size:15px;
            font-weight:600;
        }

        .btn-submit{
            background:#667eea;
            color:white;
        }

        .btn-submit:hover{
            background:#5568d3;
        }

        .btn-cancel{
            background:#ddd;
            color:#333;
        }

        .btn-cancel:hover{
            background:#ccc;
        }

        ul{
            margin-left:20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>
        <?= isset($buku) ? 'Edit Buku' : 'Tambah Buku'; ?>
    </h1>

    <?php if(session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->getFlashdata('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post">

        <?= csrf_field(); ?>

        <div class="form-group">
            <label>Judul Buku *</label>
            <input type="text"
                   name="judul"
                   value="<?= old('judul', $buku['judul'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Pengarang *</label>
            <input type="text"
                   name="pengarang"
                   value="<?= old('pengarang', $buku['pengarang'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Penerbit *</label>
            <input type="text"
                   name="penerbit"
                   value="<?= old('penerbit', $buku['penerbit'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>ISBN</label>
            <input type="text"
                   name="isbn"
                   value="<?= old('isbn', $buku['isbn'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Tahun Terbit *</label>
            <input type="number"
                   name="tahun_terbit"
                   min="1801"
                   max="2024"
                   value="<?= old('tahun_terbit', $buku['tahun_terbit'] ?? '') ?>">
        </div>

        <div class="form-group">
            <label>Jumlah Stok *</label>
            <input type="number"
                   name="jumlah_stok"
                   min="0"
                   value="<?= old('jumlah_stok', $buku['jumlah_stok'] ?? '') ?>">
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-submit">
                <?= isset($buku) ? 'Update' : 'Tambah'; ?>
            </button>
            <a href="<?= base_url('buku'); ?>" class="btn btn-cancel">
                Batal
            </a>
        </div>

    </form>

</div>

</body>
</html>