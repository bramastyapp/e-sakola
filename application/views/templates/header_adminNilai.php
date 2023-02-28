<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>css/esakola.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">



    <title> <?php echo $judul; ?> </title>
</head>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #D6E6F2;">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
            <img src="<?= base_url('assets/'); ?>img/logoicon.png"></img>
            <img class=" sidebar-brand-text mx-3" src="<?= base_url('assets/'); ?>img/logotext.png"></img>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item mt-3">
            <a class="nav-link" href="<?= base_url('admin'); ?>" style=" color: #303481;">
                <i class="fas fa-home" style=" color: #303481;"></i>
                <!-- <i class="fas fa-home" style=" color: #303481;"></i> -->
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/siswa'); ?>" style=" color: #303481;">
                <i class="fas fa-user" style=" color: #303481;"></i>
                <span>Siswa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/guru'); ?>" style=" color: #303481;">
                <i class="fas fa-chalkboard-teacher" style=" color: #303481;"></i>
                <span>Guru</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/kelas'); ?>" style=" color: #303481;">
                <i class="fas fa-th-large" style=" color: #303481;"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/mapel'); ?>" style=" color: #303481;">
                <i class="fas fa-book-reader" style=" color: #303481;"></i>
                <span>Mata Pelajaran</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="<?= base_url('admin/nilai'); ?>" style=" background-color: #303481;">
                <i class="fas fa-calculator"></i>
                <span>Nilai</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-3" style=" background-color: #303481;">

        <!-- Heading -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block mt-3">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" style=" background-color: #303481;" id="sidebarToggle"></button>
        </div>

        <!-- Sidebar Message -->


    </ul>

    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile.jpg') ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?= $admin['nama']; ?>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->