<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2>Semester Aktif</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($semester as $smst):?>
                            <tr>
                                <td><?php echo strtoupper($smst['semester']);?></td>
                                <td><?php echo $smst['tahun_ajaran'];?></td>
                                <td><button class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#updateSemester"><i class="fas fa-edit mr-1"></i>Edit</button></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal Edit Semester -->
<?php foreach($semester as $smst):?>
    <div class="modal fade" id="updateSemester" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('admin/update_semester');?>
                <input type="hidden" name="id" value="<?php echo $smst['id'];?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="ganjil" <?php if($smst['semester'] == "ganjil"){ echo "selected"; }?>>Ganjil</option>
                            <option value="genap" <?php if($smst['semester'] == "genap"){ echo "selected"; } ?>>Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" value="<?php echo $smst['tahun_ajaran'];?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success text-uppercase">update</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
<?php endforeach;?>
