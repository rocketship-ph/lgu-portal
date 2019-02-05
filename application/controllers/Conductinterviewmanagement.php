<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConductInterviewManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelConductInterviewManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelConductInterviewManagement->getRequestnumbers();

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

    public function displayrequestdetails(){
        $details = $this->ModelConductInterviewManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
        if($details){
            $evaluators = $this->ModelConductInterviewManagement->getEvaluators($_REQUEST['REQUESTNUMBER']);
            if($evaluators){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details,
                    'evaluators'=>$evaluators
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details
                ));
            }
            echo $result;
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }
    }

    public function displayapplicants(){
        $applicants = $this->ModelConductInterviewManagement->getApplicants($_REQUEST['REQUESTNUMBER']);

        if($applicants){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $applicants
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function displayquestion(){
        $existing = $this->ModelConductInterviewManagement->getAnsweredBi($_REQUEST['REQUESTNUMBER'],$_REQUEST['USERNAME'],$_REQUEST['APPLICANTCODE']);
        if($existing){
            $question = $this->ModelConductInterviewManagement->getQuestions($_REQUEST['REQUESTNUMBER'],$_REQUEST['USERNAME']);
            if($question){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $question,
                    'answered'=>$existing
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        } else {
            $question = $this->ModelConductInterviewManagement->getQuestions($_REQUEST['REQUESTNUMBER'],$_REQUEST['USERNAME']);
            if($question){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $question
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

    public function conduct(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $answer = $_REQUEST['ANSWER'];
        $encodedby = $_REQUEST['EVALUATOR'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'question' => base64_encode($question),
            'answer' => base64_encode($answer),
            'requestnumber' => $reqnum,
            'encodedby' => $encodedby,
            'conductedby' => $username,
            'applicantcode' => $applicantcode,
        );

        $insert = $this->ModelConductInterviewManagement->insert($insertData);
        if($insert){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Conduct Background Investigation ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Answer Successfully Recorded'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Record Failed'
            ));
        }
        echo $result;
    }

    public function edit(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $answer = $_REQUEST['ANSWER'];
        $username = $this->session->userdata('username');

        $data = array(
            'answer' => base64_encode($answer),
            'modifiedby'=>$username
        );

        $update = $this->ModelConductInterviewManagement->update($data,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Edit Answer ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Answer Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Background Investigation Answer Updated Failed'
            ));
        }
        echo $result;
    }

    public function inquirechanges(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $evaluator = $_REQUEST['EVALUATOR'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];

        $isanwered = $this->ModelConductInterviewManagement->isanswered($reqnum,$evaluator,$applicantcode);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Change applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Background assessment for applicant '.$applicantcode.' under request number: '.$reqnum.' has started thus, further changes are prohibited.'
            ));
        }
        echo $result;
    }

    public function delete(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');
        $delete = $this->ModelConductInterviewManagement->delete($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Delete Answer ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Answer Deleted Successfully'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Background Investigation Answer Delete Failed'
            ));
        }
        echo $result;
    }


}
