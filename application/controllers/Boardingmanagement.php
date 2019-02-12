<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardingManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelBoardingManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function displayapplicantcode(){
        $appcode = $this->ModelBoardingManagement->getApplicantCode();
        if($appcode){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $appcode
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));

        }
        echo $result;
    }


    public function displayfocalperson(){
        $focalperson = $this->ModelBoardingManagement->getFocalPerson($_REQUEST['DEPARTMENT']);
        if($focalperson){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $focalperson
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));

        }
        echo $result;
    }

    public function boardapplicant(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $details = $_REQUEST['ORIENTATIONDETAILS'];
        $data = array(
            'isboarding'=>'YES',
            'orientationdetails'=>$details
        );

        $board = $this->ModelBoardingManagement->boardApplicant($data,$applicantcode);
            if($board){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully boarded applicant'
                ));
                $auditdata = array(
                    'modulename'=>'Applicant Boarding Module',
                    'action'=>'Onboard/Orient Newly-Hired Employee ['.$applicantcode.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'Applicant Boarding Failed'
                ));

            }
            echo $result;
        //BAKA IPABALIK
//        $existingid = $this->ModelBoardingManagement->checkExistingId($permanentid);
//        if($existingid){
//            $result = json_encode(array(
//                'Code' => '99',
//                'Message' => 'Applicant Boarding Failed. The given Permanent ID: '.$permanentid.' is already assigned to another employee.'
//            ));
//            echo $result;
//        } else {
//            $board = $this->ModelBoardingManagement->boardApplicant($data,$applicantcode);
//            if($board){
//                $result = json_encode(array(
//                    'Code' => '00',
//                    'Message' => 'Successfully Assigned Permanent ID to '.$applicantcode
//                ));
//            }else{
//                $result = json_encode(array(
//                    'Code' => '99',
//                    'Message' => 'Applicant Boarding Failed'
//                ));
//
//            }
//            echo $result;
//        }

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


}
