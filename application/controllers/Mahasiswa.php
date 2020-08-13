<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_mahasiswa','mod');
        
    }

    public function matakuliah()
    {
        $data['halaman']    = "Data Matakuliah";
        $data['matkul_ambil'] = $this->mod->m_get_matkul_diambil();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/matakuliah.php');
        $this->load->view('footer.php');
    }

    public function daftar_matakuliah()
    {
        $data['halaman']    = "Data Matakuliah";
        $matkul_diambil     =  $this->mod->m_get_matkul_diambil();
        // print('<pre>');print_r($matkul_diambil);
        $i=0;
        foreach($matkul_diambil as $val){
            $post[$i] = $val['id_matkul'];
            $i++;
        }
        $data['matkul']     = $this->mod->m_get_matkul_belum_diambil($post);
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/daftar_matakuliah.php',$data);
        $this->load->view('footer.php');
    }

    public function ambil_matkul()
    {
        $matkul_pilih = $this->input->post('matkul_pilih', true);
        $i=0;
        foreach($matkul_pilih as $mp){
            $post[$i] = [
                'id_matakuliah' => $mp,
                'id_mahasiswa'  => $this->session->userdata('mhs_id')
            ];
            $i++;
        }
        // print('<pre>');print_r($post);exit();
        $this->mod->m_simpan_ambil_matkul($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Matakuliah Berhasil Di tambah</div>');
        redirect('mahasiswa/matakuliah');
    }

    public function hapus_matakuliah_diambil()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_matakuliah_diambil($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Matakuliah Berhasil Dihapus</div>');
        redirect('mahasiswa/matakuliah');
    }

    
}