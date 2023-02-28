<body style="background-color: #D6E6F2;">
    <form action="" method="post">
        <div class="container">
            <div class="container mt-5">
                <div class="col-lg-4" style="color: black; font-weight: bold;">
                    <div>Nama Mata Pelajaran</div>
                </div>
                <div class="cardku row mt-2">
                    <div class="col-lg-4 mt-1" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Mata Pelajaran</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="card-body">
                            <?php foreach ($mapel as $m) {
                                $m;
                            } ?>
                            <input name="nama_mapel" class="form-control form-control-sm" style="border-color: transparent;" placeholder="Masukkan nama mata pelajaran" value="<?= $m['nama_mapel']; ?>">
                            <?= form_error('nama_mapel', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="container mt-3">
            <div class="col-lg-5" style="color: black; font-weight: bold;">
                <div>Pilih Kelas</div>
            </div>
            <form action="" method="post">
                <div class="cardku row mt-2">
                    <div class="mt-3 form-group col-lg ml-5 mr-5">
                        <select class="form-control form-control-sm col-lg">
                            <option>-pilih kelas-</option>
                        </select>
                    </div>
                </div>
            </form>

        </div> -->
            <br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <div class="container ">
            <div class="card-body">
                <button type="submit" class="col-lg btn_kotak_admin3">Submit</button>
            </div>
        </div>
        <br>
    </form>
</body>