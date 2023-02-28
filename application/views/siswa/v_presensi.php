<body style="background-color: #F5F5F5;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="container mt-5">
        <h1 class="ml-5" style="color: black;"><?= $id_mapel['nama_mapel']; ?></h1>
        <p class="ml-5" style="color: black;"><?= $id_mapel['nama']; ?></p>
        <?= $this->session->flashdata('flash'); ?>
        <?php $queryStatus = "SELECT `status`
                         FROM `status_presensi`
                         WHERE `id_mapel` = $id
                         AND `pertemuan` = $pertemuan
                         LIMIT 1
                            ";
        $status = $this->db->query($queryStatus)->result_array();
        foreach ($status as $s) :
            $s['status'];
        endforeach;
        if ($status) {


            if ($s['status'] == 1) : ?>


                <div class="cardku mt-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <h3 class="ml-3 mt-3" style="color: black;">Presensi Pertemuan <?= $pertemuan; ?></h3>


                                    <?php $x = $siswa['id_siswa'];
                                    $queryPresensi = "SELECT *
                                                                    FROM `presensi`
                                                                    WHERE `id_mapel` = $id
                                                                    AND `pertemuan` = $pertemuan
                                                                    AND `id_siswa` = $x
                                                                    ";
                                    $sudahpresensi = $this->db->query($queryPresensi)->result_array();
                                    foreach ($sudahpresensi as $v) :
                                        $v['id_siswa'];
                                    endforeach;

                                    if ($sudahpresensi) :
                                    ?>

                                        <form class="user mt-5" method="POST" action="">
                                            <div class="form-group col-lg">
                                                <input type="text" class="form-control" name="nama" readonly style="font-size: smaller; background-color: #F5F5F5;" value="<?= $siswa['nama']; ?>">
                                            </div>
                                            <div class="form-group col-lg">
                                                <input type="text" readonly class="form-control" name="id_siswa" style="font-size: smaller;  background-color: #F5F5F5;" value="<?= $siswa['id_siswa']; ?>">
                                                <input type="hidden" name="id_mapel" value="<?= $id; ?>">
                                                <input type="hidden" name="pertemuan" value="<?= $pertemuan; ?>">
                                            </div>
                                            <div class="form-group col-lg p-0 text-center mt-5">
                                                <div class="alert alert-success">Sudah Presensi</div>
                                            </div>
                                        </form>
                                    <?php else : ?>

                                        <form class=" user mt-5" method="POST" action="">
                                            <div class="form-group col-lg">
                                                <input type="text" class="form-control" name="nama" readonly style="font-size: smaller; background-color: #F5F5F5;" value="<?= $siswa['nama']; ?>">
                                            </div>
                                            <div class="form-group col-lg">
                                                <input type="text" readonly class="form-control" name="id_siswa" style="font-size: smaller;  background-color: #F5F5F5;" value="<?= $siswa['id_siswa']; ?>">
                                                <input type="hidden" name="id_mapel" value="<?= $id; ?>">
                                                <input type="hidden" name="id_file" value="<?= $id_file; ?>">
                                                <input type="hidden" name="pertemuan" value="<?= $pertemuan; ?>">
                                            </div>
                                            <div class="form-group col-lg p-0 text-center mt-5">
                                                <button type="submit" name="presensi" class="btnku birutua btnkucenter">
                                                    Presensi
                                                </button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id; ?>">
                        <i class="fas fa-share fa-sm mr-2"></i>
                        Kembali
                    </a>
                </div>

            <?php else : ?>
                <div class="cardku col-sm mt-3">
                    <div href="#" class="card-body">
                        <h3 class="card-tittle" style="color: black;">Presensi di tutup</h3>
                        <p style="color: black;">Silahkan tanyakan ke Guru masing-masing</p>

                    </div>
                </div>
                <div>
                    <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id; ?>">
                        <i class="fas fa-share fa-sm mr-2"></i>
                        Kembali
                    </a>
                </div>
            <?php
            endif;
        } else { ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body">
                    <h3 class="card-tittle" style="color: black;">Presensi di tutup</h3>
                    <p style="color: black;">Silahkan tanyakan ke Guru masing-masing</p>

                </div>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        <?php }; ?>
    </div>
    <br><br><br>
    </div>
</body>