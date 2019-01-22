<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackgroundInvestigation extends CI_Controller {
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/transaction/background_investigation'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function createbi()
    {
        if(in_array($GLOBALS['NAV_BI'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/background_investigation/createbi');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function evaluatebi()
    {
        if(in_array($GLOBALS['NAV_EVALUATEBI'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/background_investigation/evaluatebi');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function conductbi()
    {
        if(in_array($GLOBALS['NAV_CONDUCTBI'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/background_investigation/conductbi');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }






}
