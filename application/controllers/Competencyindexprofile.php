<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompetencyIndexProfile extends CI_Controller {
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/competencyindex'
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

    public function filemanager()
    {
//        if(in_array($GLOBALS['NAV_CREATEREQUESTPERSONNEL'],$this->session->userdata('modules'))){
//            $data = array('content'=>'mods/mod_rsp/mod_recruitment/requestnewpersonnel');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $data = array('content'=>'mods/mod_menu/filemanagermenu');
        $this->load->view('templates/MasterTemplate',$data);
    }

}
