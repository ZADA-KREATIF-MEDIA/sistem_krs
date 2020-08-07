<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Akademik</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahAkademik"><i class="fas fa-plus"></i>&nbsp;Tambah Akademik</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIA</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($akademik as $akd):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $akd['nia'];?></td>
                                <td><?php echo $akd['nama'];?></td>
                                <td class="text-center">
                                    <a href="#editAkademik<?php echo $akd['id'];?>" data-toggle="modal" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('akademik/hapus_akademik/').$akd['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
</div>
<!-- /.container-fluid -->
<!-- Modal Tambah Akademik -->
<div class="modal fade" id="tambahAkademik" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('akademik/simpan_akademik');?>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nia">NIA</label>
                        <input type="text" class="form-control" id="nia" name="nia" placeholder="Masukkan Nomor Induk Akademik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-uppercase">simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>

<!-- Modal Edit Akademik -->
<?php foreach($akademik as $akd):?>
<div class="modal fade" id="editAkademik<?php echo $akd['id'];?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('akademik/update_akademik');?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nia">NIA</label>
                    <input type="text" class="form-control" id="nia" name="nia" placeholder="Masukkan Nomor Induk Akademik" required value="<?php echo $akd['nia'];?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required value="<?php echo $akd['nama']; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="<?php echo $akd['id'];?>">
                <button type="submit" class="btn btn-success text-uppercase">simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<?php endforeach;?>