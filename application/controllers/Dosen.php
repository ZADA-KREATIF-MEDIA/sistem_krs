<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('M_dosen', 'mod');
    }

    /*--------- Bagian Matakuliah ----------*/
    public function matakuliah()
    {
        $data['halaman'] = "Data Matakuliah";
        $data['matakuliah'] = $this->mod->m_get_all_matakuliah();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/matakuliah.php', $data);
        $this->load->view('footer.php');
    }
    /*--------- Akhir bagian Matakuliah -------- */

    /*----------- Bagian Mahasiswa KRS -------------*/
    public function mahasiswa()
    {
        $data['halaman']    = "Data Mahasiswa";
        $data['mahasiswa']  = $this->mod->m_get_all_mahasiswa_plus_dosen();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/mahasiswa.php', $data);
        $this->load->view('footer.php');
    }
    /*--------- Akhir Mahasiswa KRS -------- */

    public function krs()
    {
        $data['halaman']    = "Data Perwalian";
        $data['perwalian']  = $this->mod->m_get_perwalian();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/daftar_perwalian.php',$data);
        $this->load->view('footer.php');
    }

    public function view_krs()
    {
        $id = $this->uri->segment(3);
        $semester = $this->uri->segment(4);        
        $data['mahasiswa'] = $this->mod->m_get_mahasiswa_by($id);
        $data['perwalian']  = $this->mod->m_get_perwalian_by($id);
        $data['halaman']    = "View Data Mahasiswa";
        $data['dosen']      = $this->mod->m_get_all_dosen();
        $data['matkul_ambil'] = $this->mod->m_get_matkul_diambil($id);
        $data['matkul_krs'] = $this->mod->m_get_matkul_proses_krs($id);

        if($semester != ""){
            // echo "here";
            $data['transkip']   = $this->mod->m_get_portofolio($semester,$id);
        }else{
            // echo "here2";
            $data['transkip']   = $this->mod->m_get_transkipnilai($id);
        }
        
        // print('<pre>');print_r($data['matkul_krs']);exit();
      
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/view.php', $data);
        $this->load->view('footer.php');
    }

    public function view_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $data['halaman']    = "View Data Mahasiswa";
        $data['matkul_ambil'] = $this->mod->m_get_matkul_diambil_dosen_by($id);

        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('dosen/view_mahasiswa.php', $data);
        $this->load->view('footer.php');
    }

    public function catatan()
    {
        
        $post = [
            'id' => $this->input->post('id', TRUE),
            'catatan' => $this->input->post('catatan', TRUE),
        ];
        $this->mod->m_update_catatan($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil di input</div>');
        redirect("dosen/krs");
    }

    public function status_krs()
    {
        $tgl_sekarang = date("Y-m-d");
        $post = [
            'id' => $this->input->post('id', TRUE),
            'tgl_perwalian' => $tgl_sekarang,
            'status' => $this->input->post('status', TRUE),
        ];
        $this->mod->m_update_status($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil di input</div>');
        redirect("dosen/krs");
    }
} 
