<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Akademik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_akademik','mod');
    }

    public function index()
    {
        $data['halaman']    = "Data Akademik";
        $data['akademik']  = $this->mod->m_get_all_akademik();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('akademik/index.php', $data);
        $this->load->view('footer.php');
    }

    public function simpan_akademik()
    {
        $post = [
            'nia'       => $this->input->post('nia', true),
            'nama'      => $this->input->post('nama', true),
            'password'  => password_hash($this->input->post('password', true),PASSWORD_DEFAULT),
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_simpan_akademik($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Akademik Berhasil</div>');
        redirect('akademik');
    }

    public function update_akademik()
    {
        $post = [
            'id'    => $this->input->post('id', true),
            'nia'   => $this->input->post('nia', true),
            'nama'  => $this->input->post('nama', true)
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_update_akademik($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Akademik Berhasil</div>');
        redirect('akademik');
    }

    public function hapus_akademik()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_akademik($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Akademik Berhasil Dihapus</div>');
        redirect('akademik');
    }

}