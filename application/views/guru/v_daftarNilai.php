<?php
// $queryMenu = "SELECT * FROM siswa WHERE id_kelas = '$id_kelas' ";
// $list_siswa = $this->db->query($queryMenu)->result_array();
$this->db->select('*');
$this->db->from('siswa');
$this->db->where('id_kelas', $id_kelas);
$list_siswa = $this->db->get()->result_array();

// //} 
?>

<!-- <div class="row">
    <div class="col-md-5 mt-3">
        <form action="" method="POST">
            <div class="input-group mb-1">
                <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
                <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                <input type="text" class="form-control" placeholder="Masukkan keyword . . " autocomplete="off" name="keyword">
                <div class="input-group-append">
                    <button type="submit" id="carisiswa" class="btn btn-primary" style="background-color: #303481; border-color:#303481; font-size:small; padding: 0.375rem 0.75rem;" name="cari">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div> -->
<div class="container">
    <div class="row mt-1">
        <div class="card-body col-lg-1 ml-2" style="color: black; font-weight: bold;">
            <div>No</div>
        </div>
        <div class="card-body col-lg-2" style="color: black; font-weight: bold;">
            <div>No Induk</div>
        </div>
        <div class="card-body col-lg-2" style="color: black; font-weight: bold;">
            <div>Nama Lengkap</div>
        </div>
        <div class="card-body col-lg-4 ml-5 text-center" style="color: black; font-weight: bold;">
            <div>Tugas Pertemuan</div>
        </div>
        <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
            <div class="float-right">Nilai Akhir</div>
        </div>
    </div>
</div>
<!-- <div class="container table-wrapper-scroll-y my-custom-scrollbar col-lg"> -->
<div class="container">
    <?php if ($list_siswa != null) :

        $f = 1;
        foreach ($list_siswa as $ls) :

    ?>
            <form action="" method="POST">
                <div class="row mt-2 cardku">
                    <div class="card-body col-lg-1 mt-5 ml-3" style="color: black;">
                        <div class="nomor"><?= $f; ?></div>
                    </div>
                    <div class="card-body col-lg-1 mt-5 text-center" style="color: black;">
                        <div class="nis"><?= $ls['id_siswa']; ?></div>
                    </div>
                    <div class="card-body col-lg-3 ml-4 mt-5 text-center" style="color: black;">
                        <div class="text-center"><?= $ls['nama']; ?></div>
                    </div>
                    <div class="card-body col-lg-5 text-center">
                        <div class="table-responsive">
                            <table class="table text-center" style="color: black; font-size: smaller;">
                                <?php
                                $this->db->select("*");
                                $this->db->from('file_submit');
                                $this->db->where('id_kelas', $id_kelas);
                                $this->db->where('id_mapel', $id_mapel);
                                $this->db->where('id_siswa', $ls['id_siswa']);
                                $this->db->order_by('pertemuan');
                                $nilai_tugas = $this->db->get()->result_array();

                                if ($nilai_tugas != null) :
                                ?>
                                    <thead>
                                        <tr>
                                            <?php foreach ($nilai_tugas as $nt) { ?>
                                                <th scope="col"><?= $nt['pertemuan']; ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="color: #303481;">
                                            <?php foreach ($nilai_tugas as $nt) { ?>
                                                <td><?php if ($nt['nilai'] != null) {
                                                        echo $nt['nilai'];
                                                    } else {
                                                        echo "-";
                                                    }; ?></td>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                <?php else : ?>
                                    <thead>
                                        <tr>
                                            <th scope="col">Belum ada tugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Belum ada nilai</td>
                                        </tr>
                                    </tbody>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-1 mt-3 text-center">
                        <div class="col-lg mt-3">
                            <button type="button" disabled class="btn_nilai text-decoration-none">
                                <div class="">

                                    <?php
                                    $this->db->select("nilai");
                                    $this->db->from('file_submit');
                                    $this->db->where('id_kelas', $id_kelas);
                                    $this->db->where('id_mapel', $id_mapel);
                                    $this->db->where('id_siswa', $ls['id_siswa']);
                                    $this->db->order_by('pertemuan');
                                    $nilai_akhir = $this->db->get()->result_array();

                                    if ($nilai_akhir != null) {
                                        $ax = 0;
                                        foreach ($nilai_akhir as $na) {
                                            $ax = $ax + $na['nilai'];
                                        }
                                        echo $ax / count($nilai_akhir);
                                    } else {
                                        echo "n/a";
                                    }
                                    ?>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        <?php $f++;
        endforeach; ?>
</div>
<br>
<br>
<?php else :
?>
    <div class="row mt-2 cardku">
        <div class="card-body">
            <h4 class="text-center" style="color: black; font-style:italic;">Belum ada siswa yang terdaftar di dalam mata pelajaran ini!</h4>
        </div>
    </div>
<?php endif; ?>

</div>
</div>