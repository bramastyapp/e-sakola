<body style="background-color: #D6E6F2;">
    <form action="" method="post">
        <div class="container">
            <?= $this->session->flashdata('flash'); ?>
            <div class="container mt-5">
                <div class="col-lg-1 text-center" style="color: black; font-weight: bold;">
                    <div>Identitas</div>
                </div>
                <?php foreach ($kelas as $k) {
                    $k;
                } ?>
                <div class="cardku row mt-2">
                    <div class="col-lg-4" style="color: black; font-size: smaller;">
                        <div class="card-body">Nama Kelas</div>
                    </div>
                    <div class="col-lg-7" style="color: black; font-size: smaller;">
                        <div class="mt-3">
                            <input type="hidden" name="id_kelas" value="<?= $k['id_kelas']; ?>">
                            <input name="nama_kelas" class="form-control form-control-sm" style="border-color: transparent;" placeholder="Masukkan nama kelas" value="<?= $k['nama_kelas']; ?>"></input>
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
                        <select class="form-control form-control-sm col-lg" name="id_guru" required>
                            <?php foreach ($guru as $g) :
                                if ($g['id_guru'] == $k['id_guru']) : ?>
                                    <option value="<?= $g['id_guru']; ?>" selected><?= $g['nama']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $g['id_guru']; ?>"><?= $g['nama']; ?></option>
                            <?php endif;
                            endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                <div class="col-lg-5" style="color: black; font-weight: bold;">
                    <div>Pilih Mata Pelajaran</div>
                </div>
                <form action="" method="post">
                    <div class="cardku row mt-2">
                        <div class="card-body mt-2 form-group col-lg ml-3 mr-4">
                            <div class="row">
                                <div class="col-lg-10 float-right"></div>
                                <a type="button" class="col-lg mt-2 btntextku" data-toggle="modal" data-target="#tambahMapel">Tambah Pelajaran</a>
                            </div>
                            <?php
                            $y = 1;
                            $this->db->select("*");
                            $this->db->from('mapel_kelas mk, guru g, mapel m');
                            $this->db->where('mk.id_guru = g.id_guru AND m.id_mapel=mk.id_mapel');
                            $this->db->where('mk.id_kelas', $k['id_kelas']);
                            $mapel_kelas = $this->db->get()->result_array();
                            if ($mapel_kelas != null) :
                                foreach ($mapel_kelas as $mk) : ?>
                                    <div class="col-lg">
                                        <div class="row">
                                            <div class="col-lg-1 mt-4 text-center" style="font-size: smaller;">
                                                <?= $y; ?>
                                            </div>
                                            <div class="col-lg-3 mt-4 text-center" style="font-size: smaller;">
                                                <?= $mk['nama_mapel']; ?>
                                            </div>
                                            <div class="col-lg-3 mt-4 text-center" style="font-size: smaller;">
                                                <?= $mk['nama']; ?>
                                            </div>
                                            <div class="col-lg-2 mt-2">
                                                <a type="button" href="<?= base_url('admin/hapus_mapel_kelas') ?>/<?= $mk['id_mk']; ?>/<?= $k['id_kelas']; ?>" onclick="return confirm('Apa anda yakin ingin menghapus?')" class="btntextku text-center mt-3">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php $y++;
                                endforeach;
                            else : ?>
                                <div class="col-lg ml-5" style=" font-style: italic;">
                                    Belum ada Mata Pelajaran
                                </div>
                            <?php endif; ?>
                        </div>
                </form>

            </div>
            <br>
        </div>
        <div class="container">
            <div class="card-body">
                <button type="submit" class="col-lg btn_kotak_admin3">Submit</button>
            </div>
        </div>
    </form>
    <!-- <div class="card-body col-lg-5 mt-4" style="color: #303481; font-weight: bold;">
        <div>Daftar Siswa</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="card-body col-lg-1 text-center" style="color: black; font-weight: bold;">
                <div>No</div>
            </div>
            <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                <div>NIS</div>
            </div>
            <div class="card-body col-lg-3 text-center" style="color: black; font-weight: bold;">
                <div>Nama Siswa</div>
            </div>
            <div class="card-body col-lg-2 text-center" style="color: black; font-weight: bold;">
                <div></div>
            </div>
            <div class="card-body col-lg-4" style="color: black; font-weight: bold;">
                <div class="mr-4"></div>
            </div>
        </div>
        <form action="" method="post">
            <div class="cardku row mt-2">
                <div class="card-body col-lg-1 text-center" style="color: black; font-size: smaller;">
                    <div>1</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller;">
                    <div>0004</div>
                </div>
                <div class="card-body col-lg-3 text-center" style="color: black; font-size: smaller;">
                    <div>Bramastya Pangestu Putra</div>
                </div>
                <div class="card-body col-lg-4 text-center" style="color: black; font-size: smaller; ">
                    <div></div>
                </div>
                <div class="col-lg-2 text-center mt-2">
                    <a type="button" href="" class="btn_kotak_admin2 text-center ml-2">Hapus</a>
                </div>
            </div>
            <div class="cardku row mt-2">
                <div class="card-body col-lg-1 text-center" style="color: black; font-size: smaller;">
                    <div>2</div>
                </div>
                <div class="card-body col-lg-2 text-center" style="color: black; font-size: smaller;">
                    <div>0003</div>
                </div>
                <div class="card-body col-lg-3 text-center" style="color: black; font-size: smaller;">
                    <div>Abbrar Kasim</div>
                </div>
                <div class="card-body col-lg-4 text-center" style="color: black; font-size: smaller; ">
                    <div></div>
                </div>
                <div class="col-lg-2 text-center mt-2">
                    <a type="button" href="" class="btn_kotak_admin2 text-center ml-2">Hapus</a>
                </div>
            </div>
        </form>

    </div> -->
    <br><br><br>
    <form action="" method="POST">
        <div class="modal fade" id="tambahMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih Mata Pelajaran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body mt-3 md-3">
                        <input type="hidden" name="id_kelas" value="<?= $k['id_kelas']; ?>">
                        <select name="id_mapel" class="form-control" required>
                            <option disabled selected value>- Pilih Mapel -</option>
                            <?php foreach ($mapel as $m) : ?>
                                <option value="<?= $m['id_mapel']; ?>"><?= $m['nama_mapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-body mt-3">
                        <select name="id_guru" class="form-control" required>
                            <option disabled selected value>- Pilih Guru -</option>
                            <?php foreach ($guru as $g) : ?>
                                <option value="<?= $g['id_guru']; ?>"><?= $g['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer mt-4 mr-4">
                        <button type="submit" class="btnku birutua btnkucenter mr-3" name="tambahmapel">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- 
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/jquery-3.6.0.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/bootstrap.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kelas1').change(function() {
                var id_kelas = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/admin/get_mapel",
                    method: "POST",
                    data: {
                        id_kelas: id_kelas
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        html += '<option value="0">- Pilih Mapel -</option>';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_mapel + '">' + data[i].nama_mapel + '</option>';
                        }
                        $('.mapel1').html(html);
                    }
                });
            });
        });
    </script> -->
</body>