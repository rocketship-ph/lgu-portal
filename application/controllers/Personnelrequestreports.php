<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonnelRequestReports extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPersonnelRequestReport');
    }

    public function index()
    {
        $data = array(
            'content'=>'mods/mod_recruitment/report_generation/requestpersonnelreports'
        );
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function report1()
    {
        $getreport = $this->ModelPersonnelRequestReport->hasRows1();
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
        $getreport = $this->ModelPersonnelRequestReport->hasRows2();
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
        $getreport = $this->ModelPersonnelRequestReport->hasRows3();
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
        $getreport = $this->ModelPersonnelRequestReport->hasRows4();
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
