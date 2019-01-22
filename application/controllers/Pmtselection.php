<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmtSelection extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelDepartmentManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }


    public function pmtlead()
    {
//        if(in_array($GLOBALS['NAV_MANAGESO'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/pmt_selection/assignpmtlead');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function pmtevaluators()
    {
//        if(in_array($GLOBALS['NAV_MANAGESO'],$this->session->userdata('modules'))){
        $data = array('content'=>'mods/mod_pms/pmt_selection/assignpmtevaluators');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }

        $this->load->view('templates/MasterTemplate',$data);
    }

}
