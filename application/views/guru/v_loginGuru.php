<body style="background-color: #D6E6F2;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?= base_url('assets/'); ?>img/logologin.png" class="mt-5" style="width: 80px;" />
                                    </div>
                                    <form class="user mt-5" method="POST" action="<?= base_url('auth/guru'); ?>">
                                        <?= $this->session->flashdata('flash'); ?>
                                        <div class="form-group col-lg">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" style="font-size: smaller" value="<?= set_value('email') ?>"> <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-lg">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="font-size: smaller"> <?= form_error('password', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="text-center">
                                                <a class="small" href="#" style="color: #303481;">Lupa Password?</a>
                                            </div>
                                        </div>

                                        <div class="form-group col-lg">
                                            <button type="submit" class="btnku birutua btn-block">
                                                Login
                                            </button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</body>