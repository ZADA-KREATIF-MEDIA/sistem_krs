<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_admin','mod');
    }

/*----------- Bagian Mahasiswa -------------*/
    public function mahasiswa()
    {
        $data['halaman']    = "Data Mahasiswa";
        $data['mahasiswa']  = $this->mod->m_get_all_mahasiswa_plus_dosen();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/mahasiswa/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_mahasiswa()
    {
        $data['halaman']    = "TambahData Mahasiswa";
        $data['dosen']      = $this->mod->m_get_all_dosen();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/mahasiswa/tambah.php', $data);
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
            $this->load->view('admin/mahasiswa/tambah.php', $data);
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
            redirect('admin/mahasiswa');
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
        $this->load->view('admin/mahasiswa/edit.php', $data);
        $this->load->view('footer.php');
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
            $this->load->view('admin/mahasiswa/edit.php', $data);
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
            redirect('admin/mahasiswa');
        }
    }

    public function hapus_mahasiswa()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_mahasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Dihapus</div>');
        redirect('admin/mahasiswa');
    }

/*------------ Bagian Dosen -------------*/
    public function dosen()
    {
        $data['halaman']    = "Data Dosen";
        $data['dosen']  = $this->mod->m_get_all_dosen();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/dosen/index.php', $data);
        $this->load->view('footer.php');
    }

    public function tambah_dosen()
    {
        $data['halaman']    = "Tambah Data Dosen";
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/dosen/tambah.php');
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
            $this->load->view('admin/dosen/tambah.php');
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
            redirect('admin/dosen');
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
        $this->load->view('admin/dosen/edit.php', $data);
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
            $this->load->view('admin/dosen/edit.php', $data);
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
            redirect('admin/dosen');
        }
    }

    public function hapus_dosen()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_dosen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Dihapus</div>');
        redirect('admin/dosen');
    }

/*----------- Bagian Akademik -----------*/
    public function akademik()
    {
        $data['halaman']    = "Data Akademik";
        $data['akademik']  = $this->mod->m_get_all_akademik();
        // print('<pre>');print_r($data);exit();
        $this->load->view('head.php', $data);
        $this->load->view('sidebar.php');
        $this->load->view('header.php');
        $this->load->view('admin/akademik/index.php', $data);
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
        redirect('admin/akademik');
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
        redirect('admin/akademik');
    }

    public function hapus_akademik()
    {
        $id = $this->uri->segment(3);
        $this->mod->m_hapus_akademik($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Akademik Berhasil Dihapus</div>');
        redirect('admin/akademik');
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
        $data['dosen'] = $this->mod->m_get_all_dosen();
        // print('<pre>');print_r($data);exit();
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
        $this->form_validation->set_rules('dosen_matkul', 'Dosen Matakuliah', 'required');
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
                'semester'      => $this->input->post('semester', true),
                'id_dosen'      => $this->input->post('dosen_matkul', true)
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
        $data['dosen'] = $this->mod->m_get_all_dosen();
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
        $this->form_validation->set_rules('dosen_matkul', 'Dosen Matakuliah', 'required');
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
                'semester'      => $this->input->post('semester', true),
                'id_dosen'      => $this->input->post('dosen_matkul', true)
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

/*------------ Bagian Email -----------*/
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
			'smtp_user' => 'dicaribapak11@gmail.com',
			'smtp_pass' => 'akuaku123',
			'smtp_port' => 465,
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline'	 => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('dicaribapak11@gmail.com', 'Admin Siakad');
		$this->email->to($this->input->post('penerima', true));
        $this->email->subject('Panduan KRS');
        $this->email->message('test');
        if($this->email->send()){
            $this->mod->m_save_send_email($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email Berhasil Terkirim</div>');
            redirect('admin/email');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Gagal Terkirim</div>');
            redirect('admin/email');
        }
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
