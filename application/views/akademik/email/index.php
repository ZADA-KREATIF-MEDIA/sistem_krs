<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Akademik</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#kirimEmail"><i class="fas fa-paper-plane"></i>&nbsp;Kirim Pesan</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penerima</th>
                            <th>Pengirim</th>
                            <th>Tanggal Kirim</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($email as $email):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $email['penerima'];?></td>
                                <td><?php echo $email['pengirim'];?></td>
                                <td><?php echo $email['tanggal_kirim']?></td>
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
<!-- Modal Tambah Akademik -->
<div class="modal fade" id="kirimEmail" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kirim Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('akademik/kirim_email');?>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="penerima">Email Penerima</label>
                        <input type="email" class="form-control" id="penerima" name="penerima" placeholder="Masukkan Email Penerima" required>
                    </div>
                    <div class="form-group">
                        <label for="pengirim">Nama</label>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan Nama" value="<?php echo $this->session->userdata('level'); ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" placeholder="Masukkan Pesan"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-uppercase">simpan</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
