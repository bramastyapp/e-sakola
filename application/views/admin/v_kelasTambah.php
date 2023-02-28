<body style="background-color: #D6E6F2;">
    <script type='text/javascript'>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <form action="" method="post">
        <div class="container">
            <div class="container mt-5">
                <div class="col-lg-1 text-center" style="color: black; font-weight: bold;">
                    <div>Identitas</div>
                </div>
                <div class="cardku row mt-2 ">
                    <div class="card-body col-lg-4 ml-4" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Kelas</div>
                    </div>
                    <div class="card-body col-lg-7 ml-2" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input class="form-control form-control-sm ml-3" placeholder="Masukkan nama kelas" name="nama_kelas">
                            <?= form_error('nama_kelas', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-3">
                <div class="col-lg-5" style="color: black; font-weight: bold;">
                    <div>Wali Kelas</div>
                </div>
                <div class="cardku row mt-2">
                    <div class="card-body col-lg ml-4 mr-4" style="color: black; font-size: smaller;">
                        <div class="card-body">
                            <select class="form-control form-control-sm col-lg" name="id_guru" required>
                                <option disabled selected value>- Pilih Wali Kelas -</option>
                                <?php foreach ($guru as $g) : ?>
                                    <option value="<?= $g['id_guru']; ?>"><?= $g['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br>
        </div>
        <div class="container">
            <div class="card-body">
                <button type="submit" class="col-lg btn_kotak_admin3">Submit</button>
            </div>
        </div>
    </form>
    <br><br><br>
</body>