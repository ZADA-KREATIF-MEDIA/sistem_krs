<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_dosen extends CI_Model
{

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
}
