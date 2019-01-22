<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamResultsManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelExamResultsManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelExamResultsManagement->getRequestnumbers();

        if($requests){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $requests
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function displayexamresults() {
        $result = $this->ModelExamResultsManagement->getExamResultsNew($_REQUEST['REQUESTNUMBER'],$_REQUEST['APPLICANTCODE']);
        if($result){
            $grp = $this->ModelExamResultsManagement->getGroup($_REQUEST['REQUESTNUMBER']);
            if($grp){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $result,
                    'group' => $grp
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $result
                ));
            }
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }
    }

    public function displayresults(){
        $result = $this->ModelExamResultsManagement->getExamResults($_REQUEST['REQUESTNUMBER'],$_REQUEST['APPLICANTCODE']);
        if($result){
            $counts = $this->ModelExamResultsManagement->getCounts($_REQUEST['REQUESTNUMBER']);
            $grp = $this->ModelExamResultsManagement->getGroup($_REQUEST['REQUESTNUMBER']);
            if($counts){
//                var_dump($result);
//                var_dump($counts);
//                var_dump($grp);
//                $type =
//                foreach($result as $key=>$value){
//                    $res = $value['appnumber'];
//                }
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $result,
                    'counts' => $counts,
                    'group' => $grp
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $result
                ));
            }
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }

    }

    public function displayapplicantcode(){
        $requests = $this->ModelExamResultsManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
        if($requests){
            $applicantcode = $this->ModelExamResultsManagement->getApplicantCode($_REQUEST['REQUESTNUMBER']);
            if($applicantcode){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $requests,
                    'applicant'=>$applicantcode
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $requests
                ));
            }
            echo $result;
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }

    }

    public function displayresultapplicant(){
        $examresult = $this->ModelExamResultsManagement->getApplicantExamDetails($_REQUEST['APPLICANTCODE']);
        if($examresult){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $examresult
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;

    }

}
