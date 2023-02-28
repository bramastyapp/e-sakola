<body style="background-color: #D6E6F2;">
    <?= $this->session->flashdata('flash'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a type="button" class="btn_kotak_admin text-center ml-3" href="<?= base_url('admin/tambah_mapel') ?>">Tambah Mapel</a>
            </div>
            <div class="col-lg-10 mt-3" style="color: black; font-style: italic;">
                <h7>Total Mata Pelajaran : <?php
                                            echo $this->db->count_all('mapel');
                                            ?></h7>
            </div>
        </div>
        <div class="container mt-1">
            <div class="row mt-3">
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div>No</div>
                </div>
                <div class="card-body col-lg-4 text-center" style="color: black; font-weight: bold;">
                    <div>Nama Mata Pelajaran</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div></div>
                </div>
                <div class="card-body col-lg-4" style="color: black; font-weight: bold;">
                    <div class="mr-4"></div>
                </div>
            </div>
            <form action="" method="post">
                <?php
                $i = 1;
                if ($mapel != null) :
                    foreach ($mapel as $m) : ?>
                        <div class="cardku row mt-2">
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller;">
                                <div><?= $i; ?></div>
                            </div>
                            <div class="card-body col-lg-4 text-center" style="color: black; font-size: smaller;">
                                <div><?= $m['nama_mapel']; ?></div>
                            </div>
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller; ">
                                <div><? //= $m['nama_kelas']; 
                                        ?></div>
                            </div>
                            <div class="col-lg-4 text-center mt-2">
                                <a type="button" href="<?= base_url() ?>/admin/edit_mapel/<?= $m['id_mapel']; ?>" class="btn_kotak_admin2 text-center">Detail</a>
                                <a type="button" href="<?= base_url() ?>/admin/hapus_mapel/<?= $m['id_mapel']; ?>" onclick="return confirm('Apa anda yakin ingin menghapus?')" class="btn_kotak_admin2 text-center ml-2">Hapus</a>
                            </div>
                        </div>
                <?php $i++;
                    endforeach;
                endif; ?>
            </form>

        </div>
    </div>
</body>