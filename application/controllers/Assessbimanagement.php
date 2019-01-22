<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssessBiManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAssessBiManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelAssessBiManagement->getRequestnumbers($this->session->userdata('username'));

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
        $details = $this->ModelAssessBiManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
        if($details){
            $applicants = $this->ModelAssessBiManagement->getApplicants($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'));
            if($applicants){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details,
                    'applicants'=>$applicants
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


    public function displayquestion(){
        $answer = $this->ModelAssessBiManagement->getAnsweredBi($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'),$_REQUEST['APPLICANTCODE']);
        if($answer){
            $question = $this->ModelAssessBiManagement->getQuestions($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'));
            if($question){
                $assessed = $this->ModelAssessBiManagement->getAssessed($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'),$_REQUEST['APPLICANTCODE']);
                if($assessed){
                    $result = json_encode(array(
                        'Code' => '00',
                        'Message' => 'Successfully Fetched Data',
                        'details' => $question,
                        'assessed' => $assessed,
                        'answered'=>$answer
                    ));
                } else {
                    $result = json_encode(array(
                        'Code' => '00',
                        'Message' => 'Successfully Fetched Data',
                        'details' => $question,
                        'answered'=>$answer
                    ));
                }
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        } else {
            $question = $this->ModelAssessBiManagement->getQuestions($_REQUEST['REQUESTNUMBER'],$_REQUEST['USERNAME']);
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

    public function assess(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $answer = $_REQUEST['ANSWER'];
        $encodedby = $_REQUEST['ENCODEDBY'];
        $conductedby = $_REQUEST['CONDUCTEDBY'];
        $rating = $_REQUEST['RATING'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $username = $this->session->userdata('username');

        $data = array(
            'question' => base64_encode($question),
            'answer' => base64_encode($answer),
            'requestnumber' => $reqnum,
            'encodedby' => $encodedby,
            'conductedby' => $conductedby,
            'applicantcode' => $applicantcode,
            'rating' => $rating,
            'assessedby' => $username
        );

        $assess = $this->ModelAssessBiManagement->assess($data);
        if($assess){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Assess Background Investigation ['.$reqnum.']['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation for '.$applicantcode.' Successfully Assessed'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Background Investigation Assessment Failed'
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

        $update = $this->ModelConductBiManagement->update($data,$rowid);
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

        $isanwered = $this->ModelConductBiManagement->isanswered($reqnum,$evaluator,$applicantcode);
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
        $delete = $this->ModelConductBiManagement->delete($rowid);
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
