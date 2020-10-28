<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Akademik extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_akademik','mod');
    }

    public function mahasiswa()
    {
        $data['halaman']    = "Data Mahasiswa";
        $data['mahasiswa']  = $this->mod->m_get_all_mahasiswa_plus_dosen();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('akademik/mahasiswa/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_mahasiswa()
    {
        $data['halaman']    = "TambahData Mahasiswa";
        $data['dosen']      = $this->mod->m_get_all_dosen();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('akademik/mahasiswa/tambah.php', $data);
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
        $this->form_validation->set_rules('dosen_pembimbing', 'Dosen Pembimbing', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "TambahData Mahasiswa";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('akademik/mahasiswa/tambah.php', $data);
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
                'email' => $this->input->post('email', true),
                'id_dosen' => $this->input->post('dosen_pembimbing')
            ];
            $this->mod->m_simpan_mahasiswa($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Mahasiswa Berhasil</div>');
            redirect('akademik/mahasiswa');
        }
    }

    public function edit_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $data['mahasiswa'] = $this->mod->m_get_mahasiswa_by($id);
        // print('<pre>');print_r($data);exit();
        $data['halaman']    = "Edit Data Mahasiswa";
        $data['dosen']      = $this->mod->m_get_all_dosen();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('akademik/mahasiswa/edit.php', $data);
        $this->load->view('footer.php');
    }

    public function view_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $semester = $this->uri->segment(4);        
        $data['mahasiswa'] = $this->mod->m_get_mahasiswa_by($id);
        // print('<pre>');print_r($data);exit();
        $data['halaman']    = "View Data Mahasiswa";
        $data['dosen']      = $this->mod->m_get_all_dosen();
        $data['matkul_ambil'] = $this->mod->m_get_matkul_diambil($id);
        
        if($semester != ""){
            // echo "here";
            $data['transkip']   = $this->mod->m_get_portofolio($semester,$id);
        }else{
            // echo "here2";
            $data['transkip']   = $this->mod->m_get_transkipnilai($id);
        }
        // 
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('akademik/mahasiswa/view.php', $data);
        $this->load->view('footer.php');
    }

    public function input_nilai()
    {       
            $id_mahasiswa=$this->input->post('id_mahasiswa', TRUE);

            $post = [
                'id_matkul_diambil' => $this->input->post('id_matkul_diambil', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'id_matkul' => $this->input->post('id_matkul', TRUE),
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_nilai($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai berhasil di input</div>');
            redirect("akademik/view_mahasiswa/"."$id_mahasiswa");
        
    }


    public function update_mahasiswa()
    {
        $this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('no_tlpn', 'Nomor Telephone', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('dosen_pembimbing', 'Dosen Pembimbing', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Edit Data Mahasiswa";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('akademik/mahasiswa/edit.php', $data);
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
                'email' => $this->input->post('email', true),
                'id_dosen' => $this->input->post('dosen_pembimbing')
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_mahasiswa($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Mahasiswa Berhasil</div>');
            redirect('akademik/mahasiswa');
        }
    }

    public function hapus_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_mahasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Dihapus</div>');
        redirect('akademik/mahasiswa');
    }

    public function email()
    {
        $data['halaman']    = "Data Email";
        $data['email']      = $this->mod->m_get_all_email();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/email/index', $data);
        $this->load->view('footer.php');
    }

    public function kirim_email()
    {
        $post = [
            'penerima'      => $this->input->post('penerima', true),
            'pengirim'      => $this->input->post('pengirim', true),
            'isi'           => $this->input->post('pesan', true),
            'tanggal_kirim' => date("Y-m-d H:i:s")
        ];
        // print('<pre>');print_r($post);exit();
        $this->_sendEmail($post);
    }

    private function _sendEmail($post)
    {

        $config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'kprasetya029@gmail.com',
			'smtp_pass' => 'lionel010',
			'smtp_port' => 465,
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline'	 => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('kprasetya029@gmail.com', 'Admin Siakad');
		$this->email->to($this->input->post('penerima', true));
        $this->email->subject('Panduan KRS');
        $this->email->message('test');
        if($this->email->send()){
            $this->mod->m_save_send_email($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email Berhasil Terkirim</div>');
            redirect('akademik/email');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Gagal Terkirim</div>');
            redirect('akademik/email');
        }
    }


    /*--------- Bagian Matakuliah ----------*/
    public function matakuliah()
    {
        $data['halaman']    = "Data Matakuliah";
        $data['matakuliah']  = $this->mod->m_get_all_matakuliah();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/matakuliah/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_matakuliah()
    {
        $data['halaman']    = "Tambah Data Matakuliah";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/matakuliah/tambah.php', $data);
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
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Tambah Data Matakuliah";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('admin/matakuliah/tambah.php', $data);
            $this->load->view('footer.php');
        }else{
            $post = [
                'kode_matkul'   => $this->input->post('kode_matkul', TRUE),
                'nama'          => $this->input->post('nama', TRUE),
                'jam_mulai'     => $this->input->post('jam_mulai', true),
                'jam_selesai'   => $this->input->post('jam_selesai', true),
                'kelas'         => $this->input->post('kelas', true),
                'sks'           => $this->input->post('sks', true),
                'tipe'          => $this->input->post('tipe', true),
                'semester'      => $this->input->post('semester', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_simpan_matakuliah($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Matakuliah Berhasil</div>');
            redirect('admin/matakuliah');
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
        $this->load->view('admin/matakuliah/edit.php', $data);
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
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data['halaman']    = "Edit Data Matakuliah";
            $this->load->view('head.php', $data);
            $this->load->view('sidebar.php');
            $this->load->view('header.php');
            $this->load->view('admin/matakuliah/tambah.php', $data);
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
                'tipe'          => $this->input->post('tipe', true),
                'semester'      => $this->input->post('semester', true)
            ];
            // print('<pre>');print_r($post);exit();
            $this->mod->m_update_matakuliah($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Matakuliah Berhasil</div>');
            redirect('admin/matakuliah');
        }
    }

    public function hapus_matakuliah()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_matakuliah($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Matakuliah Berhasil Dihapus</div>');
        redirect('admin/matakuliah');
    }

    /*---------- Bagian Refrensi Semsester ----------*/
    public function semester_aktif()
    {
        $data['halaman']    = "Semester Aktif";
        $data['semester']   = $this->mod->m_get_semester_aktif();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/semester/index', $data);
        $this->load->view('footer.php');
    }

    public function update_semester()
    {
        $post = [
            'id'            => $this->input->post('id', true),
            'semester'      => $this->input->post('semester', true),
            'tahun_ajaran'  => $this->input->post('tahun_ajaran', true)
        ];
        // print('<pre>');print_r($post);exit();
        $this->mod->m_update_semester($post);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Semester Berhasil</div>');
        redirect('admin/semester_aktif');
    }

}