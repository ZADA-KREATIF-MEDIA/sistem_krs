<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Matakuliah</h1>
    <?php echo form_open('mahasiswa/ambil_matkul');?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="submit" class="btn btn-success float-right"><i class="fas fa-plus"></i>&nbsp;Ambil</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Jam</th>
                                <th>Kelas</th>
                                <th>SKS</th>
                                <th>Tipe</th>
                                <th>Semester</th>
                                <th>Ambil</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($matkul > 0 ):?>
                            <?php 
                                $i = 1;
                                foreach($matkul as $mat):?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $mat['kode_matkul'];?></td>
                                    <td><?php echo $mat['nama'];?></td>
                                    <td><?php echo $mat['jam_mulai']."-".$mat['jam_selesai'];?></td>
                                    <td><?php echo $mat['kelas'];?></td>
                                    <td><?php echo $mat['sks'];?></td>
                                    <td><?php echo $mat['tipe'];?></td>
                                    <td><?php echo ucwords($mat['semester']);?></td>
                                    <td class="text-center"><input type="checkbox" name="matkul_pilih[]" value="<?php echo $mat['id'];?>"></td>
                                </tr>
                            <?php
                                $i++;
                                endforeach;?>
                        <?php endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php echo form_close();?>
</div>
<!-- /.container-fluid -->