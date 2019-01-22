<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {
    public function index()
    {
        $data = array('content'=>'mods/mod_announcements/viewannouncements');
        $this->load->view('templates/MasterTemplate',$data);
    }
}
