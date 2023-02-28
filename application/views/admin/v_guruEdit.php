<body style="background-color: #D6E6F2;">
    <form action="" method="post">
        <div class="container">
            <div class="container mt-5">
                <div class="col-lg-1 text-center" style="color: black; font-weight: bold;">
                    <div>Identitas</div>
                </div>
                <?php foreach ($guruid as $gg) {
                    $gg;
                } ?>
                <div class="cardku row mt-2">
                    <div class=" col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Lengkap</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input class="form-control form-control-sm" placeholder="Masukkan nama lengkap" name="nama" value="<?= $gg['nama']; ?>" style="border-color: transparent;"></input>
                            <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">No Induk Pegawai</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input type="number" class="form-control form-control-sm" placeholder="Masukkan no induk pegawai" name="nrp" value="<?= $gg['nrp']; ?>" style="border-color: transparent;"></input>
                            <?= form_error('nrp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-4 ml-2" style="color: black; font-size: smaller;">
                        <div class="card-body">Email</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input class="form-control form-control-sm" placeholder="Masukkan email siswa" name="email" value="<?= $gg['email']; ?>" style="border-color: transparent;"></input>
                            <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>


            </div>
            <div class="container mt-5">
                <div class="col-lg-5" style="color: black; font-weight: bold;">
                    <div>Mata pelajaran yang diampu</div>
                </div>
                <div class="row">
                    <div class="col-lg-10 float-right"></div>
                </div>
                <div class="my-custom-scrollbar table-wrapper-scroll-y">
                    <div class="container">
                        <div class="cardku row mt-2 ">
                            <div class="card-body col-lg">
                                <?php $r = 1;
                                if ($getguru) :
                                    foreach ($getguru as $ggr) : ?>
                                        <div class="row mt-2">
                                            <div class="col-lg-1 ml-3" style="font-size: smaller;">
                                                <div class="col-lg text-center">
                                                    <?= $r . '.'; ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="font-size: smaller;">
                                                <div class="col-lg">
                                                    <?= $ggr['nama_kelas'] ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-4" style="font-size: smaller;">
                                                <div class="col-lg">
                                                    <?= $ggr['nama_mapel'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $r++;
                                    endforeach;
                                else : ?>
                                    <h5 class="text-center" style="color: black;">Belum ada mata pelajaran yang di ajarkan</h5>
                                <?php endif; ?>
                            </div>
                        </div>
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

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>