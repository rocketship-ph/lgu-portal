<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobapplicantreports extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelJobApplicationReport');
    }
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/report_generation/applicantreports'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function report1()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows1();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report2()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows2();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report3()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows3();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report4()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows4();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report5()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows5();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report6()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows6();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function report7()
    {
        $getreport = $this->ModelJobApplicationReport->hasRows7();
        if($getreport){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getreport
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
