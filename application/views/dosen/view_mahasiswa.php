<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">DATA MAHASISWA</h1>
   

    
    <div class="card shadow mb-4">
        <div class="card-header  bg-success py-3">
            <h6 class="m-0 font-weight-bold text-white">Data Mahasiswa</h6>
            
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i = 1;
                            foreach($matkul_ambil as $mat):?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $mat['nim'];?></td>
                                <td><?php echo $mat['nama'];?></td>
                                <td>
                                <?php 
                                if($mat['nilai']!=null)
                                {
                                     echo $mat['nilai'];
                                }
                                else
                                {
                                    echo "belum ada nilai";
                                }
                                ?>
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
<!-- /.container-fluid -->
<!-- /.container-fluid -->

