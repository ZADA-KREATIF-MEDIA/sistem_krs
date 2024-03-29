<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Portofolio</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <select name="semester" id="semester">
                    <option>--- Pilih Semester ---</option>
                    <option value="ganjil" <?php if($this->uri->segment(3) == "ganjil"){ echo "selected";}?>>Ganjil 2019/2020</option>
                    <option value="genap" <?php if($this->uri->segment(3) == "genap"){ echo "selected";}?>>Genap 2020/2021</option>
                </select>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Matakuliah</th>
                                <th>Nilai</th>
                                <th>Semester</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                            foreach($transkip as $tr):?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $tr['nama'];?></td>
                                    <td><?php echo $tr['nilai'];?></td>
                                    <td><?php echo ucwords($tr['semester']);?></td>
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