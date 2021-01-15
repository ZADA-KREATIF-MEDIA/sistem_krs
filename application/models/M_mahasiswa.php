<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_mahasiswa extends CI_Model
{
    public function m_get_matkul_diambil()
    {
        $this->db->select("a.id, b.id AS id_matkul, b.kode_matkul, b.nama, b.jam_mulai, b.jam_selesai, b.kelas, b.sks, b.tipe, b.semester")
            ->from('matakuliah_diambil AS a')
            ->join('matakuliah AS b', 'b.id = a.id_matakuliah', 'left')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'));
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_matkul_belum_diambil($post)
    {
        // print('<pre>');print_r($post);exit();
        $semester = $post[0]['semester'];
        $i=0;
        foreach($post as $pst){
            $id[$i] = $pst['id'];
            $i++;
        }
        $this->db->select()
                ->from('matakuliah')
                ->where_not_in('id', $id)
                ->where('semester =',$semester);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_simpan_ambil_matkul($post)
    {
        $i = 1;
        foreach($post as $pst){
            $this->db->insert('matakuliah_diambil', $pst);
            $id[$i]  = $this->db->insert_id();
            $i++;
        }
        // array_push($lst_id,$id);
        // $this->db->insert_batch('matakuliah_diambil', $post);
        return $id;
    }

    public function m_simpan_id_transkip_nilai($kirim){
        $this->db->insert_batch('transkip_nilai', $kirim);
        return true;
    }

    public function m_hapus_matakuliah_diambil($id)
    {
        $this->db->select()
            ->from('matakuliah_diambil')
            ->where("id", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_hapus_matkul_transkip($id)
    {
        $this->db->select()
            ->from('transkip_nilai')
            ->where("id_matkul_diambil", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }

    public function m_save_krs_perwalian($post_krs)
    {
        $this->db->insert('krs_perwalian', $post_krs);
        return true;
    }

    public function m_get_perwalian()
    {
        $this->db->select()
            ->from('krs_perwalian')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'));
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_krs_catatan($id)
    {
        $this->db->select()
            ->from('krs_perwalian')
            ->where("id", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->row_array();
        return $data;
    }
    
    public function m_get_matkul_all($aktif)
    {
        $this->db->select()
                ->from('matakuliah')
                ->where('semester =',$aktif);
        $query = $this->db->get_compiled_select();
        $data = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_transkipnilai()
    {
        $this->db->select("a.id_matkul_diambil,b.nama,a.nilai, b.sks, b.semester")
            ->from('transkip_nilai AS a')
            ->join('matakuliah AS b','b.id = a.id_matkul')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'));
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_portofolio($semester)
    {
        $this->db->select("b.id,b.nama,a.nilai, b.semester")
            ->from('transkip_nilai AS a')
            ->join('matakuliah AS b','b.id = a.id_matkul')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'))
            ->where("b.semester", $semester);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_semester()
    {
        $this->db->select()
            ->from('refrensi_tahun_ajaran')
            ->where("id = 1");
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->row_array();
        return $data;
    }

    public function m_get_data_dosen($id_dosen)
    {
        $this->db->select('nomor_telephone')
            ->from('dosen')
            ->where('id',$id_dosen);
        $query = $this->db->get_compiled_select();
        $data = $this->db->query($query)->row_array();
        return $data['nomor_telephone'];
    }

}