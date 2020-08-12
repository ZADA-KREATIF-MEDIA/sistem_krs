<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_mahasiswa extends CI_Model
{
    public function m_get_matkul_diambil()
    {
        $this->db->select("a.id, b.id AS id_matkul, b.kode_matkul, b.nama, b.jam_mulai, b.jam_selesai, b.kelas, b.sks, b.tipe")
            ->from('matakuliah_diambil AS a')
            ->join('matakuliah AS b', 'b.id = a.id_matakuliah', 'left')
            ->where("id_mahasiswa", $this->session->userdata('mhs_id'));
        $query = $this->db->get_compiled_select();
        // print('<pre>');print_r($query);exit;
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_get_matkul_belum_diambil()
    {
        $data_matkul_terambil = $this->m_get_matkul_diambil();
        // print('<pre>');print_r($data_matkul_terambil);
        $i=0;
        foreach($data_matkul_terambil as $val){
            $this->db->select()
                ->from('matakuliah')
                ->where('id !=', $val['id_matkul']);
            $query = $this->db->get_compiled_select();
            // print('<pre>');print_r($query);
            $data  = $this->db->query($query)->result_array();
            $i++;
        }
        // print('<pre>');print_r($data);exit();
        return $data;
    }

    public function m_simpan_ambil_matkul($post)
    {
        $this->db->insert_batch('matakuliah_diambil', $post);
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
}