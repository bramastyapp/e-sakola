<body style="background-color: #F5F5F5;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="container mt-5">
        <h1 class="ml-5" style="color: black;"><?= $id['nama_mapel']; ?></h1>
        <p class="ml-5" style="color: black;"><?= $id['nama']; ?></p>

        <?= $this->session->flashdata('flash');
        if ($tugas) {
            foreach ($tugas as $t);
            if ($t['status'] != null) :
        ?>
                <div class="cardku col-sm mt-5">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <h3 class="ml-3 mt-3" style="color: black;">Tugas Pertemuan <?= $pertemuan; ?></h3>
                            <p class="ml-4 mt-3" style="color: black;"><?= $t['deskripsi']; ?></p>
                            <div class="row">
                                <div class="ml-4">
                                    <p class="ml-4 mt-3" style="color: black;">File tugas</p>
                                </div>
                                <div class="ml-3 ">
                                    <p class="ml-4 mt-3" style="color: black;"> : </p>
                                </div>
                                <div class="mt-3 ml-3">
                                    <a class="ml-4 mt-3" href="<?= base_url(); ?>assets/file/tugas/<?= $t['file_penugasan']; ?>"><?= $t['file_penugasan']; ?></a>
                                </div>
                            </div>
                            <div class="cardku2 col-sm mt-4" style="background-color: #f5f5f5;">
                                <table>
                                    <tr>
                                        <td>
                                            <ul class="mt-3" style="color: black;">Batas Waktu</ul>
                                        </td>
                                        <td>
                                            <ul class="ml-5 mr-5"></ul>
                                        </td>
                                        <td>
                                            <ul class="mt-3" style="color: black;"><?php if ($t['tgl_deadline'] == "") {
                                                                                        echo "tidak ada batas waktu";
                                                                                    } else {
                                                                                        echo $t['tgl_deadline'];
                                                                                    }; ?></ul>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php if ($file_submit) :
                                foreach ($file_submit as $fs) {
                                };
                                // if ($siswa['id_siswa'] == $fs['id_siswa']) {
                                if ($fs['file_submit'] != null) {

                            ?>
                                    <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                        <table>
                                            <tr>
                                                <td class="col-lg-2">
                                                    <ul class="mt-3" style="color: black;">Upload File</ul>
                                                </td>
                                                <td>
                                                    <ul class="ml-5 mr-2"></ul>
                                                </td>
                                                <td class="col-lg-6">

                                                    <ul class="mt-3" style="color: black;">
                                                        <div class="custom-file">
                                                            <input type="hidden" name="id_tugas" value="<?= $t['id_tugas']; ?>">
                                                            <input type="hidden" name="old_name" value="<?= $fs['file_submit']; ?>">
                                                            <input type="file" class="custom-file-input" id="file_submit" name="file_submit">
                                                            <label class="custom-file-label" for="file_submit"><?= "Choose file (docx, doc, pdf, ppt, pptx)"; ?></label>
                                                        </div>
                                                    </ul>
                                                </td>
                                                <td class="col-lg-4">
                                                    <ul class="mt-3">
                                                        <a href="<?= base_url(); ?>assets/file/submit/<?= $fs['file_submit']; ?>" class="text-decoration-none"><?= $fs['file_submit']; ?></a>
                                                        <p class="font-italic"><?= $fs['tgl_submit']; ?></p>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <ul class="mt-3 mr-5" style="color: black;">Status</ul>
                                                </td>
                                                <td>
                                                    <ul class="ml-5 mr-5"></ul>
                                                </td>
                                                <td>
                                                    <ul class="mt-3" style="color: black;"><?php if ($fs != null) {
                                                                                                if ($fs['status'] == 0) {
                                                                                                    echo "Belum mengumpulkan";
                                                                                                } elseif ($fs['status'] == 1) {
                                                                                                    echo "Sudah mengumpulkan";
                                                                                                }
                                                                                            }; ?></ul>
                                                </td>

                                            </tr>
                                        </table>
                                    </div>
                                <?php } else { ?>
                                    <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                        <table>
                                            <tr>
                                                <td class="col-lg-2">
                                                    <ul class="mt-3" style="color: black;">Upload File</ul>
                                                </td>
                                                <td>
                                                    <ul class="ml-5 mr-2"></ul>
                                                </td>
                                                <td class="col-lg-6">
                                                    <ul class="mt-3" style="color: black;">
                                                        <div class="custom-file">
                                                            <input type="hidden" name="id_tugas" value="<?= $t['id_tugas']; ?>">
                                                            <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                                                            <input type="file" class="custom-file-input" id="file_submit" name="file_submit">
                                                            <label class="custom-file-label" for="file_submit"><?= "Choose file (docx, doc, pdf, ppt, pptx)"; ?></label>
                                                        </div>
                                                    </ul>
                                                </td>
                                                <td class="col-lg-4">
                                                    <ul class="mt-3">
                                                        <p class="font-italic">Belum ada file yang di upload</p>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <ul class="mt-3 mr-5" style="color: black;">Status</ul>
                                                </td>
                                                <td>
                                                    <ul class="ml-5 mr-5"></ul>
                                                </td>
                                                <td>
                                                    <ul class="mt-3" style="color: black;"><?= "Belum mengumpulkan"; ?></ul>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="cardku col-sm mt-3">
                                        <ul><br><br></ul>
                                    </div>
                                    <div class="form-group col-lg p-0 text-center">
                                        <button type="submit" name="tambah" class="btnku birutua btnkucenter">
                                            Tambah Unggahan
                                        </button>
                                    </div>
                                <?php };
                            else : ?>
                                <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                    <table>
                                        <tr>
                                            <td class="col-lg-2">
                                                <ul class="mt-3" style="color: black;">Upload File</ul>
                                            </td>
                                            <td>
                                                <ul class="ml-5 mr-2"></ul>
                                            </td>
                                            <td class="col-lg-6">
                                                <ul class="mt-3" style="color: black;">
                                                    <div class="custom-file">
                                                        <input type="hidden" name="id_tugas" value="<?= $t['id_tugas']; ?>">
                                                        <input type="hidden" name="id_siswa" value="<?= $siswa['id_siswa']; ?>">
                                                        <input type="file" class="custom-file-input" id="file_submit" name="file_submit">
                                                        <label class="custom-file-label" for="file_submit"><?= "Choose file (docx, doc, pdf, ppt, pptx)"; ?></label>
                                                    </div>
                                                </ul>
                                            </td>
                                            <td class="col-lg-4">
                                                <ul class="mt-3">
                                                    <p class="font-italic">Belum ada file yang di upload</p>
                                                </ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="cardku2 col-sm mt-3" style="background-color: #f5f5f5;">
                                    <table>
                                        <tr>
                                            <td>
                                                <ul class="mt-3 mr-5" style="color: black;">Status</ul>
                                            </td>
                                            <td>
                                                <ul class="ml-5 mr-5"></ul>
                                            </td>
                                            <td>
                                                <ul class="mt-3" style="color: black;"><?= "Belum mengumpulkan"; ?></ul>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            <?php endif; ?>
                            <div class="cardku col-sm mt-3">
                                <ul><br><br></ul>
                            </div>
                            <?php if ($file_submit) {
                                if ($fs['file_submit']) : ?>
                                    <?php if ($fs['status'] == 0) { ?>
                                        <div class="form-group col-lg p-0 text-center">
                                            <input type="hidden" name="old_name" value="<?= $fs['file_submit']; ?>">
                                            <input type="hidden" name="id_submit" value="<?= $fs['id_submit']; ?>">
                                            <button type="submit" name="submit" class="btnku birutua btnkucenter">
                                                Submit File
                                            </button>
                                        </div>
                                        <div class="form-group col-lg p-0 text-center">
                                            <button type="submit" name="edit" class="btnku btn-warningku btnkucenter">
                                                Edit File
                                            </button>
                                        </div>
                                    <?php } elseif ($fs['status'] == 1) { ?>
                                        <div class="form-group col-lg p-0 text-center">
                                            <button type="submit" name="edit" class="btnku btn-warningku btnkucenter">
                                                Edit File
                                            </button>
                                        </div>
                                        <div class="form-group col-lg p-0 text-center">
                                            <a type="button" class="btnku btn-dangerku btnkucenter" data-toggle="modal" data-target="#hapusMateri" href="#">
                                                Hapus
                                            </a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group col-lg p-0 text-center">
                                            <input type="hidden" name="id_submit" value="<?= $fs['id_submit']; ?>">
                                            <button type="submit" name="tambah" class="btnku birutua btnkucenter">
                                                Tambah Unggahan
                                            </button>
                                        </div>
                                    <?php }; ?>

                                    <div class="modal fade" id="hapusMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="" method="POST">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus file tugas?</h5>
                                                        <input type="hidden" name="old_name" value="<?= $fs['file_submit']; ?>">
                                                        <input type="hidden" name="id_submit" value="<?= $fs['id_submit']; ?>">
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">Pilih "Hapus" jika ingin menghapus file tugas.</div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif;
                            } else { ?>
                                <div class="form-group col-lg p-0 text-center">
                                    <!-- <input type="hidden" name="id_submit" value="<? //= $fs['id_submit']; 
                                                                                        ?>"> -->
                                    <button type="submit" name="tambah" class="btnku birutua btnkucenter">
                                        Tambah Unggahan 3
                                    </button>
                                </div>
                            <?php }; ?>
                            <br><br>
                        </div>
                    </form>
                </div>
                <div>
                    <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                        <i class="fas fa-share fa-sm mr-2"></i>
                        Kembali
                    </a>
                </div>
            <?php else : ?>
                <div class="cardku col-sm mt-3">
                    <div class="card-body">
                        <h3 class="ml-3 mt-3" style="color: black;">Belum ada tugas</h3>
                        <p class="ml-4 mt-3" style="color: black;">Silahkan tanyakan ke guru kalian.</p>
                    </div>
                </div>
                <div>
                    <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                        <i class="fas fa-share fa-sm mr-2"></i>
                        Kembali
                    </a>
                </div>
            <?php endif; ?>
        <?php } else { ?>
            <div class="cardku col-sm mt-3">
                <div class="card-body">
                    <h3 class="ml-3 mt-3" style="color: black;">Belum ada tugas</h3>
                    <p class="ml-4 mt-3" style="color: black;">Silahkan tanyakan ke guru kalian.</p>
                </div>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>siswa/mapel/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        <?php }; ?>
    </div>


    </div>
    <br><br><br>
    </div>
</body>