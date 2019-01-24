<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cscreports extends CI_Controller {
    public function employmentstatus() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/employmentstatus');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function salarygrades() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/salarygrades');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function agerange() {
        $data = array('content'=>'mods/mod_recruitment/cscreports/agerange');
        $this->load->view('templates/MasterTemplate',$data);
    }
}