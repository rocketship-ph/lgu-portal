<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examination extends CI_Controller {
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/file_manager/competencyindex'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function evaluatorselection()
    {
        if(in_array($GLOBALS['NAV_ASSIGNEVALUATOR'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination/evaluatorselection');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function assessmentcheck()
    {
        if(in_array($GLOBALS['NAV_ASSESSEXAMINATION'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination/assessmentcheck');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function createexam()
    {
        if(in_array($GLOBALS['NAV_EXAMINATION'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination/createexam');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function examresults()
    {
        if(in_array($GLOBALS['NAV_EXAMRESULT'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination/examresults');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function takeexam()
    {
        if(in_array($GLOBALS['NAV_TAKEEXAM'],$this->session->userdata('modules'))){
            $data = array('content'=>'mods/mod_recruitment/transaction/examination/takeexam');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }





}
