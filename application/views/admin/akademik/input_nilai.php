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
                            <th>Kode MK</th>
                            <th>Tipe MK</th>
                            <th>Nama Matakuliah</th>
                            <th>Status</th>
                            <th>Jam</th>
                            <th>Kelas</th>
                            <th>sks</th>
                            
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($matakuliah as $data):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $data['kode_matkul'];?></td>
                                <td><?php echo $data['tipe'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td><?php echo $data['jam_mulai'];?>-<?php echo $data['jam_selesai'];?></td>
                                <td><?php echo $data['kelas'];?></td>
                                <td><?php echo $data['sks'];?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('akademik/hapus_akademik/').$data['kode_matkul']?>" data-toggle="modal" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo base_url('akademik/hapus_akademik/').$data['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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