<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_akademik extends CI_Model{

    public function m_get_all_mahasiswa()
    {
        $this->db->select()
            ->from('mahasiswa');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_all_mahasiswa_plus_dosen()
    {
        $this->db->select('a.id AS id_mahasiswa, a.nim, a.nama AS nama_mahasiswa, a.jenis_kelamin AS jk_mahasiswa, a.nomor_telephone AS no_hp_mhs, a.tgl_masuk AS tgl_masuk_mahasiswa, b.nama AS nama_dosen')
            ->from('mahasiswa AS a')
            ->join('dosen AS b','b.id = a.id_dosen', 'left');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_simpan_mahasiswa($post)
    {
        $this->db->insert('mahasiswa', $post);
        return true;
    }

    public function m_get_mahasiswa_by($id)
    {
        $this->db->select()
            ->from('mahasiswa')
            ->where("id", $id);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_update_mahasiswa($post)
    {
        $this->db->select()
            ->from('mahasiswa')
            ->where("id", $post['id']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

    public function m_hapus_mahasiswa($id)
    {
        $this->db->select()
            ->from('mahasiswa')
            ->where("id", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_get_all_email()
    {
        $this->db->select()
            ->from('email');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_save_send_email($post)
    {
        $this->db->insert('email', $post);
        return true;
    }


    public function m_get_all_matakuliah()
    {
        $this->db->select()
            ->from('matakuliah');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_simpan_matakuliah($post)
    {
        $this->db->insert('matakuliah', $post);
        return true;
    }

    public function m_get_matakuliah_by($id)
    {
        $this->db->select()
            ->from('matakuliah')
            ->where("id", $id);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_update_matakuliah($post)
    {
        $this->db->select()
            ->from('matakuliah')
            ->where("id", $post['id']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

    public function m_hapus_matakuliah($id)
    {
        $this->db->select()
            ->from('matakuliah')
            ->where("id", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }



    public function m_get_all_dosen()
    {
        $this->db->select()
            ->from('dosen');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_simpan_dosen($post)
    {
        $this->db->insert('dosen', $post);
        return true;
    }

    public function m_get_dosen_by($id)
    {
        $this->db->select()
            ->from('dosen')
            ->where("id", $id);
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_update_dosen($post)
    {
        $this->db->select()
            ->from('dosen')
            ->where("id", $post['id']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

    public function m_hapus_dosen($id)
    {
        $this->db->select()
            ->from('dosen')
            ->where("id", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_get_matkul_diambil($id)
    {
        $this->db->select("a.id_matkul_diambil ,a.nilai, a.id_mahasiswa, b.id_matakuliah, c.kode_matkul, c.nama, c.jam_mulai, c.jam_selesai, c.kelas, c.sks, c.tipe, c.semester")
            ->from('transkip_nilai AS a')
            ->join('matakuliah_diambil AS b', 'b.id = a.id_matkul_diambil', 'left')
            ->join('matakuliah AS c','c.id = b.id_matakuliah', 'left')
            ->where('a.id_mahasiswa',$id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_update_nilai($post)
    {
        // $this->db->insert('transkip_nilai', $post);
        // return true;
        $this->db->select()
            ->from('transkip_nilai')
            ->where("id_matkul_diambil", $post['id_matkul_diambil']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

    public function m_get_portofolio($semester,$id)
    {
        $this->db->select("a.id_matkul_diambil,b.nama,a.nilai b.semester")
            ->from('transkip_nilai AS a')
            ->join('matakuliah AS b','b.id = a.id_matkul')
            ->where("id_mahasiswa", $id)
            ->where("b.semester", $semester);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    
    public function m_get_transkipnilai($id)
    {
        $this->db->select("a.id_matkul_diambil,b.nama,a.nilai, b.sks,b.semester")
            ->from('transkip_nilai AS a')
            ->join('matakuliah AS b','b.id = a.id_matkul')
            ->where("id_mahasiswa", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_semester_aktif()
    {
        $this->db->select()
            ->from('refrensi_tahun_ajaran')
            ->where('id = 1');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_update_semester($post)
    {
        $this->db->select()
            ->from('refrensi_tahun_ajaran')
            ->where("id", $post['id']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

}