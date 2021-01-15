<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View Detail Data</h1>
    <div class="card shadow mb-4">
        <div class="card-header bg-danger py-3">
            <h6 class="m-0 font-weight-bold text-white">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan Nomor Induk Mahasiswa" value="<?php echo $mahasiswa["nim"]; ?>" readOnly>
                    <?php echo form_error('nim', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Mahasiswa" value="<?php echo $mahasiswa["nama"]; ?>" readOnly>
                    <?php echo form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="no_tlpn">Nomor Telephone</label>
                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" placeholder="Nomor Telephone" value="<?php echo $mahasiswa["nomor_telephone"]; ?>" readOnly>
                    <?php echo form_error('no_tlpn', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Mahasiswa" value="<?php echo $mahasiswa["email"]; ?>" readOnly>
                    <?php echo form_error('email', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" disabled>
                        <option value="laki-laki" <?php if($mahasiswa["jenis_kelamin"]=="laki-laki"){echo "selected";}?>>Laki - laki</option>
                        <option value="perempuan" <?php if($mahasiswa["jenis_kelamin"]=="perempuan"){echo "selected";}?>>Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="agama">Agama</label>
                    <select name="agama" id="agama" class="form-control" disabled>
                        <option value="islam" <?php if($mahasiswa["agama"]=="islam"){echo"selected";}?>>Islam</option>
                        <option value="kristen" <?php if($mahasiswa["agama"]=="kristen"){echo"selected";}?>>Kristen</option>
                        <option value="katholik" <?php if($mahasiswa["agama"]=="katholik"){echo"selected";}?>>Katholik</option>
                        <option value="hindu" <?php if($mahasiswa["agama"]=="hindu"){echo"selected";}?>>Hindu</option>
                        <option value="budha" <?php if($mahasiswa["agama"]=="budha"){echo"selected";}?>>Budha</option>
                        <option value="konghucu" <?php if($mahasiswa["agama"]=="konghucu"){echo"selected";}?>>Konghucu</option>
                    </select>
                    <?php echo form_error('agama', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="dosen_pembimbing">Jenis Kelamin</label>
                    <select name="dosen_pembimbing" id="dosen_pembimbing" class="form-control" disabled>
                        <?php foreach($dosen as $dsn):?>
                            <option value="<?php echo $dsn['id']?>" <?php if($mahasiswa["id_dosen"] == $dsn["id"]){ echo "selected"; }?>><?php echo $dsn['nama'];?></option>
                        <?php endforeach;?>
                    </select>
                    <?php echo form_error('dosen_pembimbing', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="form-group col-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" readOnly><?php echo $mahasiswa["alamat"]; ?></textarea>
                    <?php echo form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
            </div>
            <!--<input type="hidden" name="id" value="<?php echo $mahasiswa['id'];?>">
            <button class="btn btn-success text-uppercase">simpan</button>
            <a href="<?php echo base_url('admin/mahasiswa');?>" class="btn btn-dark text-uppercase">kembali</a>
          -->
        </div>

    
    </div>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    
    <div class="card shadow mb-4">
        <div class="card-header  bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Transkip Nilai Matakuliah</h6>
            
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jam</th>
                            <th>Tipe</th>
                            <th>Semester</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($matkul_ambil as $mat):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $mat['kode_matkul'];?></td>
                                <td><?php echo $mat['nama'];?></td>
                                <td><?php echo $mat['jam_mulai']."-".$mat['jam_selesai'];?></td>
                                <td><?php echo ucwords($mat['tipe']);?></td>
                                <td><?php echo $mat['semester']; ?></td>
                                <td>
                                <?php 
                                if($mat['nilai']!=null)
                                {
                                    echo $mat['nilai'];
                                }
                                else
                                {
                                    echo "belum ada nilai";
                                }
                                ?>
                                </td>
                                
                            </tr>
                        <?php
                            $i++;
                            endforeach;?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header  bg-primary py-3">
            <h6 class="m-0 font-weight-bold text-white">Mata kuliah di ambil</h6>
            
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jam</th>
                            <th>Tipe</th>
                            <th>Semester</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($matkul_krs as $matkrs):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $matkrs['kode_matkul'];?></td>
                                <td><?php echo $matkrs['nama'];?></td>
                                <td><?php echo $matkrs['jam_mulai']."-".$matkrs['jam_selesai'];?></td>
                                <td><?php echo ucwords($matkrs['tipe']);?></td>
                                <td><?php echo $matkrs['semester']; ?></td>
                            </tr>
                        <?php
                            $i++;
                            endforeach;?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<!-- /.container-fluid -->
<!-- /.container-fluid -->

