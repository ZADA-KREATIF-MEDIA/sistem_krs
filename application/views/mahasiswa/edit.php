<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Mahasiswa</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Mahasiswa</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('mahasiswa/update_mahasiswa');?>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nomor Induk Mahasiswa" value="<?php echo $mahasiswa["nim"]; ?>">
                    <?php echo form_error('nim', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="<?php echo $mahasiswa["nama"]; ?>">
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="no_tlpn">Nomor Telephone</label>
                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" placeholder="Nomor Telephone" value="<?php echo $mahasiswa["nomor_telephone"]; ?>">
                    <?php echo form_error('no_tlpn', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Mahasiswa" value="<?php echo $mahasiswa["email"]; ?>">
                    <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="laki-laki" <?php if($mahasiswa["jenis_kelamin"]=="laki-laki"){echo "selected";}?>>Laki - laki</option>
                        <option value="perempuan" <?php if($mahasiswa["jenis_kelamin"]=="perempuan"){echo "selected";}?>>Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="islam" <?php if($mahasiswa["agama"]=="islam"){echo"selected";}?>>Islam</option>
                        <option value="kristen" <?php if($mahasiswa["agama"]=="kristen"){echo"selected";}?>>Kristen</option>
                        <option value="katholik" <?php if($mahasiswa["agama"]=="katholik"){echo"selected";}?>>Katholik</option>
                        <option value="hindu" <?php if($mahasiswa["agama"]=="hindu"){echo"selected";}?>>Hindu</option>
                        <option value="budha" <?php if($mahasiswa["agama"]=="budha"){echo"selected";}?>>Budha</option>
                        <option value="konghucu" <?php if($mahasiswa["agama"]=="konghucu"){echo"selected";}?>>Konghucu</option>
                    </select>
                    <?php echo form_error('agama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"><?php echo $mahasiswa["alamat"]; ?></textarea>
                    <?php echo form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $mahasiswa['id'];?>">
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('mahasiswa');?>" class="btn btn-dark text-uppercase">kembali</a>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->