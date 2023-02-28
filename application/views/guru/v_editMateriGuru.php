<body style="background-color: #F5F5F5;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="container mt-5">
        <h3 style="color: black;">Edit Materi</h3>
        <?= $this->session->flashdata('flash');
        if ($file_materi) :
            foreach ($file_materi as $f) :
                // var_dump($f);
                $f['tipe'];
            endforeach; ?>
            <div class="cardku col-sm mt-3">
                <?php if ($f['tipe'] == 1) : ?>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mt-5" id="nav-tab" role="tablist">
                            <a class="nav-link active mt-4 ml-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload File</a>
                            <a class="nav-link mt-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Link</a>
                        </div>
                    </nav>
                    <div class="tab-content mb-4" id="nav-tabContent">
                        <div class="tab-pane show active fade mb-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div>
                                    <ul><br></ul>
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <h3 style="color: black;">Upload File</h3>
                                    <div class="custom-file">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label" for="file"><?= $f['file']; ?></label>
                                    </div>
                                </div>
                                <br>
                                <div class=" form-group col-lg p-0 text-center">
                                    <button type="submit" name="edit_file" class="btnku2 btn-warning mr-3">
                                        Edit
                                    </button>
                                    <a type="button" class="btnku2 btn-danger ml-3" data-toggle="modal" data-target="#hapusMateri" href="#">
                                        Hapus
                                    </a>
                                </div>
                                <div class="col-sm mt-3">
                                    <ul><br><br></ul>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade mb-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" method="POST">
                                <div>
                                    <ul><br></ul>
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <h3 style="color: black;">Upload Link</h3>
                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                    <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                                    <input type="text" class="form-control" id="link" name="link" placeholder="https://www.youtube.com/watch?">
                                </div>
                                <br>
                                <div class="form-group col-lg p-0 text-center">
                                    <button type="submit" name="edit_link" class="btnku2 btn-warning mr-3">
                                        Edit
                                    </button>
                                    <a type="button" class="btnku2 btn-danger ml-3" data-toggle="modal" data-target="#hapusMateri" href="#">
                                        Hapus
                                    </a>
                                </div>
                                <div class="col-sm mt-3">
                                    <ul><br><br></ul>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php elseif ($f['tipe'] == 2) : ?>
                    <nav class="mt-5">
                        <div class="nav nav-tabs mt-5" id="nav-tab" role="tablist">
                            <a class="nav-link mt-4 ml-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload File</a>
                            <a class="nav-link active mt-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Link</a>
                        </div>
                    </nav>
                    <div class="tab-content mb-4" id="nav-tabContent">
                        <div class="tab-pane fade mb-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div>
                                    <ul><br></ul>
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <h3 style="color: black;">Upload File</h3>
                                    <div class="custom-file">
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                        <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label" for="file">Choose file (docx, doc, pdf, ppt, pptx, jpg, jpeg, png)</label>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group col-lg p-0 text-center">
                                    <button type="submit" name="edit_file" class="btnku2 btn-warning mr-3">
                                        Edit
                                    </button>
                                    <a type="button" class="btnku2 btn-danger ml-3" data-toggle="modal" data-target="#hapusMateri" href="#">
                                        Hapus
                                    </a>
                                </div>
                                <div class="col-sm mt-3">
                                    <ul><br><br></ul>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show active mb-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" method="POST">
                                <div>
                                    <ul><br></ul>
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <h3 style="color: black;">Upload Link</h3>
                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                    <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                                    <input type="text" class="form-control" id="link" name="link" value="<?= $f['link']; ?>">
                                </div>
                                <br>
                                <div class="form-group col-lg p-0 text-center">
                                    <button type="submit" name="edit_link" class="btnku2 btn-warning mr-3">
                                        Edit
                                    </button>
                                    <a type="button" class="btnku2 btn-danger ml-3" data-toggle="modal" data-target="#hapusMateri" href="#">
                                        Hapus
                                    </a>
                                </div>
                                <div class="col-sm mt-3">
                                    <ul><br><br></ul>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu ml-auto mr-2" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>
        <?php else : ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body">
                    <h3 class="card-tittle" style="color: black;">File materi kosong</h3>
                    <p style="color: black;">Silahkan tambahkan file materi pembelajaran</p>
                    <form class="user ml-auto">
                        <div class="row mt-3">
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <a type="button" class="btn_rounded_abu mt-4 ml-auto mr-2" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                    <i class="fas fa-share fa-sm mr-2"></i>
                    Kembali
                </a>
            </div>

        <?php endif; ?>
    </div>
    <div class="modal fade" id="hapusMateri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingin menghapus file materi?</h5>
                        <input type="hidden" name="old_name" value="<?= $f['file']; ?>">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" jika ingin menghapus file materi.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>