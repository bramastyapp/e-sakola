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
                    <?php foreach ($getsiswa as $gs) {
                        $gs;
                    } ?>
                    <div class="col-lg-4 ml-3" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Lengkap</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input name="nama" class="form-control form-control-sm" placeholder="Masukkan nama lengkap" value="<?= $gs['nama'] ?>" style="border-color: transparent;">
                            <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="col-lg-4 ml-3" style="color: black; font-size: smaller;">
                        <div class="card-body">No Induk Siswa</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input name="id_siswa" class="form-control form-control-sm" placeholder="Masukkan no induk siswa" value="<?= $gs['id_siswa'] ?>" style="border-color: transparent; background-color: transparent;">
                            <?= form_error('id_siswa', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-3" style="color: black; font-size: smaller;">
                        <div class="card-body">Email</div>
                    </div>

                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input name="email" class="form-control form-control-sm" placeholder="Masukkan email siswa" value="<?= $gs['email'] ?>" style="border-color: transparent;">
                            <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>


                </div>
            </div>


        </div>
        <div class="container mt-3">
            <div class="col-lg-5" style="color: black; font-weight: bold;">
                <div>Pilih Kelas</div>
            </div>
            <div class="cardku row mt-2">
                <div class="card-body mt-2 form-group col-lg ml-4 mr-4">
                    <select class="form-control form-control-sm col-lg" name="id_kelas">
                        <?php foreach ($kelas as $k) : ?>
                            <?php if ($k['id_kelas'] == $gs['id_kelas']) : ?>
                                <option value="<?= $k['id_kelas']; ?>" selected><?= $k['nama_kelas']; ?></option>
                            <?php else : ?>
                                <option value="<?= $k['id_kelas']; ?>"><?= $k['nama_kelas']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


        </div>
        <br>
        </div>
        <div class="container">
            <div class="card-body">
                <button type="submit" class="col-lg btn_kotak_admin3">Simpan</button>
            </div>
        </div>
    </form>
    <br><br><br>
</body>