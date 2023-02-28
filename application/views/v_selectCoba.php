<!DOCTYPE html>
<html>

<head>
    <title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/nilai/css/bootstrap.css' ?>">
</head>

<body>
    <br />
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4>
                <center>Select Kelas Coba</center>
            </h4>
            <hr />
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">Kelas</label>
                    <div class="col-md-8">
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach ($data->result() as $row) : ?>
                                <option value="<?php echo $row->id_kelas; ?>"><?php echo $row->nama_kelas; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Mapel</label>
                    <div class="col-md-8">
                        <select name="subkategori" class="subkategori form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>

                </div>
            </form>
            <hr />
            <p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/jquery-3.6.0.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/nilai/js/bootstrap.js' ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kategori').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>index.php/select/get_subkelas",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option>' + data[i].nama_mapel + '</option>';
                        }
                        $('.subkategori').html(html);

                    }
                });
            });
        });
    </script>
</body>

</html>