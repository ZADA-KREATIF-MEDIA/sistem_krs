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
        $this->load->view('mahasiswa/matakuliah.php',$data);
        $this->load->view('footer.php');
    }

    public function daftar_matakuliah()
    {
        $data['halaman']    = "Data Matakuliah";
        $semester_aktif     = $this->mod->m_get_semester();
        $matkul_diambil     =  $this->mod->m_get_matkul_diambil();

        $i=0;
        foreach($matkul_diambil as $val){
            $post[$i] = [
                'id' => $val['id_matkul'],
                'semester' => $semester_aktif['semester']
        ];
            $i++;
        }
        if(count($matkul_diambil) > 0) {
            // print('<pre>');print_r($post);exit();
            $data['matkul']     = $this->mod->m_get_matkul_belum_diambil($post);
        } else {
            $data['matkul'] = $this->mod->m_get_matkul_all($semester_aktif['semester']);
        }
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
        $id_matkul = $this->mod->m_simpan_ambil_matkul($post);
        $j = 0;
        foreach($id_matkul as $im){
            $kirim[$j] = [
                'id_matkul_diambil' => $im,
                'id_mahasiswa'  => $this->session->userdata('mhs_id')
            ];
            $j++;
        }
        $this->mod->m_simpan_id_transkip_nilai($kirim);
        // print('<pre>');print_r($id_matkul);exit();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Matakuliah Berhasil Di tambah</div>');
        redirect('mahasiswa/matakuliah');
    }

    public function hapus_matakuliah_diambil()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_matakuliah_diambil($id);
        $this->mod->m_hapus_matkul_transkip($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Matakuliah Berhasil Dihapus</div>');
        redirect('mahasiswa/matakuliah');
    }

    public function krs()
    {
        $data['halaman']    = "Data Perwalian";
        $data['perwalian']  = $this->mod->m_get_perwalian();
        $id_dosen = $this->session->userdata('mhs_id_dosen');
        $data['wa_dosen'] = "62".substr($this->mod->m_get_data_dosen($id_dosen),1);
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/daftar_perwalian.php',$data);
        $this->load->view('footer.php');
    }

    public function krs_catatan()
    {
        $id = $this->input->post('id', true);
        $data = $this->mod->m_get_krs_catatan($id);
        echo json_encode($data);
    }

    public function krs_perwalian()
    {
        $id_mhs         = $this->uri->segment(3);
        $id_dosen       = $this->uri->segment(4);
        $dt_semester    = $this->mod->m_get_semester();
        $post_krs = [
            'id_mahasiswa'  => $id_mhs,
            'id_dosen'      => $id_dosen,
            'semester'      => $dt_semester['semester'],
            'tahun_ajaran'  => $dt_semester['tahun_ajaran']
        ];
        // print('<pre>');print_r($post_krs);exit();
        if($id_dosen == 0){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal Melakukan KRS, Karena Belum Memiliki Dosen Pembimbing</div>');
            redirect('mahasiswa/matakuliah');
        } else {
            $this->mod->m_save_krs_perwalian($post_krs);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data KRS Berhasil Ditambah</div>');
            redirect('mahasiswa/krs');
        }
    }

    public function transkip_nilai()
    {
        $data['halaman']    = "Data Transkip Nilai";
        $data['transkip']   = $this->mod->m_get_transkipnilai();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/daftar_transkip_nilai.php',$data);
        $this->load->view('footer.php');
    }

    public function portofolio()
    {
        $data['halaman']    = "Data Portofolio";
        $semester = $this->uri->segment(3);
        if($semester != ""){
            $data['transkip']   = $this->mod->m_get_portofolio($semester);
        }else{
            $data['transkip']   = $this->mod->m_get_transkipnilai();
        }
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('mahasiswa/portofolio.php',$data);
        $this->load->view('footer.php');
    }
    
}