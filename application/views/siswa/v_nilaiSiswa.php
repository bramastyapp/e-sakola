<body style="background-color: #F5F5F5;">

    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-9">
                <div class="mt-3">
                    <div name="kelas" class="kelas">
                        <h1 class="" style="color: black;" id="kelas"><?php if ($nilai != null) {
                                                                            foreach ($nilai as $ns) {
                                                                                $ns;
                                                                            }
                                                                            echo $ns['nama_kelas'];
                                                                        }; ?></h1>
                    </div>
                </div>
                <!-- <div class="">
                    <div name="mapel" class="mapel">
                        <h4 class="mt-2" style="color: black;" id="mapel"> <? ?></h4>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-2 ml-3 mt-3">
                <!-- <div class="col-lg mt-3" style="color: black;">
                    <button type="submit" class="btn_kotak2 float-right" data-toggle="modal" data-target="#cariMapel">ubah</button>
                </div> -->
            </div>
        </div>



        <?= $this->session->flashdata('flash'); ?>
        <div class="mt-2"></div>
        <div class="container">
            <div class="row mt-1">
                <div class="card-body col-lg-1 ml-3" style="color: black; font-weight: bold;">
                    <div>No</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div>Mata Pelajaran</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div>Guru</div>
                </div>
                <div class="card-body col-lg-4 ml-4 text-center" style="color: black; font-weight: bold;">
                    <div>Tugas Pertemuan</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                    <div class="float-right">Nilai Akhir</div>
                </div>
            </div>
        </div>
        <!-- <div class="container table-wrapper-scroll-y my-custom-scrollbar col-lg"> -->
        <div class="container">
            <?php if ($ns != null) :

                $f = 1;
                foreach ($nilai as $ns) :

            ?>
                    <form action="" method="POST">
                        <div class="row mt-2 cardku">
                            <div class="card-body col-lg-1 mt-5 ml-3" style="color: black;">
                                <div class="nomor"><?= $f; ?></div>
                            </div>
                            <div class="card-body col-lg-2 mt-5 text-center" style="color: black;">
                                <div class="nis"><?= $ns['nama_mapel']; ?></div>
                            </div>
                            <div class="card-body col-lg-2 mt-5 text-center" style="color: black;">
                                <div class="text-center"><?= $ns['namaguru']; ?></div>
                            </div>
                            <div class="card-body col-lg-5 text-center">
                                <div class="table-responsive">
                                    <table class="table text-center" style="color: black; font-size: smaller;">
                                        <?php
                                        $this->db->select("*");
                                        $this->db->from('file_submit');
                                        $this->db->where('id_kelas', $id_kelas);
                                        $this->db->where('id_mapel', $ns['id_mapel']);
                                        $this->db->where('id_siswa', $siswa['id_siswa']);
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
                                            $this->db->where('id_mapel', $ns['id_mapel']);
                                            $this->db->where('id_siswa', $siswa['id_siswa']);
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