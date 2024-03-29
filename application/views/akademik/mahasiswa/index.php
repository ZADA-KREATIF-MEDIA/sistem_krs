<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Mahasiswa</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('admin/tambah_mahasiswa')?>" class="btn btn-success float-right"><i class="fas fa-plus"></i>&nbsp;Tambah Mahasiswa</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telephone</th>
                            <th>Tanggal Masuk</th>
                            <th>Dosen Pembimbing</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($mahasiswa as $mhs):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $mhs['nim'];?></td>
                                <td><?php echo $mhs['nama_mahasiswa'];?></td>
                                <td><?php echo $mhs['jk_mahasiswa'];?></td>
                                <td><?php echo $mhs['no_hp_mhs'];?></td>
                                <td><?php echo $mhs['tgl_masuk_mahasiswa'];?></td>
                                <td>
                                    <?php 
                                        if($mhs['nama_dosen'] == ""){
                                            echo "Belum ada dosen pembimbing";
                                        }else{
                                            echo $mhs['nama_dosen'];
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                <a href="<?php echo base_url('akademik/view_mahasiswa/').$mhs['id_mahasiswa']?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="<?php echo base_url('admin/edit_mahasiswa/').$mhs['id_mahasiswa']?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/hapus_mahasiswa/').$mhs['id_mahasiswa']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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