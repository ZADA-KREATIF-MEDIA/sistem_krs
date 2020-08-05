<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class M_login extends CI_Model{

    public function m_save_register_mahasiswa($post)
    {
        $this->db->insert('mahasiswa', $post);
        return true;
    }
}