<body style="background-color: #f5f5f5;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="mt-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 mt-5">
                                <div class="p-2 mt-4">

                                </div>
                                <div class="p-5 mt-1">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Hi <small class="h4 text-black-900 mb-4" style="font-style:italic"><?= $guru['nama']; ?></small>, selamat datang kembali
                                            semoga proses mengajarmu berjalan dengan baik.</h1>
                                    </div>
                                    <form>
                                        <a href="<?= base_url(); ?>guru/kelas/<?= $guru['id_guru']; ?>" class="btnku birutua btn-block">
                                            Mulai Mengajar
                                        </a>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?= base_url('assets/'); ?>img/floatGuru.png" class="mt-5" style="width: 500px;" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>