<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmsReports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelPmsReportsManagement');

    }


    public function ipcrreport()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_pms/pms_reports/ipcrreport');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function opcrreport()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_pms/pms_reports/opcrreport');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function averageratingreport()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_pms/pms_reports/averageratingreport');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function soreport()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_pms/pms_reports/soreport');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function mfopapreport()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_pms/pms_reports/mfopapreport');
        $this->load->view('templates/MasterTemplate',$data);
    }









    //============================//
    //  REPORT DATA FETCHING     //
    //==========================//

    public function ipcrdata(){
        $ipcrdata = $this->ModelPmsReportsManagement->getIpcrReport($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT'],$_REQUEST['EMPLOYEE']);

        if($ipcrdata){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $ipcrdata
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displayipcremployees(){
        $employees = $this->ModelPmsReportsManagement->getEmployees($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT']);

        if($employees){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $employees
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function opcrdata(){
        $ipcrdata = $this->ModelPmsReportsManagement->getOpcrReport($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT']);

        if($ipcrdata){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $ipcrdata
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function opcrdataaverage(){
        $opcrave = $this->ModelPmsReportsManagement->getOpcrAverageRating($_REQUEST['OPCRID']);

        if($opcrave){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $opcrave
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function opcrpmt(){
        $pmt = $this->ModelPmsReportsManagement->getOpcrPmt();

        if($pmt){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $pmt
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
}
