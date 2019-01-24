<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelLogoFetcher');
    }
    public function index()
    {
        $logo = $this->ModelLogoFetcher->hasRows();
        if($logo){
            $GLOBALS['logohandler'] = $logo[0]['logo'];
        } else {
            $GLOBALS['logohandler'] = base_url().'assets/img/logo.png';
        }
        $data = array(
            'content'=>'mods/mod_session/home'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function recruitment()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/recruitmentmenu');
        $this->load->view('templates/MasterTemplate',$data);
    }
      public function analytics()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/analyticsmenu');
        $this->load->view('templates/MasterTemplate',$data);
    }
    public function learning()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/learningmenu');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function rewards()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/rewardsmenu');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function pms()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/pmsmenu');
        $this->load->view('templates/MasterTemplate',$data);
    }


//    ========================
//    || FOR RSP MODULE
//    ========================

    public function filemanager()
    {
        if(array_intersect($GLOBALS['NAVFILEMAINTENANCE_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/filemanagermenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function transaction()
    {
        if(array_intersect($GLOBALS['NAVTRANSACTION_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/transactionmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function utilities()
    {
        if(array_intersect($GLOBALS['NAVUTILITIES_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/utilitiesmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function reports()
    {
        if(array_intersect($GLOBALS['NAVREPORTS_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/reportsmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


//    =====================
//    || FOR PMS MODULE
//    =====================


    public function strategicfunctions()
    {
//        if(array_intersect($GLOBALS['NAVFILEMAINTENANCE_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/strategicmenu');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function pmtselection()
    {
//        if(array_intersect($GLOBALS['NAVFILEMAINTENANCE_MGT'],$this->session->userdata('modules'))){
        $data = array('content'=>'mods/mod_menu/pmtselectionmenu');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function opcr()
    {
//        if(array_intersect($GLOBALS['NAVFILEMAINTENANCE_MGT'],$this->session->userdata('modules'))){
        $data = array('content'=>'mods/mod_pms/opcr');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function ipcr()
    {
//        if(array_intersect($GLOBALS['NAVFILEMAINTENANCE_MGT'],$this->session->userdata('modules'))){
        $data = array('content'=>'mods/mod_pms/ipcr');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function pmsevaluation()
    {
        if($this->session->userdata('pmt') != '1'){
            $data = array('content'=>'mods/mod_menu/pmsevaluationmenu');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function pmsreports()
    {
//        if(array_intersect($GLOBALS['NAVREPORTS_MGT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_menu/pmsreportsmenu');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }


	//FOR REWARDS AND RECOGNITION MODULE
    public function loyaltyaward()
    {
        if(in_array($GLOBALS['NAV_LOYALTYAWARD'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_rewards/loyaltyaward');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


	 //FOR LEARNING AND DEVELOPMENT
    public function events()
    {
        if(in_array($GLOBALS['NAV_EVENTS'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_learning/events');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function calendar()
    {
        if(in_array($GLOBALS['NAV_CALENDAR'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_learning/calendar');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

}
