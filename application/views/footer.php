            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website <?php echo date("Y")?></span>
                </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika kamu siap untuk mengakhiri session sekarang.</div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('login/logout')?>">Logout</a>
            </div>
        </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <!-- JQuery UI -->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery-ui/jquery-ui.js"></script>
        
    <!-- Jquery Mask -->
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery-mask/src/jquery.mask.js"></script>

    <script>
        <?php if($this->uri->segment(1) == "dashboard"):?>
            function gotoPerwalian(){
                window.location.href = "<?php echo base_url('mahasiswa/krs'); ?>";
            }
        <?php endif;?>
        <?php if(($this->uri->segment(1) == "admin") && ($this->uri->segment(2) == "tambah_dosen")):?>
            $( function() {
                $( "#tanggal_lahir" ).datepicker({
                    dateFormat: 'dd-mm-yy'
                });  
                $('.jam').mask('00:00');
            } );
        <?php endif;?>
        <?php if(($this->uri->segment(1) == "mahasiswa") && ($this->uri->segment(2) == "krs")):?>
            let lihatCatatan = (id) => {
                $.ajax({
                    url: "<?php echo base_url('mahasiswa/krs_catatan')?>",
                    method: "POST",
                    data: {id: id},
                    success: function(res){
                        let hasil = $.parseJSON(res);
                        console.log(hasil);
                        if(hasil['catatan'] == ""){
                            Swal.fire({
                                icon: 'error',
                                text: 'Belum ada catatan dari dosen'
                            })
                        }else{
                            $("#catatanDosen").text(hasil['catatan']);
                            $('#catatanModal').modal('show')
                        }
                    }
                })
            }
        <?php endif;?>
        <?php if(($this->uri->segment(1) == "mahasiswa") && ($this->uri->segment(2) == "portofolio")):?>
            var semester
            $("#semester").change(function(){
                semester = $(this).val();
                kirimSemester();
            });

            function kirimSemester(){
                console.log(semester);
                window.location.href = '<?php echo base_url(); ?>mahasiswa/portofolio/'+semester;
            }
       
        <?php endif;?>
    </script>
</body>

</html>
