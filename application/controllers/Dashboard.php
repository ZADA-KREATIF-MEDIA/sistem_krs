<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_dashboard', 'mod');
    }

    public function index()
    {
        $data['halaman'] = "Dashboard";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        if($this->session->userdata('level') == "admin"){
            $data['matkul'] = $this->mod->m_get_total_matkul();
            $data['akademik'] = $this->mod->m_get_total_akademik();
            // print('<pre>');print_r($data);exit();
            $this->load->view('dashboard/index.php', $data);
        }else if($this->session->userdata('level') == "akademik"){
            $data['matkul'] = $this->mod->m_get_total_matkul();
            $data['akademik'] = $this->mod->m_get_total_akademik();
            $this->load->view('dashboard/index_akademik', $data);
        }else if($this->session->userdata('level') == "dosen" || $this->session->userdata('level') == "kajur" || $this->session->userdata('level') == "sekjur"){
            $id = $this->session->userdata('dosen_id');
            $data['matkul_diampu'] = $this->mod->m_get_matkul_diampu($id);
            $data['mhs_bimbingan'] = $this->mod->m_get_mahasiswa_bimbingan($id);
            $data['perwalian'] = $this->mod->m_get_perwalian($id);
            $this->load->view('dashboard/index_dosen', $data);
        }else{
            $id = $this->session->userdata('mhs_id');
            $matkul_diambil     =  $this->mod->m_get_matkul_diambil();
            $i=0;
            foreach($matkul_diambil as $val){
                $post[$i] = $val['id_matkul'];
                $i++;
            }
            // print('<pre>');print_r(count($matkul_diambil));exit();
            if(count($matkul_diambil) > 0) {
                $data['matkul_belum_diambil']       = $this->mod->m_get_matkul_belum_diambil($post);
            } else {
                $data['matkul_belum_diambil'] = 0;
            }
            $data['matkul_diambil']             = $this->mod->m_total_matkul_diambil();
            $data['catatan_krs']                = $this->mod->m_get_total_krs_catatan($id);
            // print('<pre>');print_r($data);exit();
            $this->load->view('dashboard/index_mahasiswa', $data);
        }
        $this->load->view('footer.php');
    }
}