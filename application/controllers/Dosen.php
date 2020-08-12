<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->Model('M_dosen','mod');
    }

    
}