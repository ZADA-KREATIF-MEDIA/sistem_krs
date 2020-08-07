<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_dosen','mod');
    }

    public function index()
    {
        $data['halaman']    = "Data Dosen";
        $data['dosen']  = $this->mod->m_get_all_dosen();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_dosen()
    {
        $data['halaman']    = "Tambah Data Dosen";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/tambah.php');
        $this->load->view('footer.php');
    }

    public function simpan_dosen()
    {
        $this->form_validation->set_rules('nama', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'Nomor Induk Dosen', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telephone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Tambah Data Dosen";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('dosen/tambah.php');
            $this->load->view('footer.php');
        }else{
            $post = [
                'nip' => $this->input->post('nip', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'password' => password_hash($this->input->post('password', true),PASSWORD_DEFAULT),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'alamat' => $this->input->post('alamat', true),
                'tgl_masuk'=> date("Y-m-d"),
                'nomor_telephone' => $this->input->post('no_tlpn', true),
                'agama' => $this->input->post('agama', true),
                'email' => $this->input->post('email', true),
                'tgl_lahir' => date("Y-m-d", strtotime($this->input->post('tgl_lahir', true))),
                'jabatan'   => $this->input->post('jabatan', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_simpan_dosen($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Dosen Berhasil</div>');
            redirect('dosen');
        }
    }

    public function edit_dosen()
    {
        $id = $this->uri->segment(3);
        $data['dosen'] = $this->mod->m_get_dosen_by($id);
        $data['halaman']    = "Edit Data Dosen";
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/edit.php', $data);
        $this->load->view('footer.php');
    }

    public function update_dosen()
    {
        $this->form_validation->set_rules('nama', 'Nama Dosen', 'required');
        $this->form_validation->set_rules('nip', 'Nomor Induk Dosen', 'required|numeric');
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telephone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $id = $this->uri->segment(3);
            $data['dosen'] = $this->mod->m_get_dosen_by($id);
            $data['halaman']    = "Edit Data Dosen";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('dosen/edit.php', $data);
            $this->load->view('footer.php');
        }else{
            $post = [
                'id'                => $this->input->post('id'),
                'nip'               => $this->input->post('nip', TRUE),
                'nama'              => $this->input->post('nama', TRUE),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin', true),
                'alamat'            => $this->input->post('alamat', true),
                'tgl_masuk'         => date("Y-m-d"),
                'nomor_telephone'   => $this->input->post('no_tlpn', true),
                'agama'             => $this->input->post('agama', true),
                'email'             => $this->input->post('email', true),
                'tgl_lahir'         => date("Y-m-d", strtotime($this->input->post('tgl_lahir', true))),
                'jabatan'           => $this->input->post('jabatan', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_dosen($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Dosen Berhasil</div>');
            redirect('dosen');
        }
    }

    public function hapus_dosen()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_dosen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Dihapus</div>');
        redirect('mahasiswa');
    }
}