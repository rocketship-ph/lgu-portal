<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileManager extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelDepartmentManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/file_manager/competencyindex'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function competencyindex()
    {
        if(in_array($GLOBALS['NAV_COMPETENCYINDEX'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/file_manager/competencyindex');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function personaldatasheet()
    {
        if(in_array($GLOBALS['NAV_PDS'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/file_manager/personaldatasheet');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function positionprofile()
    {
        if(in_array($GLOBALS['NAV_POSITION'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/file_manager/positionprofile');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function departmentprofile()
    {
        if(in_array($GLOBALS['NAV_DEPARTMENT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/file_manager/departmentprofile');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


    //FOR DEPARTMENT PROFILE
    public function displaydepartments(){
        $departments = $this->ModelDepartmentManagement->getDepartments();

        if($departments){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $departments
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }


}
