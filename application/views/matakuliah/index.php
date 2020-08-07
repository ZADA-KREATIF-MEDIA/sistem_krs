<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Matakuliah</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('matakuliah/tambah_matakuliah')?>" class="btn btn-success float-right" ><i class="fas fa-plus"></i>&nbsp;Tambah Matakuliah</a>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($matakuliah as $mat):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $mat['kode_matkul'];?></td>
                                <td><?php echo $mat['nama'];?></td>
                                <td><?php echo $mat['jam_mulai']."-".$mat['jam_selesai'];?></td>
                                <td><?php echo ucwords($mat['tipe']);?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('matakuliah/edit_matakuliah/').$mat['id']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('matakuliah/hapus_matakuliah/').$mat['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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