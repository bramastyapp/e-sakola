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
                        <h1 class="" style="color: black;" id="kelas"><?php if ($id_kelas != null) {
                                                                            foreach ($kelas2 as $k2) {
                                                                                $k2;
                                                                            }
                                                                            echo $k2['nama_kelas'];
                                                                        } else {
                                                                            echo "Pilih Kelas";
                                                                        }; ?> </h1>
                    </div>
                </div>
                <div class="">
                    <div name="mapel" class="mapel">
                        <h4 class="mt-2" style="color: black;" id="mapel"> <?php if ($id_kelas != null) {
                                                                                foreach ($mapel2 as $mp) {
                                                                                    $mp;
                                                                                }
                                                                                echo $mp['nama_mapel'];
                                                                            } else {
                                                                                echo "Pilih Mata Pelajaran";
                                                                            }; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 ml-3 mt-3">
                <div class="col-lg mt-3" style="color: black;">
                    <button type="submit" class="btn_kotak2 float-right" data-toggle="modal" data-target="#cariMapel">ubah</button>
                </div>
            </div>
        </div>



        <?= $this->session->flashdata('flash'); ?>
        <div class="mt-2"></div>

        <div id="tampil">

        </div>