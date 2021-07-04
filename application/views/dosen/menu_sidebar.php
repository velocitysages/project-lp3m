<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <img widht="300" class="logo" src="<?= base_url() ?>/assets/img/logo.png" alt="">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen/arsip') ?>">
                <i class="fas fa-fw fa-file-archive"></i>
                <span>Arsip</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen/daftarusulanpenelitian') ?>">
                <i class="fas fa-fw fa-search-plus"></i>
                <span>Daftar Usulan Penelitian</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <footer class="footer-login sticky-footer bg-sidebar" style="position: absolute; bottom: 0; width:100%;">
        <div class="container-fluid">
            <div class="copyright text-center text-white">
                <span>Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
            </div>
        </div>
    </footer>