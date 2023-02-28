<body style="background-color: #D6E6F2;">
    <form action="" method="post">
        <div class="container">
            <?= $this->session->flashdata('flash'); ?>
            <div class="row">
                <div class="col-lg-2">
                    <a type="button" class="btn_kotak_admin text-center ml-3" href="<?= base_url('admin/tambah_siswa') ?>">Tambah Siswa</a>
                </div>
                <div class="col-lg-10 mt-3" style="color: black; font-style: italic;">
                    <h7>Total Siswa : <?php
                                        echo $this->db->count_all('siswa');
                                        ?></h7>
                </div>
            </div>
            <div class="container mt-1">
                <div class="row mt-3">
                    <div class="card-body col-lg-1 text-center" style="color: black; font-weight: bold;">
                        <div>No</div>
                    </div>
                    <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                        <div>NIS</div>
                    </div>
                    <div class="card-body col-lg-3 text-center" style="color: black; font-weight: bold;">
                        <div>Nama Lengkap</div>
                    </div>
                    <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                        <div>Kelas</div>
                    </div>
                    <div class="card-body col-lg-4" style="color: black; font-weight: bold;">
                        <div class="mr-4"></div>
                    </div>
                </div>
                <?php
                $i = 1;
                if ($siswa != null) :
                    foreach ($siswa as $s) : ?>
                        <div class="cardku row mt-2">
                            <div class="card-body col-lg-1 text-center" style="color: black; font-size: smaller;">
                                <div><?= $i; ?></div>
                            </div>
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller;">
                                <div><?= $s['id_siswa']; ?></div>
                            </div>
                            <div class="card-body col-lg-3 text-center" style="color: black; font-size: smaller;">
                                <div><?= $s['nama']; ?></div>
                            </div>
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller; ">
                                <div><?= $s['nama_kelas']; ?></div>
                            </div>
                            <div class="col-lg-4 text-center mt-2">
                                <a type="button" href="<?= base_url() ?>/admin/edit_siswa/<?= $s['id_siswa']; ?>" class="btn_kotak_admin2 text-center">Detail</a>
                                <a href="<?= base_url() ?>/admin/hapus_siswa/<?= $s['id_siswa']; ?>" type="button" class="btn_kotak_admin2 text-center ml-2" onclick="return confirm('Apa anda yakin ingin menghapus?')">Hapus</a>
                            </div>
                        </div>
                <?php $i++;
                    endforeach;
                endif; ?>


            </div>
        </div>
        <!-- <div class="modal fade" id="hapussiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus siswa?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" jika ingin menghapus siswa.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                    </div>
                </div>
            </div>
        </div> -->
    </form>
</body>