<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perwalian</h1>
  
        <div class="card shadow mb-4">
        <div class="card-header  bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Daftar KRS Mahasiswa</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
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
                                   
                                    <td><?php echo $per['nama'];?></td>
                                    <td><?php echo date("Y-m-d", strtotime($per['tgl_perwalian']));?></td>
                                    <td><?php echo $per['tahun_ajaran'];?></td>
                                    <td><?php echo $per['semester'];?></td>
                                    <td>
                                        <?php 
                                            if($per['status'] == 0)
                                            {
                                                echo "Belum di acc";
                                            } else {
                                                echo "Sudah di acc";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                   
                                    <div class="form-group">
                                    <a href="<?php echo base_url('dosen/view_krs/').$per['id_mahasiswa']?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    
   <a data-toggle="modal" data-target="#tambah-data<?php echo $per['id']; ?>" class="btn btn-primary text-white btn-sm">Beri Catatan KRS</a>
   <a data-toggle="modal" data-target="#tambah-data2<?php echo $per['id']; ?>" class="btn btn-danger text-white btn-sm">Setujui KRS</a>

   
  </div>
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
   

<!-- /.container-fluid -->
<!-- Modal -->
 <!-- Modal Tambah -->
 <?php 
foreach($perwalian as $per):?>
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data<?php echo $per['id']; ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                 <h6 class="modal-title">Tambah Catatan Mahasiswa</h6>
             </div>
             <form class="form-horizontal" action="<?php echo base_url('dosen/catatan')?>" method="post" role="form">
              <div class="modal-body">
                      <div class="form-group">
                         <input type="hidden" name="id" value="<?php echo $per['id'];?>">
                         
                         <strong>CATATAN DOSEN :</strong>
                         <hr>
                         <h5><?php echo $per['catatan'];?></h5>
                         <hr>
                        <div class="form-group"><label for="exampleFormControlTextarea1">Catatan</label>
                        <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea></div>
                      </div>
                   
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                  </div>
                 </form>
             </div>
         </div>
     </div>
<?php endforeach;?>

<?php 
foreach($perwalian as $per):?>   <!-- Modal Tambah -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-data2<?php echo $per['id']; ?>" class="modal fade">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                 <h6 class="modal-title">Setujui KRS</h6>
             </div>
             <form class="form-horizontal" action="<?php echo base_url('dosen/status_krs')?>" method="post" role="form">
              <div class="modal-body">
                      <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $per['id'];?>">
                        
                        <div class="form-group">
        <label for="exampleFormControlSelect1">Pilihan</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status">
            <option value="1">Setujui KRS</option>
           
        </select>
    </div>
                      </div>
                   
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                      <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                  </div>
                 </form>
             </div>
         </div>
     </div>
     <?php endforeach;?>



