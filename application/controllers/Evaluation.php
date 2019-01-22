<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelDepartmentManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }


    public function ipcr()
    {
        if(in_array($GLOBALS['NAV_EVALUATEPMS'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/evaluation/ipcr');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function opcr()
    {
        if(in_array($GLOBALS['NAV_EVALUATEPMS'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/evaluation/opcr');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

}
