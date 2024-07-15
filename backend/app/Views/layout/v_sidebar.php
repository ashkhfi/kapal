<style>
    .main-sidebar {
        background-color: blue;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info text-center">
                <img src="<?= base_url('template'); ?>/dist/img/asdp.png" alt="Admin Image" style="width: 100px; height: 100px;">
                <br>
                <a href="#" class="d-block"><?= session('username') ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <?php if (session()->get('role_id') == 1) : ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= base_url('Dashboard'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('jadwal'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Jadwal
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Tiket'); ?>" class="nav-link">
                            <i class="nav-icon far fa-clipboard"></i>
                            <p>
                                Tiket
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('Laporan'); ?>" class="nav-link">
                            <i class="nav-icon far fa-clipboard"></i>
                            <p>
                                Cetak laporan
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                </ul>
        </nav>
    </div>
</aside>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

        </div>
        <div class="container-fluid">