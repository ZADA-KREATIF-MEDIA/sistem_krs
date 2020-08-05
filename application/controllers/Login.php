<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->Model('M_login','mod');
    }

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

    public function save_register_mahasiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('no_tlpn', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['judul'] = "Halaman Registrasi";
            $this->load->view('login/header.php', $data);
            $this->load->view('login/register.php');
            $this->load->view('login/footer.php');
        }
        else
        {
            $post = [
                'nim' => $this->input->post('nim', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'password' => password_hash($this->input->post('password', true),PASSWORD_DEFAULT),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'tgl_masuk'=> date("Y-m-d"),
                'nomor_telephone' => $this->input->post('no_tlpn', true),
                'agama' => $this->input->post('agama', true),
                'email' => $this->input->post('email', true)
            ];
            $this->mod->m_save_register_mahasiswa($post);
            redirect('login');
        }
    }

}