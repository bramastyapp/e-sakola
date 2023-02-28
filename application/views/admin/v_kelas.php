<body style="background-color: #D6E6F2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <a type="button" class="btn_kotak_admin text-center ml-3" href="<?= base_url('admin/tambah_kelas') ?>">Tambah Kelas</a>
            </div>
            <div class="col-lg-10 mt-3" style="color: black; font-style: italic;">
                <h7>Total Kelas : <?php
                                    echo $this->db->count_all('kelas');
                                    ?></h7>
            </div>
        </div>
        <div class="container mt-1">
            <div class="row mt-3">
                <div class="card-body col-lg-1 text-center" style="color: black; font-weight: bold;">
                    <div>No</div>
                </div>
                <div class="card-body col-lg-3 text-center" style="color: black; font-weight: bold;">
                    <div>Nama Kelas</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div>Jumlah Siswa</div>
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
                if ($kelas != null) :
                    foreach ($kelas as $k) : ?>
                        <div class="cardku row mt-2">
                            <div class="card-body col-lg-1 text-center" style="color: black; font-size: smaller;">
                                <div><?= $i; ?></div>
                            </div>
                            <div class="card-body col-lg-3 text-center" style="color: black; font-size: smaller;">
                                <div><?= $k['nama_kelas']; ?></div>
                            </div>
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller;">
                                <div><?php
                                        $id_kelas = $k['id_kelas'];
                                        $this->db->select('*');
                                        $this->db->from('siswa');
                                        $this->db->where('id_kelas', $id_kelas);
                                        echo $this->db->count_all_results();
                                        ?></div>
                            </div>
                            <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller; ">
                                <div></div>
                            </div>
                            <div class="col-lg-4 text-center mt-2">
                                <a type="button" href="<?= base_url() ?>/admin/edit_kelas/<?= $k['id_kelas']; ?>" class="btn_kotak_admin2 text-center">Detail</a>
                                <a type="button" href="<?= base_url() ?>/admin/hapus_kelas/<?= $k['id_kelas']; ?>" onclick="return confirm('Apa anda yakin ingin menghapus?')" class="btn_kotak_admin2 text-center ml-2">Hapus</a>
                            </div>
                        </div>
                <?php $i++;
                    endforeach;
                endif; ?>
            </form>

        </div>
    </div>
</body>