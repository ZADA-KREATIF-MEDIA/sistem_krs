<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Matakuliah</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
    <div class="card-header  bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Daftar Mata Kuliah Yang di Ampu</h6>
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
                                    <a href="<?php echo base_url('dosen/view_mahasiswa/').$mat['id']?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                  
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