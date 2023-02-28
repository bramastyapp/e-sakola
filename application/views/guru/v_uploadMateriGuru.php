<body style="background-color: #F5F5F5;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <div class="container mt-5">
        <?= $this->session->flashdata('flash'); ?>
        <div class="cardku col-sm mt-5">
            <nav class="mt-5">
                <div class="nav nav-tabs mt-5" id="nav-tab" role="tablist">
                    <a class="nav-link active mt-4 ml-2" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Upload File</a>
                    <a class="nav-link  mt-4" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Upload Link</a>
                </div>
            </nav>
            <div class="tab-content mb-4" id="nav-tabContent">
                <div class="tab-pane fade show active mb-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <? //= form_open_multipart('guru/uploadMateri'); 
                        ?>
                        <div>
                            <ul><br></ul>
                        </div>
                        <div class="form-group ml-5 mr-5">
                            <h3 style="color: black;">Upload File</h3>
                            <div class="custom-file">
                                <input type="hidden" name="id_file" value="<?= $id_file; ?>">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Choose file (docx, doc, pdf, ppt, pptx, jpg, jpeg, png)</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group col-lg p-0 text-center">
                            <button type="submit" name="kirim_file" class="btnku birutua btnkucenter">
                                Upload
                            </button>
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
                            <input type="hidden" name="id_file" value="<?= $id_file; ?>">
                            <input type="text" class="form-control" id="link" name="link" placeholder="https://www.youtube.com/watch?">
                        </div>
                        <br>
                        <div class="form-group col-lg p-0 text-center">
                            <button type="submit" name="kirim_link" class="btnku birutua btnkucenter">
                                Upload
                            </button>
                        </div>
                        <div class="col-sm mt-3">
                            <ul><br><br></ul>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div>
            <a type="button" class="btn_rounded_abu ml-auto mr-2" href="<?= base_url(); ?>guru/materi/<?= $id_kelas; ?>/<?= $id_mapel; ?>">
                <i class="fas fa-share fa-sm mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
    </div>
    <br><br><br>
    </div>
</body>