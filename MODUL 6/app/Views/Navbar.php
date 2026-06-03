<nav class="navbar navbar-expand-lg py-3" style="background-color: #FFF9F3;">
    <div class="container">
        <a class="navbar-brand fw-bold text-dark d-flex align-items-center" href="<?= base_url('/'); ?>">
            <span class="badge bg-primary me-2 text-white" style="background-color: #FF61B6 !important;">M</span> Portfolio
        </a>
        <div class="ms-auto">
            <a href="<?= base_url('/'); ?>" class="btn btn-sm rounded-pill px-3 me-2 fw-semibold <?= $title == 'Beranda' ? 'btn-pink' : 'text-dark' ?>" style="<?= $title == 'Beranda' ? 'background-color: #FF61B6; color: white; border: none;' : '' ?>">Beranda</a>
            <a href="<?= base_url('/profil'); ?>" class="btn btn-sm rounded-pill px-3 fw-semibold <?= $title == 'Profil Praktikan' ? 'btn-blue-active' : 'text-dark' ?>" style="<?= $title == 'Profil Praktikan' ? 'background-color: #99C5FF; color: white; border: none;' : '' ?>">Profil</a>
        </div>
    </div>
</nav>