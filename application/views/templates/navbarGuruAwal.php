<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #D6E6F2;">
    <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/'); ?>img/logonav.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <form class="ml-auto">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item">
                    <a type="button" class="btn_rounded_not_nav" href="<?= base_url(); ?>guru/kelas/<?= $guru['id_guru']; ?>">Mengajar</a>
                    <!-- style="background-color: #303481; font-family: Roboto; font: size 13px; font-style: bold; color:white"-->
                </li>
                <li class="nav-item ml-3">
                    <a type="button" class="btn_rounded_not_nav" href="<?= base_url(); ?>guru/nilai/<?= $guru['id_guru']; ?>">Nilai</a>
                </li>
                <li class="nav-item dropdown no-arrow ml-5">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="imgku rounded-circle" src="<?= base_url('assets/img/profile.jpg') ?>" style="width: 40px;">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= $guru['nama']; ?>
                        </a>
                        <div class="dropdown-divider" href="<?= base_url('auth/logout'); ?>"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</nav>