<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Halaman Login";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/login.php');
        $this->load->view('login/footer.php');
    }

    public function register()
    {
        $data['judul'] = "Halaman Registrasi";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/register.php');
        $this->load->view('login/footer.php');
    }
}