<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StrategicFunctions extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelDepartmentManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }


    public function strategicobjective()
    {
        if(in_array($GLOBALS['NAV_MANAGESO'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/strategicobjective');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function assignobjectives()
    {
        if(in_array($GLOBALS['NAV_ASSIGNSO'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/assignso');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function approvemfopap()
    {
        if(in_array($GLOBALS['NAV_MANAGEMFOPAP'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/approvemfopap');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function mfopap()
    {
        if(in_array($GLOBALS['NAV_CRUDMFOPAP'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/crudmfopap');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function managemfopap()
    {
        if(in_array($GLOBALS['NAV_CRUDMFOPAP'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/managemfopap');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function assignedmfopap()
    {
//        if(in_array($GLOBALS['NAV_ASSIGNEDMFOPAP'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_pms/strategic_functions/assignedmfopap');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

}
