<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_matakuliah extends CI_Model
{
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
}