<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantInterview extends CI_Controller {
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/transaction/interview'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function createinterview()
    {
        if(in_array($GLOBALS['NAV_CREATEINTERVIEW'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/interview/createinterview');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function evaluateinterview()
    {
//        if(in_array($GLOBALS['NAV_EVALUATEINTERVIEW'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/interview/evaluateinterview');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function conductinterview()
    {
//        if(in_array($GLOBALS['NAV_CONDUCTINTERVIEW'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/interview/conductinterview');
//        } else {
//            $data = array('content'=>'mods/unauthorizedpage');
//        }
        $this->load->view('templates/MasterTemplate',$data);
    }






}
