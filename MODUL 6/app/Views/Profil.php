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

        .badge-profile {
            background-color: #cde0fe;
            color: #3a30f3;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 6px 16px;
            border-radius: 50px;
            display: inline-block;
        }
        .main-card {
            background-color: #ffffff;
            border-radius: 32px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.03);
            border: none;
            overflow: hidden;
        }
        .banner-bg {
            background-color: #FFAAD1;
            height: 140px;
        }
        .avatar-wrapper {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            border: 5px solid #ffffff;
            overflow: hidden;
            margin-top: -65px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
            display: inline-block;
        }
        .avatar-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .info-box {
            background-color: #D2E7FF;
            border: 2px solid #99C5FF;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(36, 87, 197, 0.06);
        }
        .badge-hobby {
            background-color: #FFD2EC;
            color: #D04494;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 50px;
            border: 1px solid #FFA6D7;
        }
        .progress {
            height: 8px;
            border-radius: 10px;
            background-color: #E9ECEF;
        }
        .progress-bar-green { background-color: #00D28A; }
        .progress-bar-orange { background-color: #FFA000; }
        
        .section-card {
            border-radius: 24px;
            padding: 24px;
            height: 100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
        }
        .bg-section-blue { 
            background-color: #CBE3FF; 
            border: 2px solid #99C5FF !important;
            box-shadow: 0 12px 30px rgba(36, 87, 197, 0.08);
        }
        .bg-section-pink { 
            background-color: #FFCBE7; 
            border: 2px solid #FFA6D7 !important;
            box-shadow: 0 12px 30px rgba(255, 64, 163, 0.08);
        }
        .inner-content-card {
            background-color: #ffffff;
            border-radius: 16px;
            padding: 16px;
            border: none;
            box-shadow: 0 8px 20px rgba(0,0,0,0.02);
        }
        .btn-back {
            background-color: #FF61B6;
            color: white;
            border: none;
            font-weight: 700;
            padding: 12px 32px;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 97, 182, 0.3);
        }
        .btn-back:hover {
            background-color: #E04F9E;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(255, 97, 182, 0.4);
        }
    </style>
</head>
<body>

    <?= view('Navbar'); ?>

    <div class="header-divider"></div>

    <div class="container py-5">
        <div class="text-center mb-5">
            <div class="badge-profile mb-2 text-uppercase">My Profile</div>
            <h1 class="fw-extrabold text-dark display-5 fw-bold">Profil <span style="color: #FF40A3;">Lengkap</span></h1>
            <p class="text-muted">Informasi detail tentang background, pengalaman, skill, dan sertifikasi saya</p>
        </div>

        <div class="mx-auto shadow-sm main-card mb-4" style="max-width: 800px;">
            <div class="banner-bg"></div>
            <div class="text-center px-4 pb-4">
                <div class="avatar-wrapper">
                    <img src="<?= base_url('Aku.jpeg'); ?>" alt="Avatar" class="avatar-img">
                </div>
                <h3 class="fw-bold mt-3 mb-1" style="color: #6d95f9;"><?= $nama; ?></h3>
                <span class="badge bg-light text-dark border fw-bold px-3 py-1.5 rounded-pill mb-2" style="color: #D04494 !important; background-color: #FFD2EC !important; border-color: #FFA6D7 !important;">NIM: <?= $nim; ?></span>
                <p class="text-muted small fw-bold mb-4"><?= $prodi; ?></p>

                <div class="info-box p-3 text-start mx-auto mb-4" style="max-width: 650px;">
                    <h6 class="fw-bold text-primary mb-3">📬 Kontak</h6>
                    <div class="row g-2 small">
                        <div class="col-sm-3 fw-bold text-secondary">Email:</div>
                        <div class="col-sm-9 text-dark">2410817120021@mhs.ulm.ac.id</div>
                        <div class="col-sm-3 fw-bold text-secondary">Instagram:</div>
                        <div class="col-sm-9 text-dark">@aulizhrr__</div>
                        <div class="col-sm-3 fw-bold text-secondary">Telepon:</div>
                        <div class="col-sm-9 text-dark">0888888888</div>
                        <div class="col-sm-3 fw-bold text-secondary">Alamat:</div>
                        <div class="col-sm-9 text-dark">Banjarmasin, Kalimantan Selatan</div>
                    </div>
                </div>

                <div class="text-start mx-auto mb-4" style="max-width: 650px;">
                    <h5 class="fw-bold mb-2" style="color: #5C1D00;">✨ Tentang Saya</h5>
                    <p class="text-muted small lh-base">
                        Saya adalah mahasiswa yang antusias dalam bidang web development dan sangat bersemangat untuk belajar teknologi terbaru, membangun aplikasi yang fungsional, serta menciptakan pengalaman pengguna yang interaktif.
                    </p>
                </div>

                <div class="text-start mx-auto mb-4" style="max-width: 650px;">
                    <h5 class="fw-bold mb-3" style="color: #5C1D00;">🎯 Hobi & Minat</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge-hobby">Singing</span>
                        <span class="badge-hobby">Traveling</span>
                        <span class="badge-hobby">Music</span>
                        <span class="badge-hobby">Desain Grafis</span>
                    </div>
                </div>

                <div class="text-start mx-auto" style="max-width: 650px;">
                    <h5 class="fw-bold mb-3" style="color: #5C1D00;">🛠️ Skill & Keahlian</h5>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="d-flex justify-content-between small fw-bold mb-1">
                                    <span>HTML & CSS</span>
                                    <span class="text-success">Advanced</span>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-green" style="width: 85%"></div></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="d-flex justify-content-between small fw-bold mb-1">
                                    <span>PHP</span>
                                    <span class="text-success">Advanced</span>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-green" style="width: 80%"></div></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="d-flex justify-content-between small fw-bold mb-1">
                                    <span>JavaScript</span>
                                    <span class="text-warning">Intermediate</span>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-orange" style="width: 65%"></div></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <div class="d-flex justify-content-between small fw-bold mb-1">
                                    <span>MySQL Database</span>
                                    <span class="text-success">Advanced</span>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-green" style="width: 75%"></div></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mx-auto row g-4 mb-5" style="max-width: 800px;">
            <div class="col-md-6">
                <div class="section-card bg-section-blue">
                    <h5 class="fw-bold text-primary mb-3">🗺️ Pengalaman</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="inner-content-card">
                            <h6 class="fw-bold mb-1 text-dark">Practical Training</h6>
                            <small class="text-muted d-block mb-1">Web Development with MVC Framework</small>
                            <span class="badge bg-primary text-white" style="font-size: 0.65rem;">Tahun 2026</span>
                        </div>
                        <div class="inner-content-card">
                            <h6 class="fw-bold mb-1 text-dark">Pembelajaran Frontend</h6>
                            <small class="text-muted d-block mb-1">HTML, CSS, JavaScript & Modern Web</small>
                            <span class="badge bg-secondary text-white" style="font-size: 0.65rem;">Ongoing</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="section-card bg-section-pink">
                    <h5 class="fw-bold mb-3" style="color: #BA337A;">🥇 Sertifikat</h5>
                    <div class="d-flex flex-column gap-3">
                        <div class="inner-content-card">
                            <h6 class="fw-bold mb-1 text-dark">Web Development Basics</h6>
                            <small class="text-muted d-block mb-1">Dari institusi pendidikan terpercaya</small>
                            <span class="badge text-white" style="font-size: 0.65rem; background-color: #FF61B6;">2025</span>
                        </div>
                        <div class="inner-content-card">
                            <h6 class="fw-bold mb-1 text-dark">Cybersecurity Fundamentals</h6>
                            <small class="text-muted d-block mb-1">Online learning platform berkualitas</small>
                            <span class="badge text-white" style="font-size: 0.65rem; background-color: #FF61B6;">2026</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?= base_url('/'); ?>" class="btn btn-back">← Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>