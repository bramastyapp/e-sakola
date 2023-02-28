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
                        <h1 class="ml-4" style="color: black;" id="kelas">Pilih Kelas</h1>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="mapel">
                        <h4 class="ml-4" style="color: black;" id="mapel">Pilih Mata Pelajaran</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mt-2 ml-3 float-right">
                <div class="col-lg mt-3" style="color: black;">
                    <button type="submit" class="btn_kotak2 float-right" data-toggle="modal" data-target="#cariKelas">ubah</button>
                </div>
            </div>
        </div>


        <?= $this->session->flashdata('flash'); ?>
        <div class="mt-5"></div>
        <div class="row mt-5">
            <div class="col-md-5 mt-3">
                <form action="" method="POST">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control" placeholder="Cari Siswa" name="keyword">
                        <div class="input-group-append">
                            <input class="btn btn-primary" style="background-color: #303481; border-color:#303481; font-size:small; padding: 0.375rem 0.75rem;" type="submit" name="carisiswa">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-1">
            <div class="card-body col-lg-1 ml-2" style="color: black; font-weight: bold;">
                <div>No</div>
            </div>
            <div class="card-body col-lg-4" style="color: black; font-weight: bold;">
                <div>Nama Lengkap</div>
            </div>
            <div class="card-body col-lg-3" style="color: black; font-weight: bold;">
                <div>No Induk</div>
            </div>
            <div class="card-body col-lg-1" style="color: black; font-weight: bold;">
                <div>Nilai</div>
            </div>
            <div class="card-body col-lg-2" style="color: black; font-weight: bold;">
                <div class="float-right mr-4"></div>
            </div>
        </div>

        <div class="row mt-2 cardku">
            <div class="card-body col-lg-1 mt-1 ml-2" style="color: black;">
                <div>1</div>
            </div>
            <div class="card-body col-lg-4 mt-1" style="color: black;">
                <div>Bramastya</div>
            </div>
            <div class="card-body col-lg-3 mt-1" style="color: black;">
                <div>12.12.0001</div>
            </div>
            <div class="card-body col-lg-1 mt-1" style="color: black;">
                <div>100</div>
            </div>
            <div class="col-lg-2 mt-2" style="color: black;">
                <button type="submit" class="btn_kotak float-right">ubah</button>
            </div>
        </div>
        <div class="row mt-2 cardku">
            <div class="card-body col-lg-1 mt-1 ml-2" style="color: black;">
                <div>2</div>
            </div>
            <div class="card-body col-lg-4 mt-1" style="color: black;">
                <div>Alhamda Bar Bakti Nata</div>
            </div>
            <div class="card-body col-lg-3 mt-1" style="color: black;">
                <div>12.12.0002</div>
            </div>
            <div class="card-body col-lg-1 mt-1" style="color: black;">
                <div>90</div>
            </div>
            <div class="col-lg-2 mt-2" style="color: black;">
                <button type="submit" class="btn_kotak float-right">ubah</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cariKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="POST">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih kelas dan mata pelajaran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="ml-1 sm">Pilih Kelas</label>
                        <input type="hidden" id="id_guru" name="id_guru" value="<?= $guru['id_guru']; ?>">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="0">-pilih kelas-</option>
                            <?php foreach ($kelasid->result() as $row) : ?>
                                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="ml-1 mt-3">Pilih Mata Pelajaran</label>
                        <select name="subkategori" id="subkategori" class="subkategori form-control">
                            <option value="0">-pilih mapel-</option>

                        </select>
                    </div>
                    <div class="modal-footer mt-4">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="cari">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/jquery-3.6.0.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/bootstrap.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').change(function() {
                var id_guru = $('#id_guru').val();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/guru/get_mapelNilai",
                    method: "POST",
                    data: {
                        id: id,
                        id_guru: id_guru
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var j;
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_mapel + '">' + data[i].nama_mapel + '</option>';
                        }
                        $('.subkategori').html(html);

                    }
                });
            });
            $('#kategori').change(function() {
                var id_guru = $('#id_guru').val();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/guru/get_kelasNilai",
                    method: "POST",
                    data: {
                        id: id,
                        id_guru: id_guru
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var j;
                        for (j = 0; j < data.length; j++) {
                            html += '<h1 class="ml-4" style="color: black;"  value="' + data[j].id_kelas + '">' + data[j].nama_kelas + '</h1>';
                        }
                        $('.kelas').html(html);
                    }
                });
            });
            $('#subkategori').change(function() {
                var id_guru = $('#id_guru').val();
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/guru/get_submapelNilai",
                    method: "POST",
                    data: {
                        id: id,
                        id_guru: id_guru
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        var x;
                        for (x = 0; x < data.length; x++) {
                            html += '<h4 class="ml-4" style="color: black;"  value="' + data[x].id_mapel + '">' + data[x].nama_mapel + '</h4>';
                        }
                        $('.mapel').html(html);
                    }
                });
            });
        });
    </script>
</body>

</html>