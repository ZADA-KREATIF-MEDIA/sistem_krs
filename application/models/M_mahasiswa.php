<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_mahasiswa extends CI_Model{

    public function m_get_all_mahasiswa()
    {
        $this->db->select()
            ->from('mahasiswa');
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
    
}