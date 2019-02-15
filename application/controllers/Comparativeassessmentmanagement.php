<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComparativeAssessmentManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelComparativeAssessmentManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function getrequests(){
        $req = $this->ModelComparativeAssessmentManagement->getRequestnumbers();
        if($req){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $req
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));

        }
        echo $result;
    }

 public function summary(){
        $req = $this->ModelComparativeAssessmentManagement->getSummary($_REQUEST['REQUESTNUMBER']);
        $signatories = $this->ModelComparativeAssessmentManagement->getSignatories($_REQUEST['REQUESTNUMBER']);
        if($req){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $req,
                'signatories'=>$signatories
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));

        }
        echo $result;
    }


    public function displaydetails(){
        $internalapplicants = $this->ModelComparativeAssessmentManagement->getInternalApplicants($_REQUEST['REQUESTNUMBER']);
        if($internalapplicants){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $internalapplicants
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Either the user is not tagged as evaluator for the selected position request number or there are no available internal applicants to rate at the moment.',
            ));

        }
        echo $result;
    }

    public function forbi(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $appname = $_REQUEST['APPLICANTNAME'];


        $exists = $this->ModelComparativeAssessmentManagement->checkRecord($applicantcode);
        if($exists){
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Applicant '.$appname.' is already submitted for background investigation'
            ));
        } else {
            $forbi = $this->ModelComparativeAssessmentManagement->forBackground($applicantcode);
            if($forbi){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully submitted applicant '.$appname.' for background investigation'
                ));
                $auditdata = array(
                    'modulename'=>'Comparative Assessment Module',
                    'action'=>'Submit Applicant: '.$applicantcode.' for background investigation',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'Submission for background investigation failed'
                ));

            }
        }
        echo $result;
    }
}
