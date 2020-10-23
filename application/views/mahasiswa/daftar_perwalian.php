<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perwalian</h1>
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
                                <th>Tanggal Perwalian</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                            foreach($perwalian as $per):?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <?php if($per['tgl_perwalian'] == "0000-00-00"):?>
                                        <td>-</td>
                                    <?php else:?>
                                        <td><?php echo date("Y-m-d", strtotime($per['tgl_perwalian']));?></td>
                                    <?php endif;?>
                                    <td><?php echo $per['tahun_ajaran'];?></td>
                                    <td><?php echo $per['semester'];?></td>
                                    <td>
                                        <?php 
                                            if($per['status'] == 0){
                                                echo "Belum di acc";
                                            } else {
                                                echo "Sudah di acc";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info" title="lihat catatan dosen" onclick="lihatCatatan(<?php echo $per['id'];?>)"><i class="fas fa-sticky-note"></i></button>
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
    <?php echo form_close();?>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="catatanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea  id="catatanDosen" class="form-control" readonly></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>