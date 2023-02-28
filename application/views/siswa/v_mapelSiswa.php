<body style="background-color: #F5F5F5;">

    <div class="container mt-5">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $id_mapel['nama_mapel']; ?></h1>
        <p class="ml-4" style="color: black;"><?= $id_mapel['nama']; ?></p>
        <?php
        $i = 1;
        $b = 1;
        $c = 1;
        $ptm = 1;
        if ($materi) {
            foreach ($materi as $m) : ?>
                <div class="cardku col-sm mt-3">
                    <div href="#" class="card-body">
                        <h3 class="card-tittle" style="color: black;">Pertemuan ke <?= $i++; ?></h3>
                        <p style="color: black;">
                            <?= $m['deskripsi'];
                            //var_dump($m['materi']);
                            ?></p>
                        <form class="user ml-auto">

                            <?php
                            if ($m['id_file']) {
                                $a = 1;
                                $d = 1;
                                $id = $m['id_mapel'];
                                $p = $m['id_file'];
                                $queryMenu = "SELECT *
                                                FROM `file_materi` 
                                                JOIN `materi`
                                                ON `file_materi`.`id_file`=`materi`.`id_file`
                                                WHERE `materi`.`id_mapel` = $id
                                                AND `file_materi`.`id_file` = $p
                                                ";

                                $menu = $this->db->query($queryMenu)->result_array();
                                // echo var_dump($m);
                                // echo var_dump($menu);

                                foreach ($menu as $s) : ?>
                                    <?php $s['id_file'];
                                    if ($s['tipe'] == 1) : ?>
                                        <a type="button" class="btn_rounded_not ml-auto mr-2 mt-2" href="<?= base_url(); ?>assets/file/materi/<?= $s['file']; ?>">
                                            <?php
                                            echo "File ";
                                            echo $a;
                                            $a++; ?>
                                        </a>
                                    <?php elseif ($s['tipe'] == 2) : ?>
                                        <a type="button" class="btn_rounded_not ml-auto mr-2 mt-2" href="<?= $s['link']; ?>">
                                            <?php
                                            echo "Link ";
                                            echo $d;
                                            $d++; ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach;
                                if ($menu == null) { ?>

                                    <p style="font-style: italic;">Belum ada materi yang di upload.</p>
                                <?php  };
                            } else {
                                // echo $ptm; 
                                ?>
                                <p style="font-style: italic;">Belum ada materi yang di upload.</p>
                            <?php };
                            ?>


                            <div class="row mt-3">
                                <a type="button" class="btn_rounded ml-auto mr-2" href="<?= base_url(); ?>siswa/tugas/<?= $kelas['id_kelas']; ?>/<?= $id_mapel['id_mapel']; ?>/<?= $c++; ?>/<?= $m['id_file']; ?>/<?= $siswa['id_siswa']; ?>">Tugas</a>
                                <a type="button" class="btn_rounded mr-2" href="<?= base_url(); ?>siswa/presensi/<?= $kelas['id_kelas']; ?>/<?= $id_mapel['id_mapel']; ?>/<?= $b++; ?>/<?= $m['id_file']; ?>">Presensi</a>
                            </div>
                        </form>
                    </div>
                </div>


            <?php $ptm++;
            endforeach; ?>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/kelas/<?= $id_kelas; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        <?php } else { ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body">
                    <h3 class="card-tittle" style="color: black;">Belum ada Materi Pembelajaran</h3>
                    <p style="color: black;">Silahkan tanyakan ke Guru masing-masing</p>
                    <form class="user ml-auto">
                        <div class="row mt-3">
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/kelas/<?= $id_kelas; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        <?php };

        ?>




    </div>
    </div>
    <br><br><br>
    </div>
</body>