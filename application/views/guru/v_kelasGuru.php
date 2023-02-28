<body style="background-color: #F5F5F5;">
    <div class="container">
        <h1 class="mt-3 ml-4" style="color: black;"><?= $guru['nama']; ?></h1>
        <h5 class="mt-3 ml-5" style="color: black;">NIP : <?= $guru['nrp']; ?></h5>
        <!-- <p class="ml-5" style="color: black;">Ibu Sri Asri Musdalifah</p> -->
        <?php if ($kelas) :
            foreach ($kelas as $k) : ?>
                <div class="cardku col-sm mt-3">
                    <div href="#" class="card-body" style="background-color: white;">
                        <h3 class="card-tittle" style="color: black;"><?= $k['nama_kelas']; ?></h3>
                        <p style="color: black;">
                            <? //= $k['nama_mapel']; 
                            ?>
                        </p>
                        <form class="user ml-auto">
                            <div class="row">
                                <a type="button" class="btn_rounded ml-auto mr-5" href="<?= base_url(); ?>guru/pilih_mapel/<?= $k['id_guru']; ?>/<?= $k['id_kelas']; ?>">Mulai</a>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach;
        else : ?>
            <div class="cardku col-sm mt-3">Belum ada kelas yang diajar</div>
        <?php endif; ?>
    </div>
    </div>
    <br><br><br>
    </div>
</body>