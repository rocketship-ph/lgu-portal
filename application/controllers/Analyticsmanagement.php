<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnalyticsManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAnalyticsManagement');
    }

    public function getrawdata()
    {
        $report = $this->ModelAnalyticsManagement->getrawdata();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
    public function getapplicantprofile(){
        $month = $_REQUEST['MONTH'];
        $year = $_REQUEST['YEAR'];
        $report = $this->ModelAnalyticsManagement->getapplicantprofile($month,$year);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
    public function getprofiles(){
        $report = $this->ModelAnalyticsManagement->getprofiles();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
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