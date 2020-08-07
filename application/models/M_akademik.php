<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_akademik extends CI_Model{

    public function m_get_all_akademik()
    {
        $this->db->select()
            ->from('akademik');
        $query = $this->db->get_compiled_select();
        $data  = $this->db->query($query)->result_array();
        return $data;
    }

    public function m_simpan_akademik($post)
    {
        $this->db->insert('akademik', $post);
        return true;
    }

    public function m_update_akademik($post)
    {
        $this->db->select()
            ->from('akademik')
            ->where("id", $post['id']);
        $query = $this->db->set($post)->get_compiled_update();
        // print('<pre>');print_r($query);exit();
        $this->db->query($query);
        return true;	
    }

    public function m_hapus_akademik($id)
    {
        $this->db->select()
            ->from('akademik')
            ->where("id", $id);
        $query = $this->db->get_compiled_delete();
        $this->db->query($query);
        return true;
    }
}