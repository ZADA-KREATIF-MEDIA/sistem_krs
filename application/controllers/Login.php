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
        $this->load->view('login/login_mahasiswa.php');
        $this->load->view('login/footer.php');
    }

    public function dosen()
    {
        $data['judul'] = "Halaman Login Dosen";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/login_dosen.php');
        $this->load->view('login/footer.php');
    }

    public function akademik()
    {
        $data['judul'] = "Halaman Login Akademik";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/login_akademik.php');
        $this->load->view('login/footer.php');
    }

    public function admin()
    {
        $data['judul'] = "Halaman Login Admin";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/login_admin.php');
        $this->load->view('login/footer.php');
    }

    public function register()
    {
        $data['judul'] = "Halaman Registrasi";
        $this->load->view('login/header.php', $data);
        $this->load->view('login/register.php');
        $this->load->view('login/footer.php');
    }

    public function login_mahasiswa()
    {
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['judul'] = "Halaman Login Mahasiswa";
            $this->load->view('login/header.php', $data);
            $this->load->view('login/login_mahasiswa.php');
            $this->load->view('login/footer.php');
        }
        else
        {
            $nim = $this->input->post('nim',true);
            $password = $this->input->post('password',true);
            $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();
            // print('<pre>');print_r($mahasiswa);exit();
            if($mahasiswa) {
                if(password_verify($password, $mahasiswa['password'])) {
                    //echo "sini";
                    $data = [
                        'mhs_id'    => $mahasiswa['id'],
                        'mhs_nim'   => $mahasiswa['nim'],
                        'nama'      => $mahasiswa['nama'],
                        'level'     => 'mahasiswa'
                    ];
                    $this->session->set_userdata($data);
                    redirect('/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM atau Password Salah</div>');
                    redirect('login');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM tidak ditemukan</div>');
                redirect('login');
            } 
        }
        
    }

    public function login_dosen()
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Dosen', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['judul'] = "Halaman Login Dosen";
            $this->load->view('login/header.php', $data);
            $this->load->view('login/login_dosen.php');
            $this->load->view('login/footer.php');
        }
        else
        {
            $nip = $this->input->post('nip',true);
            $password = $this->input->post('password',true);
            $dosen = $this->db->get_where('dosen', ['nip' => $nip])->row_array();
            // print('<pre>');print_r($dosen);exit();
            if($dosen) {
                if(password_verify($password, $dosen['password'])) {
                    //echo "sini";
                    $data = [
                        'dosen_id'      => $dosen['id'],
                        'dosen_nip'     => $dosen['nim'],
                        'nama'          => $dosen['nama'],
                        'level'         => $dosen['jabatan']
                    ];
                    $this->session->set_userdata($data);
                    redirect('/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Induk Dosen atau Password Salah</div>');
                    redirect('login/dosen');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Induk Dosen tidak ditemukan</div>');
                redirect('login/dosen');
            } 
        }
        
    }

    public function login_akademik()
    {
        $this->form_validation->set_rules('nia', 'Nomor Induk Akademik', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['judul'] = "Halaman Login Akademik";
            $this->load->view('login/header.php', $data);
            $this->load->view('login/login_akademik.php');
            $this->load->view('login/footer.php');
        }
        else
        {
            $nia = $this->input->post('nia',true);
            $password = $this->input->post('password',true);
            $akademik = $this->db->get_where('akademik', ['nia' => $nia])->row_array();
            if($akademik) {
                if(password_verify($password, $akademik['password'])) {
                    //echo "sini";
                    $data = [
                        'mhs_id'    => $akademik['id'],
                        'mhs_nia'   => $akademik['nia'],
                        'nama'      => $akademik['nama'],
                        'level'     => 'akademik'
                    ];
                    $this->session->set_userdata($data);
                    redirect('/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Induk Akademik atau Password Salah</div>');
                    redirect('login/akademik');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomor Induk Akademik tidak ditemukan</div>');
                redirect('login/akademik');
            } 
        }
        
    }

    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['judul'] = "Halaman Login Admin";
            $this->load->view('login/header.php', $data);
            $this->load->view('login/login_admin.php');
            $this->load->view('login/footer.php');
        }
        else
        {
            $username = $this->input->post('username',true);
            $password = $this->input->post('password',true);
            $admin = $this->db->get_where('admin', ['username' => $username])->row_array();
            // print('<pre>');print_r($mahasiswa);exit();
            if($admin) {
                if(password_verify($password, $admin['password'])) {
                    //echo "sini";
                    $data = [
                        'admin_id'   => $admin['id'],
                        'admin_username' => $admin['username'],
                        'level'    => 'admin'
                    ];
                    $this->session->set_userdata($data);
                    redirect('/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password Salah</div>');
                    redirect('login/admin');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan</div>');
                redirect('login/admin');
            } 
        }
        
    }

    public function logout()
	{
        $level = $this->session->userdata('level');
        if($level == "mahasiswa"){
            session_destroy();
            redirect('/');
        }else if($level == "akademik"){
            session_destroy();
            redirect('login/akademik');
        }else if($level == "dosen" || $level == "sekjur" || $level == "kajur" ){
            session_destroy();
            redirect('login/dosen');
        }else{
            session_destroy();
            redirect('login/admin');
        }
	}

    public function save_register_mahasiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('no_tlpn', 'Nomor telephone', 'required|numeric');
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