<body style="background-color: #F5F5F5;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <!-- menghilangkan resubmission -->

    <div class="container">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $kelas['nama_kelas']; ?></h1>
        <h4 class="ml-4" style="color: black;"><?= $mapel['nama_mapel']; ?></h4>
        <?= $this->session->flashdata('flash'); ?>
        <?= form_error('file', '<div class="alert alert-danger">', '</div>'); ?>
        <?php
        $i = 1;
        $b = 1;
        $c = 1;
        $z = 1;
        $l = 1;

        if ($materi) {
            foreach ($materi as $m) :
        ?>
                <div class="cardku col-sm mt-3">
                    <form action="<?= base_url(); ?>guru/materi/<?= $kelas['id_kelas']; ?>/<?= $mapel['id_mapel']; ?>" method="POST">
                        <div href="#" class="card-body">
                            <h3 class="card-tittle" style="color: black;">Pertemuan ke <?= $i++; ?></h3>

                            <div>
                                <button type="submit" name="simpan" class="badge birutua-border float-right mr-3 ">Simpan</button>
                                <input type="hidden" name="id_file" value="<?= $m['id_file']; ?>">
                                <textarea class="form-groupku col-lg mt-2" id="deskripsi" name="deskripsi"><?= $m['deskripsi']; ?></textarea>
                            </div>
                            <form class="user ml-auto mt-3">

                                <?php
                                if ($m['id_file']) {
                                    $a = 1;
                                    $c = 1;

                                    $d = 1;
                                    $id = $m['id_mapel'];
                                    $p = $m['id_file'];
                                    $queryMenu = "SELECT *
                                                FROM `file_materi` 
                                                RIGHT JOIN `materi`
                                                ON `file_materi`.`id_file`=`materi`.`id_file`
                                                WHERE `materi`.`id_mapel` = $id
                                                AND `file_materi`.`id_file` = $p
                                                ";

                                    $menu = $this->db->query($queryMenu)->result_array();
                                    // echo var_dump($m);
                                    //echo var_dump($menu);

                                    foreach ($menu as $s) : ?>
                                        <?php $s['id_file'];
                                        if ($s['tipe'] == 1) : ?>
                                            <a type="button" class="btn_rounded_not ml-auto mr-2 mt-2" href="<?= base_url(); ?>guru/editMateri/<?= $s['id']; ?>/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                                                <?php
                                                echo "File ";
                                                echo $a;
                                                $a++; ?>
                                            </a>
                                        <?php elseif ($s['tipe'] == 2) : ?>
                                            <a type="button" class="btn_rounded_not ml-auto mr-2 mt-2" href="<?= base_url(); ?>guru/editMateri/<?= $s['id']; ?>/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                                                <?php
                                                echo "Link ";
                                                echo $c;
                                                $c++; ?>
                                            </a>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                    <a type="button" class="btn_rounded_tambah ml-auto mr-2 mt-2" href="<?= base_url(); ?>guru/uploadMateri/<?= $m['id_file']; ?>/<?= $id_kelas; ?>/<?= $id_mapel; ?>">Materi +</a>


                                <?php } else {
                                    //foreach ($menu as $s) :
                                    //$m['id_file']++;
                                    // echo $ptm; 
                                ?>
                                    <a type="button" class="btn_rounded_tambah ml-auto mr-2 mt-2" href="<?= base_url(); ?>guru/uploadMateri/<?= $m['id_file']; ?>/<?= $id_kelas; ?>/<?= $id_mapel; ?>">Materi +</a>
                                <?php //endforeach;
                                };

                                //$p++;
                                ?>



                                <div class="row mt-3">
                                    <a type="button" class="btn_rounded ml-auto mr-2" href="<?= base_url(); ?>guru/tugas/<?= $kelas['id_kelas']; ?>/<?= $mapel['id_mapel']; ?>/<?= $l++; ?>/<?= $m['id_file']; ?>">Tugas</a>
                                    <a type="button" class="btn_rounded mr-2" href="<?= base_url(); ?>guru/presensi/<?= $kelas['id_kelas']; ?>/<?= $mapel['id_mapel']; ?>/<?= $b++; ?>/<?= $m['id_file']; ?>">Presensi</a>
                                    <!-- <a type="button" class="fas fa-trash mr-2 iconku"></a> -->
                                </div>
                            </form>
                        </div>
                    </form>
                </div>

            <?php
                $z++;
            endforeach; ?>
            <div class="row">
                <div class="col-lg-5">
                    <div>
                        <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/pilih_mapel/<?= $guru['id_guru']; ?>/<?= $id_kelas; ?>">
                            <i class="fas fa-share fa-sm mr-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div>
                        <a type="button" class="btn_rounded_tambah ml-auto mr-2 mt-4 float-right" data-toggle="modal" data-target="#tambahMateri" href="#">Tambah +</a>
                    </div>
                    <div>
                        <a type="button" class="btn_rounded_tambah ml-auto mr-2 mt-4 float-right" data-toggle="modal" data-target="#hapusMateri" href="#">Hapus</a>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body">
                    <h3 class="card-tittle" style="color: black;">Belum ada Materi Pembelajaran</h3>
                    <p style="color: black;">Silahkan tambahkan materi pembelajaran</p>
                    <form class="user ml-auto">
                        <div class="row mt-3">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div>
                        <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/pilih_mapel/<?= $guru['id_guru']; ?>/<?= $id_kelas; ?>">
                            <i class="fas fa-share fa-sm mr-2"></i>
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div>
                        <a type="button" class="btn_rounded_tambah ml-auto mr-2 mt-4 float-right" data-toggle="modal" data-target="#tambahMateri" href="#">Tambah +</a>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
    <div class="modal fade" id="tambahMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin menambah materi pertemuan?</h5>
                        <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                        <input type="hidden" name="pertemuan" value="<?= $z; ?>">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Tambah" jika ingin menambah materi pertemuan.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal fade" id="hapusMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus materi pertemuan terakhir?</h5>
                        <?php foreach ($file_materi as $f) {
                            $f;
                        }; ?>
                        <input type="hidden" name="id_file" value="<?= $m['id_file']; ?>">
                        <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" jika ingin menghapus materi pertemuan terakhir.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <br><br><br>
    </div>

</body>