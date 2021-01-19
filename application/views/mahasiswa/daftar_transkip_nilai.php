<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Transkip Nilai</h1>
    <?php echo form_open('mahasiswa/ambil_matkul');?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Matakuliah</th>
                                <th>Nilai</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $total_sks = 0;
                            foreach($transkip as $tr):?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $tr['nama'];?></td>
                                    <td><?php echo $tr['nilai'];?></td>
                                    <td><?php echo ucwords($tr['sks']);?></td>
                                </tr>
                            <?php
                                $total_sks += $tr['sks'];
                                $i++;
                            endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">Jumlah SKS Diambil</td>
                                <td><?php echo $total_sks; ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <?php echo form_close();?>
</div>
<!-- /.container-fluid -->