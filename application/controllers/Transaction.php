<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/file_manager/competencyindex'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function requestpersonnel()
    {
        if(in_array($GLOBALS['NAV_PERSONNELREQUEST'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/requestpersonnel');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function examination()
    {
        if(array_intersect($GLOBALS['NAVEXAM_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function backgroundinvestigationmenu()
    {
        if(array_intersect($GLOBALS['NAVTRANSACTION_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/backgroundinvestigationmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function boarding()
    {
        if(in_array($GLOBALS['NAV_BOARDING'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/boarding');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function examinationmenu()
    {
        if(array_intersect($GLOBALS['NAVTRANSACTION_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/examinationmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function requirementchecklist()
    {
        if($this->session->userdata('userlevel') == 'HRMANAGER'){
            $data = array('content'=>'mods/mod_recruitment/transaction/checklist');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function interviewmenu()
    {
//        if(array_intersect($GLOBALS['NAVINTERVIEW_MGT'],$this->session->userdata('modules'))){
        if($this->session->userdata('userlevel') != 'TEMPORARY'){
            $data = array('content'=>'mods/mod_menu/interviewmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function ete()
    {
        if(in_array($GLOBALS['NAV_ETE'],$this->session->userdata('modules'))){
//        if($this->session->userdata('userlevel') != 'TEMPORARY'){
            $data = array('content'=>'mods/mod_recruitment/transaction/ete');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

 public function pmsrating()
    {
        if(in_array($GLOBALS['NAV_PMSPERFORMANCERATING'],$this->session->userdata('modules'))){
//        if($this->session->userdata('userlevel') != 'TEMPORARY'){
            $data = array('content'=>'mods/mod_recruitment/transaction/pmsrating');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function potentialrating()
    {
        if(in_array($GLOBALS['NAV_POTENTIALRATING'],$this->session->userdata('modules'))){
//        if($this->session->userdata('userlevel') != 'TEMPORARY'){
            $data = array('content'=>'mods/mod_recruitment/transaction/potentialrating');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


}
