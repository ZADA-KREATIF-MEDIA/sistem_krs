<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Mahasiswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('mahasiswa/simpan_mahasiswa');?>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nomor Induk Mahasiswa">
                    <?php echo form_error('nim', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa">
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    <?php echo form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="passconf">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Masukkan Kembali Password">
                    <?php echo form_error('passconf', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="no_tlpn">Nomor Telephone</label>
                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" placeholder="Nomor Telephone">
                    <?php echo form_error('no_tlpn', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Mahasiswa">
                    <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="laki-laki">Laki - laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="katholik">Katholik</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">Konghucu</option>
                    </select>
                    <?php echo form_error('agama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    <?php echo form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('mahasiswa');?>" class="btn btn-dark text-uppercase">kembali</a>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->