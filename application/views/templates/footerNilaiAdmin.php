<form action="" method="POST">

    <div class="modal fade" id="cariMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Mata Pelajaran</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body mt-3 md-3">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="0">-pilih kelas-</option>
                        <?php foreach ($kelas as $r) : ?>
                            <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="modal-body mt-3">
                    <select name="subkategori" id="subkategori" class="subkategori form-control">
                        <option value="0">-pilih mapel-</option>
                    </select>
                </div>
                <div class="modal-footer mt-4 mr-4">
                    <button type="submit" class="btnku birutua btnkucenter mr-3" name="cari">Cari</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ingin mengakhiri kelas?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Ya" jika ingin mengakhiri sesi belajar mengajar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Ya</a>
            </div>
        </div>
    </div>
</div>


<!-- <script src="<?php echo base_url(); ?>assets/ajax/js/script.js"></script> -->

<script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/jquery-3.6.0.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/bootstrap.js' ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/get_mapelNilai",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value="0">-pilih mapel-</option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_mapel + '">' + data[i].nama_mapel + '</option>';
                    }
                    $('.subkategori').html(html);
                }
            });
        });
        $('#kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/get_kelasNilai",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var j;
                    for (j = 0; j < data.length; j++) {
                        html += '<h1 style="color: black;" id="id_kelas" name"id_kelas" value="' + data[j].id_kelas + '">' + data[j].nama_kelas + '</h1>';
                    }
                    $('.kelas').html(html);

                }
            });
        });
        $('#subkategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/admin/get_submapelNilai",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    var x;
                    for (x = 0; x < data.length; x++) {

                        html += '<h4 style="color: black;" id="id_mapel" name"id_mapel"  value="' + data[x].id_mapel + '">' + data[x].nama_mapel + '</h4>';
                    }
                    $('.mapel').html(html);
                }
            });
        });
    });
</script>
</body>

</html>