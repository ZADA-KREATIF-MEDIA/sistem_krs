<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $this->session->userdata('level');?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($this->uri->segment(1)=="dashboard"){ echo "active"; }?>">
    <a class="nav-link" href="<?php echo base_url('dashboard')?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Menu Admin -->
    <?php if($this->session->userdata('level') == "admin"):?>
        <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Users
            </div>
            <!-- Nav Item - Users -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/mahasiswa');?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dosen');?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/akademik');?>">
                    <i class="fas fa-fw fa-university"></i>
                    <span>Akademik</span>
                </a>
            </li>
            
        <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Matakuliah
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/matakuliah');?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Matakuliah</span>
                </a>
            </li>
        <hr class="sidebar-divider">
    <?php endif;?>
    <!-- Menu Mahasiswa -->
    <?php if($this->session->userdata('level') == "mahasiswa"):?>
        <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Matakuliah
            </div>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('mahasiswa/matakuliah');?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Matakuliah</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-print"></i>
                <span>Transkip Nilai</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Catatan Dosen</span></a>
            </li>
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif;?>
    <?php if($this->session->userdata('level') == "akademik"):?>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('akademik/mahasiswa');?>">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
    <?php endif;?>

<!-- Nav Item - Tables -->

<!-- Divider -->

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->