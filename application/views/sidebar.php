<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
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
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Menu Admin -->
    <?php if($this->session->userdata('level') == "admin"):?>
        <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Users
            </div>
            <!-- Nav Item - Users -->
            <li class="nav-item <?php if($this->uri->segment(2) == "mahasiswa"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('admin/mahasiswa');?>">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "dosen"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('admin/dosen');?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "akademik"){echo "active";}?>">
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
            <li class="nav-item <?php if($this->uri->segment(2) == "matakuliah"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('admin/matakuliah');?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Matakuliah</span>
                </a>
            </li>
        <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Email
            </div>
            <li class="nav-item <?php if($this->uri->segment(2) == "email"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('admin/email');?>">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Email</span>
                </a>
            </li>
    <?php endif;?>
    <!-- Menu Mahasiswa -->
    <?php if($this->session->userdata('level') == "mahasiswa"):?>
        <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Matakuliah
            </div>
            <li class="nav-item <?php if($this->uri->segment(2) == "matakuliah"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('mahasiswa/matakuliah');?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Matakuliah</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "transkip_nilai"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('mahasiswa/transkip_nilai');?>">
                <i class="fas fa-fw fa-print"></i>
                <span>Transkip Nilai</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "portofolio"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('mahasiswa/portofolio');?>">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Portofolio</span></a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "krs"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('mahasiswa/krs');?>">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Perwalian</span></a>
            </li>
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif;?>

    <?php if($this->session->userdata('level') == "dosen" || $this->session->userdata('level') == "sekjur" || $this->session->userdata('level') == "kajur") :?>
        <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                MENU NAVIGASI DOSEN
            </div>
            <li class="nav-item <?php if($this->uri->segment(2) == "mahasiswa"){echo "active";}?>">
                <a class="nav-link " href="<?php echo base_url('dosen/mahasiswa');?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "krs"){echo "active";}?>">
                <a class="nav-link " href="<?php echo base_url('dosen/krs');?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data KRS Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item <?php if($this->uri->segment(2) == "matakuliah"){echo "active";}?>">
                <a class="nav-link" href="<?php echo base_url('dosen/matakuliah');?>">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Mata kuliah & Nilai</span>
                </a>
            </li>
        
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif;?>
    <?php if($this->session->userdata('level') == "akademik"):?>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item <?php if($this->uri->segment(2) == "matakuliah"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('akademik/matakuliah');?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Mata Kuliah</span>
            </a>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2) == "mahasiswa"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('akademik/mahasiswa');?>">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Mahasiswa</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
                Email
        </div>
        <li class="nav-item <?php if($this->uri->segment(2) == "email"){echo "active";}?>">
            <a class="nav-link" href="<?php echo base_url('akademik/email');?>">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Email</span>
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