<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Akademik</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <?php echo form_open('login/login_akademik');?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nia" placeholder="Masukkan Nomor Induk Akademik">
                                        <?php echo form_error('nia', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password">
                                        <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                    </button>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    