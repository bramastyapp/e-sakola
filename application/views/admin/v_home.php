<body style="background-color: #D6E6F2;">
    <div class="container">
        <div class="container">
            <h7 class="col-lg ml-3" style="color: black;">Jumlah Siswa</h7>
            <div class="cardku mt-2">
                <div class="row">
                    <div class="card-body col-lg-9">
                        <h1 class="card-body ml-4 mt-3" style="color: black; font-weight: 600;">
                            <?php
                            echo $this->db->count_all('siswa');
                            ?></h1>
                    </div>
                    <div class="card-body col-lg-2 ml-5">
                        <img src="<?= base_url('assets/'); ?>img/floatSiswa.png" style="width: 150px;">
                    </div>
                </div>
            </div>
            <br>
            <h7 class="col-lg ml-3" style="color: black;">Jumlah Guru</h7>
            <div class="cardku mt-2">
                <div class="row">
                    <div class="card-body col-lg-9">
                        <div class="card-body col-lg-9">
                            <h1 class="card-body ml-1" style="color: black; font-weight: 600;">
                                <?php
                                echo $this->db->count_all('guru');
                                ?></h1>
                        </div>
                    </div>
                    <div class="card-body col-lg-2 mt-2 ml-5">
                        <img src="<?= base_url('assets/'); ?>img/floatGuru.png" style="width: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>