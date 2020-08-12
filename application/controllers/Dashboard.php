<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        $data['halaman'] = "Dashboard";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        if($this->session->userdata('level') == "admin"){
            $this->load->view('dashboard/index.php');
        }else if($this->session->userdata('level') == "akademik"){
            $this->load->view('dashboard/index_akademik');
        }else if($this->session->userdata('level') == "dosen"){
            $this->load->view('dashboard/index_dosen');
        }else{
            $this->load->view('dashboard/index_mahasiswa');
        }
        $this->load->view('footer.php');
    }
}