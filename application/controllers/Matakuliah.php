<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_matakuliah','mod');
    }

    public function index()
    {
        $data['halaman']    = "Data Matakuliah";
        $data['matakuliah']  = $this->mod->m_get_all_matakuliah();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('matakuliah/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_matakuliah()
    {
        $data['halaman']    = "Tambah Data Matakuliah";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('matakuliah/tambah.php', $data);
        $this->load->view('footer.php');
    }

    public function simpan_matakuliah()
    {
        $this->form_validation->set_rules('kode_matkul', 'Kode Matakuliah', 'required');
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Tambah Data Matakuliah";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('matakuliah/tambah.php', $data);
            $this->load->view('footer.php');
        }else{
            $post = [
                'kode_matkul'   => $this->input->post('kode_matkul', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'jam_mulai'     => $this->input->post('jam_mulai', true),
                'jam_selesai'   => $this->input->post('jam_selesai', true),
                'kelas'         => $this->input->post('kelas', true),
                'sks'           => $this->input->post('sks', true),
                'tipe'          => $this->input->post('tipe', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_simpan_matakuliah($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Matakuliah Berhasil</div>');
            redirect('matakuliah');
        }
    }

    public function edit_matakuliah()
    {
        $data['halaman']    = "Edit Data Matakuliah";
        $id = $this->uri->segment(3);
        $data['matakuliah'] = $this->mod->m_get_matakuliah_by($id);
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('matakuliah/edit.php', $data);
        $this->load->view('footer.php');
    }

    public function update_matakuliah()
    {
        $this->form_validation->set_rules('kode_matkul', 'Kode Matakuliah', 'required');
        $this->form_validation->set_rules('nama', 'Nama Matakuliah', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Edit Data Matakuliah";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('matakuliah/tambah.php', $data);
            $this->load->view('footer.php');
        }else{
            $post = [
                'id'            => $this->input->post('id', true),
                'kode_matkul'   => $this->input->post('kode_matkul', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'jam_mulai'     => $this->input->post('jam_mulai', true),
                'jam_selesai'   => $this->input->post('jam_selesai', true),
                'kelas'         => $this->input->post('kelas', true),
                'sks'           => $this->input->post('sks', true),
                'status'        => $this->input->post('status', true),
                'tipe'          => $this->input->post('tipe', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_matakuliah($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Matakuliah Berhasil</div>');
            redirect('matakuliah');
        }
    }

    public function hapus_matakuliah()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_matakuliah($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Matakuliah Berhasil Dihapus</div>');
        redirect('matakuliah');
    }
}