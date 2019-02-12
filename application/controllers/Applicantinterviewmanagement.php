<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantInterviewManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelApplicantInterviewManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelApplicantInterviewManagement->getRequestnumbers();

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
        $existing = $this->ModelApplicantInterviewManagement->getEncodedInterview($_REQUEST['REQUESTNUMBER']);
        if($existing){
            $details = $this->ModelApplicantInterviewManagement->getRequestdetails($_REQUEST['TECHNICAL']);
            if($details){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details,
                    'existing'=>$existing
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        } else {
            $details = $this->ModelApplicantInterviewManagement->getRequestdetails($_REQUEST['TECHNICAL']);
            if($details){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        }

    }

    public function newquestion(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $additional = $_REQUEST['ADDITIONAL'];
        $competencyid = $_REQUEST['COMPETENCYID'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'question' => base64_encode($question),
            'amendment' => base64_encode($additional),
            'requestnumber' => $reqnum,
            'competencyid' => $competencyid,
            'createdby' => $username
        );

        $insert = $this->ModelApplicantInterviewManagement->insert($insertData);
        if($insert){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Create New Interview Question ['.$reqnum.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant Interview Question Successfully Created'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Question Creation Failed'
            ));
        }
        echo $result;
    }

    public function editquestion(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $username = $this->session->userdata('username');
        $additional = $_REQUEST['ADDITIONAL'];
        $competencyid = $_REQUEST['COMPETENCYID'];

        $data = array(
            'question' => base64_encode($question),
            'amendment' => base64_encode($additional),
            'competencyid' => $competencyid,
            'lasteditby' => $username
        );

        $update = $this->ModelApplicantInterviewManagement->update($data,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Edit Question ['.$reqnum.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant Interview Question Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Question Updated Failed'
            ));
        }
        echo $result;
    }

    public function inquirechanges(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');

        $isanwered = $this->ModelApplicantInterviewManagement->isanswered($reqnum,$username);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Change applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Applicant Interview for this request number has started thus, further changes are prohibited.'
            ));
        }
        echo $result;
    }

    public function deletequestion(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');
        $delete = $this->ModelApplicantInterviewManagement->delete($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Delete Interview Question ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant Interview Question Deleted Successfully'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Applicant Interview Question Delete Failed'
            ));
        }
        echo $result;
    }


}
