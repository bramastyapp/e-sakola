<body style="background-color: #D6E6F2;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <form action="" method="post">
        <div class="container">
            <div class="container mt-5">
                <div class="col-lg-1 text-center" style="color: black; font-weight: bold;">
                    <div>Identitas</div>
                </div>
                <div class="cardku row mt-2">
                    <div class=" col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Lengkap</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input class="form-control form-control-sm" placeholder="Masukkan nama lengkap" name="nama"></input>
                            <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">No Induk Pegawai</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input type="number" class="form-control form-control-sm" placeholder="Masukkan no induk pegawai" name="nrp"></input>
                            <?= form_error('nrp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">Email</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input class="form-control form-control-sm" placeholder="Masukkan email siswa" name="email"></input>
                            <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="col-lg-5" style="color: black; font-weight: bold;">
                    <div>Buat Password</div>
                </div>
                <div class="cardku row mt-2">
                    <div class="card-body col-lg-6 mb-2" style="color: black; font-size: smaller;">
                        <div>Password</div>
                        <div>
                            <input type="password" class="form-control form-control-sm col-lg-9" placeholder="Buat password" name="password1"></input>
                            <?= form_error('password1', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="card-body col-lg-6" style="color: black; font-size: smaller;">
                        <div>Konfirmasi Password</div>
                        <div>
                            <input type="password" class="form-control form-control-sm col-lg-9" placeholder="Konfirmasi password" name="password2"></input>
                            <?= form_error('password2', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div class="container">
            <div class="card-body">
                <button type="submit" class="col-lg btn_kotak_admin3">Submit</button>
            </div>
        </div>
    </form>
    <br><br><br>


    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>