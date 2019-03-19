<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamAssessmentManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelExamAssessmentManagement');
        $this->load->model('ModelNotificationManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelExamAssessmentManagement->getRequestnumbers($this->session->userdata('username'));

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

    public function displayapplicantcode(){
        $requests = $this->ModelExamAssessmentManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
        if($requests){
            $applicantcode = $this->ModelExamAssessmentManagement->getApplicantCode($_REQUEST['REQUESTNUMBER']);
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

    public function displayanswer(){
        $answers = $this->ModelExamAssessmentManagement->getExamAnswer($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'),$_REQUEST['APPLICANTCODE']);
        if($answers){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $answers
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function assessment(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $assessment = $_REQUEST['ASSESSMENT'];
        $grptbl = $_REQUEST['GROUPTBL'];
        $grppos = $_REQUEST['GROUPPOSITION'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $username = $this->session->userdata('username');

        $data = "";

        foreach($assessment as $key=>$value){
            $data .= "('".$reqnum."','".$applicantcode."','".$username."','".$value['title']."','".$value['criteriatype']."','".$value['level']."','".$value['weight']."','".$value['rating']."'),";
        }
        $data = substr($data, 0, -1);

        $insertData = array(
            'assessment' => base64_encode(json_encode($assessment)),
            'groupposition' => $grppos,
            'applicantcode' => $applicantcode,
            'requestnumber' => $reqnum,
            'grouptbl' => json_encode($grptbl),
            'evaluatorusername' => $username
        );
        $insert = $this->ModelExamAssessmentManagement->insert($insertData);
        if($insert){
            $competencyscores = $this->ModelExamAssessmentManagement->insertScores($data);
            $notifdata = array(
                'requestnumber'=>$reqnum,
                'levelofapproval'=>'100',
                'fromnotif'=>$username,
                'tonotif'=>'HRMANAGER',
                'notiftype'=>'EVALUATOR ASSESSMENT',
                'message'=>'Evaluator '.$username.' finished assessment for applicant: '.$applicantcode.' under requestnumber: '.$reqnum
            );
            $insertnotif = $this->ModelNotificationManagement->insertNotif($notifdata);

            $auditdata = array(
                'modulename'=>'Exam Assessment Module',
                'action'=>'Assess Exam ['.$reqnum.']['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Examination Assessment Successful'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Examination Assessment Failed'
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


    public function displayassessment(){
        $assessment = $this->ModelExamAssessmentManagement->getAssessment($_REQUEST['REQUESTNUMBER'],$_REQUEST['EVALUATOR'],$_REQUEST['APPLICANT']);
        if($assessment){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $assessment
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
