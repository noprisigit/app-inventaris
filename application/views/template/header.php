<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>App Inventaris | <?= $second_title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-lightblue navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">
                            <i class="fas fa-power-off mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-lightblue elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('home') ?>" class="brand-link navbar-lightblue">
                <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light text-white">App Inventaris</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $this->session->userdata('full_name') ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?= base_url('home') ?>" class="nav-link <?= $title == 'Dashboard' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= ($title == 'Hardware' or $title == 'ATK') ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= ($title == 'Hardware' or $title == 'ATK') ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-archive"></i>
                                <p>
                                    Manajemen Inventaris
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview <?= $title == 'Hardware' ? 'menu-open' : '' ?>">
                                    <a href="#" class="nav-link <?= $title == 'Hardware' ? 'active' : '' ?>">
                                        <i style="color: black" class="nav-icon fas fa-cogs"></i>
                                        <p style="color: black">
                                            Hardware
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url('hardware/stok-hardware') ?>" class="nav-link <?= ($second_title == 'Stok Hardware' or $second_title == 'Input Stok Hardware' or $second_title == 'Edit Stok Hardware') ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Stok Hardware</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('hardware/jenis-hardware') ?>" class="nav-link <?= $second_title == 'Jenis Hardware' ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Jenis Hardware</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('hardware/hardware-rusak') ?>" class="nav-link <?= $second_title == 'Hardware Rusak' ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Hardware Rusak</p>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="<?= base_url('hardware/detail-hardware') ?>" class="nav-link">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Detail Harware</p>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview <?= $title == 'ATK' ? 'menu-open' : '' ?>">
                                    <a href="#" class="nav-link <?= $title == 'ATK' ? 'active' : '' ?>">
                                        <i style="color: black" class="nav-icon fas fa-pen-square"></i>
                                        <p style="color: black">
                                            Alat Tulis Kantor
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?= base_url('atk/stok-atk') ?>" class="nav-link <?= ($second_title == 'Stok ATK' or $second_title == 'Input Stok ATK') ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Stok ATK</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('atk/jenis-atk') ?>" class="nav-link <?= $second_title == 'Jenis ATK' ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">Jenis ATK</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('atk/atk-habis') ?>" class="nav-link <?= $second_title == 'ATK Habis' ? 'active' : '' ?>">
                                                <i style="color: black" class="far fa-dot-circle nav-icon"></i>
                                                <p style="color: black">ATK Habis</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('management/management-komputer') ?>" class="nav-link <?= ($second_title == 'Management Komputer' or $second_title == 'Tambah Komputer' or $second_title == 'Edit Komputer') ? 'active' : ''?>">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>
                                    Manajemen Komputer
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>