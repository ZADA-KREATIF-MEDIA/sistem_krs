<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Matakuliah Diambil</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('mahasiswa/krs_perwalian/');?><?php echo $this->session->userdata('mhs_id')."/".$this->session->userdata('mhs_id_dosen');?>" class="btn btn-dark">Perwalian</a>
            <a href="<?php echo base_url('mahasiswa/daftar_matakuliah')?>" class="btn btn-success float-right"><i class="fas fa-plus"></i>&nbsp;Ambil Matakuliah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Matakuliah</th>
                            <th>Nama Matakuliah</th>
                            <th>Jam</th>
                            <th>Kelas</th>
                            <th>SKS</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
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
                                <td><?php echo $mat['kelas'];?></td>
                                <td><?php echo $mat['sks'];?></td>
                                <td><?php echo $mat['tipe'];?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('mahasiswa/hapus_matakuliah_diambil/').$mat['id']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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