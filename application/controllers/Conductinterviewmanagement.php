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
        $isevaluator = $this->ModelConductInterviewManagement->isevaluator($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'));
        if($isevaluator && $details){
            $applicants = $this->ModelConductInterviewManagement->getApplicants($_REQUEST['REQUESTNUMBER']);
            if($applicants){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details,
                    'applicants'=> $applicants
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details
                ));
            }
        } else if($details){
            $result = json_encode(array(
                'Code' => '05',
                'Message' => 'Successfully Fetched Data',
                'details' => $details,
                'applicants'=>'none'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found',
                'details'=>$details
            ));
        }
        echo $result;
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
        $existing = $this->ModelConductInterviewManagement->getAnsweredInterview($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'),$_REQUEST['APPLICANTCODE']);
        if($existing){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'answered'=>$existing
            ));
            echo $result;
        } else {
            $question = $this->ModelConductInterviewManagement->getQuestions($_REQUEST['REQUESTNUMBER']);
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
        $question1 = $_REQUEST['Q1'];
        $question2 = $_REQUEST['Q2'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $content = $_REQUEST['CONTENT'];
        $mechanics = $_REQUEST['MECHANICS'];
        $organization = $_REQUEST['ORGANIZATION'];
        $delivery = $_REQUEST['DELIVERY'];
        $oral = $_REQUEST['ORAL'];
        $analytical = $_REQUEST['ANALYTICAL'];
        $judgment = $_REQUEST['JUDGMENT'];
        $initiative = $_REQUEST['INITIATIVE'];
        $stress = $_REQUEST['STRESS'];
        $sensitivity = $_REQUEST['SENSITIVITY'];
        $service = $_REQUEST['SERVICE'];
        $behavioralave = $_REQUEST['BEHAVIORALAVE'];
        $pspttotal = $_REQUEST['PSPTTOTAL'];
        $comments = $_REQUEST['COMMENTS'];
        $json = $_REQUEST['JSON'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'question1' => $question1,
            'question2' => $question2,
            'json' => $json,
            'comments' => $comments,
            'requestnumber' => $reqnum,
            'evaluator' => $username,
            'applicantcode' => $applicantcode,
            'content' => $content,
            'mechanics' => $mechanics,
            'organization' => $organization,
            'delivery' => $delivery,
            'psptoral' => $oral,
            'psptanalytical' => $analytical,
            'psptjudgment' => $judgment,
            'psptinitiative' => $initiative,
            'psptstress' => $stress,
            'psptsensitivity' => $sensitivity,
            'psptservice' => $service,
            'oralaverage' => $behavioralave,
            'overalltotal' => $pspttotal,
        );

        $insert = $this->ModelConductInterviewManagement->insert($insertData);
        if($insert){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Conduct Interview ['.$reqnum.']['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Interview Answer Successfully Recorded'
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
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $content = $_REQUEST['CONTENT'];
        $mechanics = $_REQUEST['MECHANICS'];
        $organization = $_REQUEST['ORGANIZATION'];
        $delivery = $_REQUEST['DELIVERY'];
        $oral = $_REQUEST['ORAL'];
        $analytical = $_REQUEST['ANALYTICAL'];
        $judgment = $_REQUEST['JUDGMENT'];
        $initiative = $_REQUEST['INITIATIVE'];
        $stress = $_REQUEST['STRESS'];
        $sensitivity = $_REQUEST['SENSITIVITY'];
        $service = $_REQUEST['SERVICE'];
        $behavioralave = $_REQUEST['BEHAVIORALAVE'];
        $pspttotal = $_REQUEST['PSPTTOTAL'];
        $comments = $_REQUEST['COMMENTS'];
        $json = $_REQUEST['JSON'];
        $username = $this->session->userdata('username');

        $data = array(
            'json' => $json,
            'comments' => $comments,
            'content' => $content,
            'mechanics' => $mechanics,
            'organization' => $organization,
            'delivery' => $delivery,
            'psptoral' => $oral,
            'psptanalytical' => $analytical,
            'psptjudgment' => $judgment,
            'psptinitiative' => $initiative,
            'psptstress' => $stress,
            'psptsensitivity' => $sensitivity,
            'psptservice' => $service,
            'oralaverage' => $behavioralave,
            'overalltotal' => $pspttotal,
        );

        $update = $this->ModelConductInterviewManagement->update($data,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Edit Rating ['.$reqnum.']['.$applicantcode.']',
                'user'=>$username,
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant Interview Rating Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Applicant Interview Rating Update Failed'
            ));
        }
        echo $result;
    }

    public function inquirechanges(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $username = $this->session->userdata('username');
        $isanwered = $this->ModelConductInterviewManagement->isbi($reqnum,$username,$applicantcode);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Change applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Background investigation for applicant '.$applicantcode.' under request number: '.$reqnum.' has started thus, further changes to PSPT rating are prohibited.'
            ));
        }
        echo $result;
    }

    public function delete(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $appcode = $_REQUEST['APPLICANTCODE'];
        $username = $this->session->userdata('username');
        $delete = $this->ModelConductInterviewManagement->delete($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'Applicant Interview Module',
                'action'=>'Delete Answer ['.$reqnum.']['.$appcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant Interview Answer Deleted Successfully'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Applicant Interview Answer Delete Failed'
            ));
        }
        echo $result;
    }


}
