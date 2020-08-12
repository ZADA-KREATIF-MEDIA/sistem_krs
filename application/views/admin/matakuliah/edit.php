<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Data Matakuliah</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Matakuliah</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('admin/update_matakuliah');?>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="kode_matkul">Kode Matakuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" placeholder="Masukkan Kode Matakuliah" value="<?php echo $matakuliah['kode_matkul']?>">
                    <?php echo form_error('kode_matkul', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Matakuliah" value="<?php echo $matakuliah['nama']; ?>">
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" class="form-control jam" id="jam_mulai" name="jam_mulai" placeholder="Masukkan Jam Mulai" value="<?php echo $matakuliah['jam_mulai']; ?>">
                            <?php echo form_error('jam_mulai', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="text" class="form-control jam" id="jam_selesai" name="jam_selesai" placeholder="Masukkan Jam Selesai" value="<?php echo $matakuliah['jam_selesai']?>">
                            <?php echo form_error('jam_selesai', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" value="<?php echo $matakuliah['kelas'];?>" >
                            <?php echo form_error('kelas', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col">
                            <label for="sks">SKS</label>
                            <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan Sks" value="<?php echo $matakuliah['sks']?>">
                            <?php echo form_error('sks', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tipe">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="teori" <?php if($matakuliah['tipe'] == "teori"){ echo "selected"; }?>>Teori</option>
                        <option value="praktik" <?php if($matakuliah['tipe'] == "praktik"){ echo "selected"; }?>>Praktik</option>
                        <option value="praktikum" <?php if($matakuliah['tipe'] == "praktikum"){ echo "selected"; }?>>Praktikum</option>
                    </select>
                    <?php echo form_error('tipe', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="aktif" <?php if($matakuliah['status'] == "aktif"){ echo "selected"; }?>>Aktif</option>
                        <option value="tidak" <?php if($matakuliah['status'] == "tidak"){ echo "selected"; }?>>Tidak</option>
                    </select>
                    <?php echo form_error('status', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $matakuliah['id'];?>">
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('admin/matakuliah');?>" class="btn btn-dark text-uppercase">kembali</a>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->