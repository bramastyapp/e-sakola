<body style="background-color: #F5F5F5;">

    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <!-- Javascript Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js">
    </script>
    <!-- Javascript Bootstrap Datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
    </script>

    <div class="container mt-5">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $kelas['nama_kelas']; ?></h1>
        <h4 class="ml-4" style="color: black;"><?= $mapel['nama_mapel']; ?></h4>

        <?= $this->session->flashdata('flash');
        if ($cek_tugas) : ?>

            <?php if ($tugas) { ?>
                <div class="cardku col-sm mt-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h3 class="ml-3 mt-3" style="color: black;">Tugas Pertemuan <?= $ptm; ?></h3>
                            <?php foreach ($tugas as $t) {
                                $t;
                            }; ?>
                            <div class="cardku2 col-sm mt-5" style="background-color: #f5f5f5;">
                                <table>
                                    <tr>
                                        <td class="col-lg-2">
                                            <ul class="mt-3" style="color: black;">Deskripsi</ul>
                                        </td>
                                        <td>
                                            <ul class="ml-5 mr-5"></ul>
                                        </td>
                                        <td class="col-lg-10 mr-2">
                                            <ul class="col-lg ml-4 mr-5">
                                                <div class="col-lg mt-3">
                                                    <span class="input-group-append">
                                                        <input type="hidden" name="id_file" value="<?= $t['id_file']; ?>">
                                                        <textarea class="form-groupku form-control col-lg mr-5" id="deskripsi" placeholder="Masukkan deskripsi" name="deskripsi"><?php if ($t['deskripsi'] != null) {
                                                                                                                                                                                        echo $t['deskripsi'];
                                                                                                                                                                                    }; ?></textarea>
                                                    </span>
                                                </div>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                <table>
                                    <tr>
                                        <td class="col-lg-2">
                                            <ul class="mt-3" style="color: black;">Batas Waktu</ul>
                                        </td>
                                        <td class="">
                                            <ul class="ml-5 mr-5"></ul>
                                        </td>
                                        <td class="col-lg-10">
                                            <ul class="mt-3 ml-2">
                                                <div class="input-group" id="tgl_deadline">
                                                    <input type="text" class="form-control datepicker" name="tgl_deadline" placeholder=" mm/dd/yyyy" value="<?php if ($t['tgl_deadline'] != null) {
                                                                                                                                                                echo $t['tgl_deadline'];
                                                                                                                                                            }; ?>">
                                                    <span class=" input-group-append">
                                                        <span class="input-group-text bg-white mr-5">
                                                            <i class="fa fa-calendar "></i>
                                                        </span>
                                                        <script type="text/javascript">
                                                            $('.datepicker').datepicker();
                                                        </script>
                                                    </span>
                                                </div>

                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                <table>
                                    <tr>
                                        <td class="col-lg-2">
                                            <ul class="mt-3 mr-5" style="color: black;">File</ul>
                                        </td>
                                        <td>
                                            <ul class="ml-5 mr-5"></ul>
                                        </td>
                                        <td class="col-lg-10">
                                            <div class="row">
                                                <ul class="mt-3 ml-4 col-lg-9" style="color: black;">
                                                    <div class="custom-file ml-3">
                                                        <input type="hidden" name="id_file" value="<?= $id_file; ?>">
                                                        <input type="hidden" name="old_name" value="<?= $t['file_penugasan']; ?>">
                                                        <input type="file" class="custom-file-input" id="file_penugasan" name="file_penugasan">
                                                        <label id="file_tugas" class="file_tugas custom-file-label" for="file"><?php if ($t['file_penugasan'] == null) {
                                                                                                                                    echo "Choose file (docx, doc, pdf, ppt, pptx, jpg, jpeg, png)";
                                                                                                                                } else {
                                                                                                                                    echo $t['file_penugasan'];
                                                                                                                                }; ?></label>
                                                    </div>
                                                </ul>
                                                <ul class="mt-3 col-lg-2">
                                                    <button type="submit" class="mt-2 ml-2 btntextku" style="background-color: transparent; border-color: transparent;" name="hapus_isi_file">Hapus File</button>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="cardku col-sm mt-3">
                                <ul><br></ul>
                            </div>
                            <div class="form-group col-lg p-0 text-center">


                                <?php foreach ($get_siswa as $gs) : ?>
                                    <input type="hidden" name="id_siswa[]" value="<?= $gs['id_siswa']; ?>">
                                <?php endforeach; ?>
                                <input type="hidden" name="id_tugas" value="<?= $t['id_tugas']; ?>">
                                <input type="hidden" name="id_kelas" value="<?= $id_kelas; ?>">
                                <input type="hidden" name="id_mapel" value="<?= $id_mapel; ?>">
                                <input type="hidden" name="pertemuan" value="<?= $ptm; ?>">

                                <?php if ($t['status'] == 1) : ?>
                                    <button type="submit" name="edit" class="btnku btn-warningku btnkucenter">
                                        Edit
                                    </button>
                                <?php else : ?>
                                    <button type="submit" name="unggah" class="btnku birutua btnkucenter">
                                        Unggah
                                    </button>
                                <?php endif; ?>
                            </div>
                            <div class="form-group col-lg p-0 text-center">
                                <a type="button" class="btnku btn-dangerku btnkucenter" data-toggle="modal" data-target="#hapusMateri" href="#">
                                    Hapus
                                </a>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
                <div>
                    <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                        <i class="fas fa-share fa-sm mr-2"></i>
                        Kembali
                    </a>
                </div>
                <div class="modal fade" id="hapusMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form action="" method="POST">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus file tugas?</h5>
                                    <input type="hidden" name="old_name" value="<?= $t['file_penugasan']; ?>">
                                    <?php
                                    $this->db->select("*");
                                    $this->db->from('tugas t, file_submit fs');
                                    $this->db->where('t.id_tugas=fs.id_tugas');
                                    $this->db->where('fs.id_tugas', $t['id_tugas']);
                                    $fsHapus = $this->db->get()->result_array();
                                    foreach ($fsHapus as $fsh) {
                                    ?>
                                        <input type="hidden" name="old_name1[]" value="<?= $fsh['file_submit']; ?>">
                                    <?php
                                    }; ?>
                                    <input type="hidden" name="id_tugas" value="<?= $t['id_tugas']; ?>">
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Semua file dari siswa maupun guru terkait tugas ini akan terhapus. Pilih "Hapus" jika ingin menghapus file tugas.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } else { ?>

            <?php };
        else : ?>
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
                            <button type="submit" name="buat_tugas" class="btn_rounded_presensi ml-auto mr-5">Buat Tugas</button>
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
        <?php endif; ?>
    </div>
    <div class="container mt-5">
        <div class="row mt-3">
            <div class="card-body col-lg-1" style="color: black; font-weight: bold;">
                <div>No</div>
            </div>
            <div class="card-body col-lg-2" style="color: black; font-weight: bold;">
                <div>No Induk</div>
            </div>
            <div class="card-body col-lg-2" style="color: black; font-weight: bold;">
                <div>Nama Lengkap</div>
            </div>
            <div class="card-body col-lg-2 ml-5" style="color: black; font-weight: bold;">
                <div>File Submit</div>
            </div>
            <div class="card-body col-lg-2 mr-4" style="color: black; font-weight: bold;">
                <div>Tanggal Submit</div>
            </div>
            <div class="card-body col-lg-2 ml-2" style="color: black; font-weight: bold;">
                <div class="mr-4">Nilai</div>
            </div>
        </div>
        <?php if ($file_tugas) : ?>
            <?php
            $i = 1;
            foreach ($file_tugas as $ft) : ?>
                <form action="" method="post">
                    <div class="cardku row mt-2">
                        <div class="card-body col-lg-1 ml-2 mt-1" style="color: black; font-size: smaller;">
                            <div><?= $i; ?></div>
                        </div>
                        <div class="card-body col-lg-1 ml-3 mt-1" style="color: black; font-size: smaller;">
                            <div><?= $ft['id_siswa']; ?></div>
                        </div>
                        <div class="card-body col-lg-3 ml-5 mt-1" style="color: black; font-size: smaller;">
                            <div><?= $ft['nama']; ?></div>
                        </div>
                        <div class="card-body col-lg-1 mt-1" style="color: black; font-size: smaller; ">
                            <div>
                                <a href="<?= base_url(); ?>assets/file/submit/<?= $ft['file_submit']; ?>" class="text-decoration-none">tugas</a>
                            </div>
                        </div>
                        <div class="card-body col-lg-3 mt-1 ml-2" style="color: black; font-size: smaller; font-style: italic;">
                            <div class="text-mute"><?= $ft['tgl_submit']; ?></div>
                        </div>
                        <div class="col-lg-2 mt-2 mr-2" style="color: black;">
                            <!-- <input type="hidden" name="id_nilai" value="<? //= $n['id_nilai']; 
                                                                                ?>"> -->
                            <!-- <input type="hidden" name="id_siswa" value="<? //= $ls['id_siswa']; 
                                                                                ?>"> -->
                            <div class="row">
                                <div class="mt-2 col-lg-6">

                                    <input type="hidden" name="id_submit" value="<?= $ft['id_submit']; ?>">
                                    <input class="col-lg-10 form-control form-control-sm text-center" style="color: black;" name="nilai" placeholder="--" value="<?php if ($ft['nilai'] != null) {
                                                                                                                                                                        echo $ft['nilai'];
                                                                                                                                                                    } ?>">
                                </div>
                                <button class="btnku-save mt-1 birutua col-lg-3 mr-4" type="submit" name="save">
                                    <i class="fas fa-save"></i>
                                </button>
                            </div>
                            <!-- <button type="submit" class="btn_kotak float-right" name="simpan_edit">Simpan</button> -->
                        </div>
                    </div>
                </form>
            <?php $i++;
            endforeach;
        else : ?>
            <h5 class="text-center"></h5>
        <?php endif; ?>

    </div>
    </div>
    <br><br><br>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        var textArea = document.getElementById("hapus")
        var form = document.getElementById("file_tugas")
        form.addEventListener("click", function(event) {
            textArea.value = "";
            event.preventDefault();
        }, false)
    </script>
</body>