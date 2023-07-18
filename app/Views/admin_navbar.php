<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand mr-auto" href="<?= site_url('admin'); ?>">MyOrder Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-right" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url('admin'); ?>">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url('admin/orders'); ?>">Pesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= site_url('admin/salesReport'); ?>">Laporan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="<?= site_url('admin/manageMeja'); ?>">Meja</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
