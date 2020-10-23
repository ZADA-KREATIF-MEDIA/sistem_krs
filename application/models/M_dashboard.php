<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_dashboard extends CI_Model{
    
    public function m_get_total_matkul()
    {
        $this->db->select()
            ->from('matakuliah');
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

    public function m_get_total_akademik()
    {
        $this->db->select()
            ->from('akademik');
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

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

    public function m_get_matkul_belum_diambil($id)
    {
        $this->db->select()
                ->from('matakuliah')
                ->where_not_in('id', $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);
        $data  = $this->db->query($query)->num_rows();
        // print('<pre>');print_r($data);
        return $data;
    }


    public function m_total_matkul_diambil()
    {
        $this->db->select("a.id, b.id AS id_matkul, b.kode_matkul, b.nama, b.jam_mulai, b.jam_selesai, b.kelas, b.sks, b.tipe, b.semester")
            ->from('matakuliah_diambil AS a')
            ->join('matakuliah AS b', 'b.id = a.id_matakuliah', 'left')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'));
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

    public function m_get_total_krs_catatan($id)
    {
        $this->db->select()
            ->from('krs_perwalian')
            ->where("id_mahasiswa", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

    public function m_get_matkul_diampu($id)
    {
        $this->db->select()
            ->from('matakuliah')
            ->where("id_dosen", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

    public function m_get_mahasiswa_bimbingan($id)
    {
        $this->db->select()
            ->from('mahasiswa')
            ->where("id_dosen", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

    public function m_get_perwalian($id)
    {
        $this->db->select()
            ->from('krs_perwalian')
            ->where("id_dosen", $id);
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->num_rows();
        return $data;
    }

}