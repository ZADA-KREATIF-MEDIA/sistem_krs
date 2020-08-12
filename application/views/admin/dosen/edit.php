<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Dosen</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Dosen</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('admin/update_dosen');?>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan Nomor Induk Dosen" value="<?php echo $dosen["nip"]; ?>" >
                    <?php echo form_error('nip', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Dosen" value="<?php echo $dosen["nama"];?>">
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="no_tlpn">Nomor Telephone</label>
                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" placeholder="Nomor Telephone" value="<?php echo $dosen["nomor_telephone"];?>">
                    <?php echo form_error('no_tlpn', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Dosen" value="<?php echo $dosen["email"];?>">
                    <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="month" class="form-control" id="tanggal_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo date("d-m-Y",strtotime($dosen["tgl_lahir"]));?>">
                    <?php echo form_error('tgl_lahir', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control">
                        <option value="dosen" <?php if($dosen['jabatan'] == "dosen"){ echo "selected"; }?>>Dosen</option>
                        <option value="sekjur" <?php if($dosen['jabatan'] == "sekjur"){ echo "selected"; }?>>Sekretaris Jurusan</option>
                        <option value="kajur" <?php if($dosen['jabatan'] == "kajur"){ echo "selected"; }?>>Kepala Jurusan</option>
                    </select>
                    <?php echo form_error('jabatan', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="laki-laki" <?php if($dosen["jenis_kelamin"] == "laki-laki"){ echo "selected"; }?>>Laki - laki</option>
                        <option value="perempuan" <?php if($dosen["jenis_kelamin"] == "perempuan"){ echo "selected"; }?>>Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control">
                        <option value="islam" <?php if($dosen["agama"] == "islam"){ echo "selected"; }?>>Islam</option>
                        <option value="kristen" <?php if($dosen["agama"] == "kristen"){ echo "selected"; }?>>Kristen</option>
                        <option value="katholik" <?php if($dosen["agama"] == "katholik"){ echo "selected"; }?>>Katholik</option>
                        <option value="hindu" <?php if($dosen["agama"] == "hindu"){ echo "selected"; }?>>Hindu</option>
                        <option value="budha" <?php if($dosen["agama"] == "budha"){ echo "selected"; }?>>Budha</option>
                        <option value="konghucu" <?php if($dosen["agama"] == "konghucu"){ echo "selected"; }?>>Konghucu</option>
                    </select>
                    <?php echo form_error('agama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"><?php echo $dosen["alamat"]; ?></textarea>
                    <?php echo form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $dosen["id"];?>">
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('admin/dosen');?>" class="btn btn-dark text-uppercase">kembali</a>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->