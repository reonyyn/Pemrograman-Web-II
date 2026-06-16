<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $page_title ?? 'Tambah Member' ?></title>

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
                width: 100%;
                max-width: 490px;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, .2);
            }

            h1 {
                text-align: center;
                margin-bottom: 35px;
                color: #333;
                font-size: 26px;
            }

            .form-group {
                margin-bottom: 22px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                color: #555;
                font-weight: 500;
                font-size: 15px;
            }

            input,
            textarea {
                width: 100%;
                padding: 12px;
                border: 2px solid #ddd;
                border-radius: 5px;
                font-size: 14px;
                transition: .3s;

                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            input:focus,
            textarea:focus {
                outline: none;
                border-color: #667eea;
            }

            textarea {
                resize: none;
            }

            .button-group {
                display: flex;
                gap: 10px;
                margin-top: 28px;
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
                text-decoration: none;
                text-align: center;
            }

            .btn-submit {
                background: #667eea;
                color: white;
            }

            .btn-submit:hover {
                background: #5568d3;
            }

            .btn-cancel {
                background: #ddd;
                color: #333;
            }

            .btn-cancel:hover {
                background: #ccc;
            }

            .alert {
                padding: 12px;
                margin-bottom: 20px;
                border-radius: 5px;
            }

            .alert-error {
                background: #f8d7da;
                color: #721c24;
            }

            .alert-success {
                background: #d4edda;
                color: #155724;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1><?= $page_title ?? 'Tambah Member'; ?></h1>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-error">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('member/save') ?>" method="post">
                <input type="hidden" name="id_member" value="<?= $member['id_member'] ?? '' ?>">
                <div class="form-group">
                    <label>Nama Lengkap *</label>
                    <input type="text" name="nama" required value="<?= $member['nama'] ?? '' ?>">
                </div>

                <div class="form-group">
                    <label>Email *</label>
                    <input type="email" name="email" required value="<?= $member['email'] ?? '' ?>">
                </div>

                <div class="form-group">
                    <label>No. Telepon *</label>
                    <input type="text" name="no_telp" required value="<?= $member['no_telp'] ?? '' ?>">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="4"><?= $member['alamat'] ?? '' ?></textarea>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-submit">
                        <?= isset($member) ? 'Update' : 'Tambah' ?>
                    </button>
                    <a href="<?= base_url('member') ?>" class="btn btn-cancel">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </body>
</html>