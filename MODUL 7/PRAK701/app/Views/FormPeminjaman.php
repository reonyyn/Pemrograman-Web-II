<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $page_title ?? 'Tambah Peminjaman' ?> - Sistem Perpustakaan</title>

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
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            .container {
                background: white;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
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

            input,
            select {
                width: 100%;
                padding: 12px;
                border: 2px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
                transition: border-color .3s;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            input:focus,
            select:focus {
                outline: none;
                border-color: #667eea;
            }

            .button-group {
                display: flex;
                gap: 10px;
                margin-top: 30px;
            }

            button,
            .btn {
                flex: 1;
                padding: 12px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                font-weight: 600;
                transition: all .3s;
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
                box-shadow: 0 5px 15px rgba(102, 126, 234, .4);
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

            .alert-success {
                background: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1><?= $page_title ?? 'Tambah Peminjaman' ?></h1>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('peminjaman/save') ?>" method="post">
                <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman'] ?? '' ?>">
                <div class="form-group">
                    <label> Nama Member *</label>

                    <select name="id_member" required>
                        <option value=""> Pilih Member </option>

                        <?php foreach ($members as $member): ?>
                            <option value="<?= $member['id_member'] ?>" <?= isset($peminjaman) && $peminjaman['id_member'] == $member['id_member'] ? 'selected' : '' ?>>
                                <?= esc($member['nama']) ?> (<?= esc($member['email']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label> Judul Buku *</label>
                    <select name="id_buku" required>
                        <option value=""> Pilih Buku </option>

                        <?php foreach ($buku_list as $buku): ?>
                            <option value="<?= $buku['id_buku'] ?>" <?= isset($peminjaman) && $peminjaman['id_buku'] == $buku['id_buku'] ? 'selected' : '' ?>>
                                <?= esc($buku['judul']) ?> (Stok: <?= $buku['jumlah_stok'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label> Tanggal Kembali *</label>
                    <input type="date" name="tanggal_kembali" required
                        value="<?= $peminjaman['tanggal_kembali'] ?? '' ?>">
                </div>

                <?php if (isset($peminjaman)): ?>
                    <div class="form-group">
                        <label> Status *</label>

                        <select name="status">
                            <option value="Dipinjam" <?= isset($peminjaman) && $peminjaman['status'] == 'Dipinjam' ? 'selected' : '' ?>>
                                Dipinjam
                            </option>
                            <option value="Dikembalikan" <?= isset($peminjaman) && $peminjaman['status'] == 'Dikembalikan' ? 'selected' : '' ?>>
                                Dikembalikan
                            </option>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="button-group">
                    <button type="submit" class="btn-submit">
                        <?= isset($peminjaman) ? 'Update' : 'Tambah' ?>
                    </button>

                    <a href="<?= base_url('peminjaman') ?>" class="btn btn-cancel"> Batal </a>
                </div>
            </form>
        </div>
    </body>
</html>