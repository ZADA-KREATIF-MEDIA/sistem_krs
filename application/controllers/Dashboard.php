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
        $this->load->view('dashboard/index.php');
        $this->load->view('footer.php');
    }
}