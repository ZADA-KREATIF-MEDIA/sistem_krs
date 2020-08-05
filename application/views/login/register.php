<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Daftar Account Mahasiswa</h1>
                        </div>
                        <?php echo form_open('login/save_register_mahasiswa');?>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama"  placeholder="Nama">
                                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nim" placeholder="NIM">
                                    <?php echo form_error('nim', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" name="passconf" placeholder="Ulangi  Password">
                                    <?php echo form_error('passconf', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="laki-laki">Laki - Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="agama" id="agama" class="form-control">
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katholik">Katholik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control" name="no_tlpn" placeholder="Nomor Telephone">
                                    <?php echo form_error('passconf', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                                    <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="alamat" name="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
                                <?php echo form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                            Daftar Account
                            </button>
                        <?php echo form_close();?>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('login')?>">Sudah mempunyai account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>