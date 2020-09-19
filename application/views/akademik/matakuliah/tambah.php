<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Matakuliah</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Matakuliah</h6>
        </div>
        <div class="card-body">
            <?php echo form_open('admin/simpan_matakuliah');?>
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="kode_matkul">Kode Matakuliah</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" placeholder="Masukkan Kode Matakuliah">
                    <?php echo form_error('kode_matkul', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Matakuliah">
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="jam_mulai">Jam Mulai</label>
                            <input type="text" class="form-control jam" id="jam_mulai" name="jam_mulai" placeholder="Masukkan Jam Mulai">
                            <?php echo form_error('jam_mulai', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col">
                            <label for="jam_selesai">Jam Selesai</label>
                            <input type="text" class="form-control jam" id="jam_selesai" name="jam_selesai" placeholder="Masukkan Jam Selesai">
                            <?php echo form_error('jam_selesai', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="kelas">Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas">
                            <?php echo form_error('kelas', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col">
                            <label for="sks">SKS</label>
                            <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan Sks">
                            <?php echo form_error('sks', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="tipe">Tipe</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option value="teori">Teori</option>
                        <option value="praktik">Praktik</option>
                        <option value="praktikum">Praktikum</option>
                    </select>
                    <?php echo form_error('tipe', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <div class="row">
                        <div class="col">
                            <label for="semester">Semester</label>
                            <select name="semester" id="semester" class="form-control">
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                            <?php echo form_error('semester', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                        <div class="col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            <?php echo form_error('status', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('admin/matakuliah');?>" class="btn btn-dark text-uppercase">kembali</a>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->