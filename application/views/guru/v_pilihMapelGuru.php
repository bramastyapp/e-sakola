<body style="background-color: #F5F5F5;">
    <div class="container">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $guru['nama']; ?></h1>
        <h5 class="mt-3 ml-5" style="color: black;"><?= $kelas['nama_kelas']; ?></h5>
        <!-- <p class="ml-5" style="color: black;">Ibu Sri Asri Musdalifah</p> -->
        <?php foreach ($mapel as $k) : ?>
            <div class="cardku col-sm mt-3">
                <div href="#" class="card-body" style="background-color: white;">
                    <h3 class="card-tittle" style="color: black;"><?= $k['nama_mapel']; ?></h3>
                    <p style="color: black;">
                        <? //= $k['nama_mapel']; 
                        ?>
                    </p>
                    <form class="user ml-auto">
                        <div class="row">
                            <a type="button" class="btn_rounded ml-auto mr-5" href="<?= base_url(); ?>guru/materi/<?= $k['id_kelas']; ?>/<?= $k['id_mapel']; ?>">Mulai</a>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <div>
            <a type="button" class="btn_rounded_abu ml-auto mr-2 mt-4" href="<?= base_url(); ?>guru/kelas/<?= $guru['id_guru']; ?>">
                <i class="fas fa-share fa-sm mr-2"></i>
                Kembali
            </a>
        </div>
    </div>
    </div>
    <br><br><br>
    </div>
</body>