<body style="background-color: #F5F5F5;">
    <div class="container">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $kelas['nama_kelas']; ?></h1>
        <h5 class="mt-3 ml-4" style="color: black;">Wali Kelas : <?= $kelas['nama']; ?></h5>
        <!-- <p class="ml-5" style="color: black;">Ibu Sri Asri Musdalifah</p> -->
        <?php foreach ($guru as $g) : ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body" style="background-color: white;">
                    <h3 class="card-tittle" style="color: black;"><?= $g['nama_mapel']; ?></h3>
                    <p style="color: black;">
                        <?= $g['nama']; ?>
                    </p>
                    <form class="user ml-auto">
                        <div class="row">
                            <a type="button" class="btn_rounded ml-auto mr-5" href="<?= base_url(); ?>siswa/mapel/<?= $kelas['id_kelas']; ?>/<?= $g['id_mapel']; ?>">Mulai</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>
    <br><br><br>
    </div>
</body>