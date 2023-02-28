<html>


<body style="background-color: #F5F5F5;">

    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- menghilangkan resubmission -->

    <?php //var_dump($presensi_status);
    if ($presensi_status) : ?>
        <div class="container">
            <h1 class="mt-3 ml-4" style="color: black;"><?= $kelas['nama_kelas']; ?></h1>
            <h4 class="ml-4" style="color: black;"><?= $mapel['nama_mapel']; ?></h4>
            <?= $this->session->flashdata('flash'); ?>

            <div class="cardku row mt-3">
                <div class=" col-sm mt-1">
                    <div href="#" class="card-body" style="background-color: white;">
                        <h2 class="card-tittle col-lg-8" style="color: black;"> Pertemuan <?= $ptm; ?></h2>
                    </div>
                </div>

                <?php
                $queryStatus = "SELECT `status`
                                    FROM `status_presensi`
                                    WHERE `id_mapel` = $id_mapel
                                    AND `pertemuan` = $ptm
                                    LIMIT 1
                                    ";
                $status = $this->db->query($queryStatus)->result_array();
                foreach ($status as $s) :
                    $s['status'];
                endforeach;
                //var_dump($status);
                if ($status) {
                    if ($s['status'] == 0) : ?>
                        <div class=" mt-4 float-right">
                            <form class="user " method="POST">
                                <div class="row">
                                    <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                                    <input type="hidden" name="pertemuan" value="<?= $ptm; ?>">
                                    <button type="submit" name="mulai" class="btn_rounded_mulai ml-auto mr-5">Mulai</button>
                                </div>
                                <div id="load_content"></div>
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="mt-4 float-right">
                            <form class="user " method="POST">
                                <div class="row">
                                    <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                                    <input type="hidden" name="pertemuan" value="<?= $ptm; ?>">
                                    <button type="submit" name="selesai" class="btn_rounded_not ml-auto mr-5">Selesai</button>
                                </div>
                            </form>
                        </div>
                <?php endif;
                }; ?>

                <br><br>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row mt-3">
                <div class="card-body ml-3" style="color: black; font-weight: bold;">
                    <div>No</div>
                </div>
                <div class="card-body" style="color: black; font-weight: bold;">
                    <div>Nama Lengkap</div>
                </div>
                <div class="card-body" style="color: black; font-weight: bold;">
                    <div class="float-right mr-5">No Induk</div>
                </div>
            </div>
            <?php if ($presensi) : ?>
                <?php
                $i = 1;
                foreach ($presensi as $p) : ?>
                    <div class="cardku row mt-2">
                        <div class="card-body ml-3" style="color: black;">
                            <div><?= $i; ?></div>
                        </div>
                        <div class="card-body" style="color: black;">
                            <div><?= $p['nama']; ?></div>
                        </div>
                        <div class="card-body" style="color: black;">
                            <div class="float-right mr-5"><?= $p['id_siswa']; ?></div>
                        </div>
                    </div>
                <?php $i++;
                endforeach;
            else : ?>
                <h5 class="text-center"></h5>
            <?php endif; ?>

        </div>
    <?php else : ?>
        <div class="container">
            <h1 class="mt-3 ml-4" style="color: black;"><?= $kelas['nama_kelas']; ?></h1>
            <h4 class="ml-4" style="color: black;"><?= $mapel['nama_mapel']; ?></h4>
            <?= $this->session->flashdata('flash'); ?>

            <div class="cardku row mt-3">
                <div class=" col-sm mt-1">
                    <div href="#" class="card-body" style="background-color: white;">
                        <h2 class="card-tittle col-lg-8" style="color: black;"> Pertemuan <?= $ptm; ?></h2>
                    </div>
                </div>
                <div class=" mt-4 float-right">
                    <form class="user" method="POST">
                        <div class="row">
                            <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                            <input type="hidden" name="pertemuan" value="<?= $ptm; ?>">
                            <input type="hidden" name="id_file" value="<?= $id_file; ?>">
                            <button type="submit" name="buat_presensi" class="btn_rounded_presensi ml-auto mr-5">Buat Presensi</button>
                        </div>
                    </form>
                </div>
                <br><br><br>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        </div>
    <?php endif; ?>

    </div>
    <br><br><br>
    </div>
</body>