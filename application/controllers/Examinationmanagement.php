<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExaminationManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelExaminationManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelExaminationManagement->getRequestnumbers($this->session->userdata('username'));

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

    public function displaygrouptable(){
        $exists = $this->ModelExaminationManagement->getExistingExam($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'));
        if($exists){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $exists,
                'type' => 'exam'
            ));
            echo $result;
        } else {
            $grouptbl = $this->ModelExaminationManagement->getGrouptable($_REQUEST['REQUESTNUMBER']);
            if($grouptbl){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $grouptbl,
                    'type' => 'grp'
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

    public function newexam(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $exam = $_REQUEST['EXAM'];
        $grptbl = $_REQUEST['GROUPTBL'];
        $grppos = $_REQUEST['GROUPPOSITION'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'exam' => base64_encode(json_encode($exam)),
            'groupposition' => $grppos,
            'requestnumber' => $reqnum,
            'grouptbl' => json_encode($grptbl),
            'createdby' => $this->session->userdata('username'),
            'lastmodifiedby' => $this->session->userdata('username')
        );

        $isanwered = $this->ModelExaminationManagement->isanswered($reqnum,$username);
        if($isanwered){
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'This examination is already being answered by the applicants thus, further changes are prohibited.'
            ));
            echo $result;
        } else {
            $insert = $this->ModelExaminationManagement->insert($insertData,$reqnum,$username);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Examination Module',
                    'action'=>'Create New Exam ['.$reqnum.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Examination Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Examination Creation Failed'
                ));
            }
            echo $result;
        }

    }

    public function updateexam(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $exam = $_REQUEST['EXAM'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'exam' => base64_encode(json_encode($exam)),
            'lastmodifiedby' => $this->session->userdata('username')
        );

        $isanwered = $this->ModelExaminationManagement->isanswered($reqnum,$username);
        if($isanwered){
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'This examination is already being answered by the applicants thus, further changes are prohibited.'
            ));
            echo $result;
        } else {
            $update = $this->ModelExaminationManagement->update($insertData,$reqnum,$username);
            if($update){
                $auditdata = array(
                    'modulename'=>'Examination Module',
                    'action'=>'Update Examination Questions ['.$reqnum.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Examination Successfully Updated'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Examination Update Failed'
                ));
            }
            echo $result;
        }

    }

    public function inquireedit(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');

        $isanwered = $this->ModelExaminationManagement->isanswered($reqnum,$username);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Edit applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'This examination has already been answered by the applicant(s) thus, further changes are prohibited.'
            ));
        }
        echo $result;
    }

    public function inquiredelete(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');

        $isanwered = $this->ModelExaminationManagement->isanswered($reqnum,$username);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Delete applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'This examination has already been answered by the applicant(s) thus, deletion is prohibited.'
            ));
        }
        echo $result;
    }

    public function deleteexam(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');
        $delete = $this->ModelExaminationManagement->delete($reqnum,$username);
        if($delete){
            $auditdata = array(
                'modulename'=>'Examination Module',
                'action'=>'Delete Exam ['.$reqnum.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Examination Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Examination Delete Failed'
            ));
        }
        echo $result;
    }


}
