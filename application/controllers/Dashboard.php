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
        $this->load->view('head.php');
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dashboard/index.php');
        $this->load->view('footer.php');
    }
}