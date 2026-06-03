<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FFF9F3;
            color: #333;
            overflow-x: hidden;
            position: relative;
        }
        
        .bg-glow-1 {
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(255, 97, 182, 0.2) 0%, rgba(255,255,255,0) 70%);
            top: -100px;
            left: -150px;
            z-index: -1;
            pointer-events: none;
        }
        .bg-glow-2 {
            position: absolute;
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(153, 197, 255, 0.25) 0%, rgba(255,255,255,0) 70%);
            top: 150px;
            right: -200px;
            z-index: -1;
            pointer-events: none;
        }

        .header-divider {
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FF61B6 0%, #FFA6D7 50%, #99C5FF 100%);
            border: none;
            margin: 0;
            padding: 0;
            box-shadow: 0 4px 15px rgba(255, 97, 182, 0.3);
            position: relative;
            z-index: 10;
        }

        .btn-pink {
            background-color: #FF61B6;
            color: white;
            border: none;
            font-weight: 700;
            padding: 12px 32px;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 24px rgba(255, 97, 182, 0.35);
        }
        .btn-pink:hover {
            background-color: #E04F9E;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(255, 97, 182, 0.45);
        }
        
        .badge-welcome {
            background-color: #accef9;
            color: #1435ed;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 8px 16px;
            border-radius: 50px;
            display: inline-block;
            box-shadow: 0 4px 12px rgba(255, 64, 163, 0.1);
        }
        
        .text-hero-title {
            font-size: 3.8rem;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1px;
        }
        
        .text-highlight-pink {
            color: #FF40A3;
            position: relative;
            display: inline-block;
        }
        .text-highlight-pink {
            color: #FF40A3;
        }
        
        .card-prodi {
            background: linear-gradient(135deg, #FFE1F2 0%, #FFD6ED 100%);
            border: 2px solid #FFA6D7;
            border-radius: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 64, 163, 0.08);
        }
        .card-nim {
            background: linear-gradient(135deg, #D2E7FF 0%, #C4DEFF 100%);
            border: 2px solid #99C5FF;
            border-radius: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(36, 87, 197, 0.08);
        }
        .card-prodi:hover, .card-nim:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .card-custom-info {
            border-radius: 20px;
            border: none;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            background-color: white;
            box-shadow: 0 15px 35px rgba(92, 29, 0, 0.06), 0 5px 15px rgba(0, 0, 0, 0.02);
        }
        .card-custom-info:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(92, 29, 0, 0.12), 0 10px 20px rgba(0, 0, 0, 0.04);
        }
        
        .bg-card-pink { background: linear-gradient(180deg, #FFF0FA 0%, #FFE6F6 100%); border: 2px solid #FFD6F0 !important; }
        .bg-card-blue { background: linear-gradient(180deg, #F0F6FF 0%, #E3EFFF 100%); border: 2px solid #D6E6FF !important; }
        .bg-card-orange { background: linear-gradient(180deg, #e7def9 0%, #e7def9 100%); border: 2px solid #FFE4D6 !important; }
        
        .image-wrapper {
            width: 100%;
            max-width: 440px;
            height: 380px;
            border-radius: 36px;
            overflow: hidden;
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 25px 55px rgba(0, 0, 0, 0.25), 0 10px 20px rgba(255, 64, 163, 0.1);
            border: 3px solid white;
        }
        .image-wrapper:hover {
            transform: scale(1.03) rotate(1deg);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.35), 0 15px 30px rgba(255, 64, 163, 0.25);
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: top center;
        }

        .custom-hr-thick {
            width: 120px;
            height: 6px;
            background: linear-gradient(90deg, #FF61B6, #FFA6D7);
            border: none;
            border-radius: 10px;
            margin: 0 auto 20px auto;
            box-shadow: 0 3px 10px rgba(255, 97, 182, 0.3);
        }
    </style>
</head>
<body>

    <div class="bg-glow-1"></div>
    <div class="bg-glow-2"></div>

    <?= view('Navbar'); ?>

    <div class="header-divider"></div>

    <div class="container pt-5 pb-5">
        <div class="row align-items-center gx-5 mx-auto" style="max-width: 1100px;">
            
            <div class="col-lg-6 order-2 order-lg-1 mt-4 mt-lg-0">
                <div class="badge-welcome mb-3 text-uppercase">Welcome Aboard</div>
                <h1 class="text-hero-title mb-3">Hi, I'm <br><span class="text-highlight-pink"><?= $nama; ?></span></h1>
                <p class="text-muted fs-6 lh-base mb-4" style="max-width: 480px; font-size: 1.05rem !important;">
                    Saya adalah mahasiswa yang antusias dalam bidang web development dan sangat bersemangat untuk belajar teknologi terbaru.
                </p>
                
                <div class="row g-3 mb-4" style="max-width: 480px;">
                    <div class="col-6">
                        <div class="card-prodi p-3">
                            <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">🎓 Program Studi</small>
                            <span class="fw-bold text-dark" style="font-size: 0.95rem;"><?= $prodi; ?></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card-nim p-3">
                            <small class="text-uppercase fw-bold text-muted d-block mb-1" style="font-size: 0.65rem; letter-spacing: 0.5px;">🆔 NIM</small>
                            <span class="fw-bold text-primary" style="color: #2457C5 !important; font-size: 0.95rem;"><?= $nim; ?></span>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-3 pt-2">
                    <a href="<?= base_url('/profil'); ?>" class="btn btn-pink px-4">Lihat Profil Lengkap</a>
                </div>
            </div>
            
            <div class="col-lg-6 text-center text-lg-end order-1 order-lg-2">
                <div class="image-wrapper">
                    <img src="<?= base_url('Aku2.jpeg'); ?>" alt="Foto Profil" class="profile-img">
                </div>
            </div>

        </div>
    </div>

    <div class="container py-5 mt-4">
        <div class="text-center mb-5">
            <div class="custom-hr-thick"></div>
            <h2 class="fw-bold" style="color: #5C1D00; letter-spacing: -0.5px;">Apa Yang Membuat Saya Unik</h2>
            <p class="text-muted">Kombinasi dari passion, skill, dan dedikasi</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4">
                <div class="card card-custom-info bg-card-pink h-100 p-4">
                    <div class="fs-2 mb-3">🎓</div>
                    <h5 class="fw-bold text-dark mb-2">Pendidikan</h5>
                    <p class="text-muted small lh-base mb-0">
                        Mahasiswa aktif yang terus belajar dan mengembangkan skill terkini di bidang teknologi informasi.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom-info bg-card-blue h-100 p-4">
                    <div class="fs-2 mb-3">💻</div>
                    <h5 class="fw-bold text-dark mb-2">Teknis</h5>
                    <p class="text-muted small lh-base mb-0">
                        Menguasai berbagai teknologi modern dan framework populer untuk pengembangan web profesional.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom-info bg-card-orange h-100 p-4">
                    <div class="fs-2 mb-3">🎨</div>
                    <h5 class="fw-bold text-dark mb-2">Inovatif</h5>
                    <p class="text-muted small lh-base mb-0">
                        Selalu mencari cara baru dan lebih baik untuk menyelesaikan masalah dengan kreativitas tinggi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>