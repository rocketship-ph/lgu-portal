<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamResultReports extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelExamResultReport');
    }
    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/report_generation/examresultreports'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function report1()
    {
        $getreport = $this->ModelExamResultReport->hasRows1();
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
        $getreport = $this->ModelExamResultReport->hasRows2();
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
        $getreport = $this->ModelExamResultReport->hasRows3();
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
        $getreport = $this->ModelExamResultReport->hasRows4();
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
