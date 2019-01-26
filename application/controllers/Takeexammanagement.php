<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TakeExamManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelTakeExamManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelNotificationManagement');
    }

    public function displayevaluators(){
        $evaluators = $this->ModelTakeExamManagement->getEvaluators($this->session->userdata('requestnumber'));
        if($evaluators){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $evaluators
            ));
            echo $result;
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }
    }

    public function displayexam(){
        $questions = $this->ModelTakeExamManagement->getExam($this->session->userdata('requestnumber'));
        $hasanswers = $this->ModelTakeExamManagement->hasAnswers($this->session->userdata('requestnumber'));
        if($questions){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $questions
            ));
            echo $result;
        } else if($hasanswers){
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Examination already taken by the applicant. Please wait for evaluator assessment.'
            ));
            echo $result;
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
            echo $result;
        }
    }

    public function insertanswer(){
        $grptbl = $_REQUEST['GROUPTBL'];
        $grppos = $_REQUEST['GROUPPOSITION'];
        $reqnum = $this->session->userdata('requestnumber');
        $exam = $_REQUEST['EXAM'];
        $applicantcode = $this->session->userdata('applicantcode');

        $insertData = array(
            'exam' => base64_encode(json_encode($exam)),
            'applicantcode' => $applicantcode,
            'groupposition' => $grppos,
            'requestnumber' => $reqnum,
            'grouptbl' => json_encode($grptbl)
        );
        $evaluators = $this->ModelTakeExamManagement->getEvaluators($reqnum);
        $insert = $this->ModelTakeExamManagement->insert($insertData);
        if($insert){
            foreach($evaluators as $key=>$value){
                $notif = array(
                    'requestnumber'=>$reqnum,
                    'notiftype'=>'TAKE EXAM',
                    'levelofapproval'=>'100',
                    'tonotif'=>$value['evaluatorusername'],
                    'fromnotif'=>$this->session->userdata('username'),
                    'status'=>'0',
                    'message'=>'Applicant '.$applicantcode.' has answered the examination under Position Request: '.$reqnum
                );
                $notifdata = $this->ModelNotificationManagement->insertNotif($notif);
            }
            $auditdata = array(
                'modulename'=>'Examination Module',
                'action'=>'Take Exam ['.$reqnum.']['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Examination answer successfully recorded. Please wait for the designated evaluator(s) to assess your answers.'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Examination Answer Record Failed'
            ));
        }
        echo $result;

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
