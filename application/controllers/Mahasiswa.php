<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_mahasiswa','mod');
        
    }

    public function index()
    {
        $data['halaman']    = "Data Mahasiswa";
        $data['mahasiswa']  = $this->mod->m_get_all_mahasiswa();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_mahasiswa()
    {
        $data['halaman']    = "TambahData Mahasiswa";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/tambah.php', $data);
        $this->load->view('footer.php');
    }

    public function simpan_mahasiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telephone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "TambahData Mahasiswa";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('mahasiswa/tambah.php', $data);
            $this->load->view('footer.php');
        }else{
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
            $this->mod->m_simpan_mahasiswa($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Mahasiswa Berhasil</div>');
            redirect('mahasiswa');
        }
    }

    public function edit_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $data['mahasiswa'] = $this->mod->m_get_mahasiswa_by($id);
        // print('<pre>');print_r($data);exit();
        $data['halaman']    = "Edit Data Mahasiswa";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/edit.php', $data);
        $this->load->view('footer.php');
    }

    public function update_mahasiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telephone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Edit Data Mahasiswa";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('mahasiswa/edit.php', $data);
            $this->load->view('footer.php');
        }else{
            $post = [
                'id'    => $this->input->post('id', true),
                'nim' => $this->input->post('nim', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'tgl_masuk'=> date("Y-m-d"),
                'nomor_telephone' => $this->input->post('no_tlpn', true),
                'agama' => $this->input->post('agama', true),
                'email' => $this->input->post('email', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_mahasiswa($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Mahasiswa Berhasil</div>');
            redirect('mahasiswa');
        }
    }

    public function hapus_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_mahasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Dihapus</div>');
        redirect('mahasiswa');
    }
}