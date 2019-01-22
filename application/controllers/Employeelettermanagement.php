<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeLetterManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelEmployeeLetterManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function inserttempdata(){
        $inserttemp = $this->ModelEmployeeLetterManagement->insertDataTemp($_REQUEST['REQUESTNUMBER'],$_REQUEST['USERNAME']);

        if($inserttemp){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Inserted Temporary Applicant Data',
                'appcode'=>$inserttemp
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Failed to insert temp data'
            ));
        }
        echo $result;
    }

    public function getLetter(){
        $letter = $this->ModelEmployeeLetterManagement->getLetter($_REQUEST['TYPE'],$_REQUEST['USERNAME']);

        if($letter){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $letter
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function sendemail(){
        $from_email = "recruitment@prime-hrd.info";
        $to_email = $_REQUEST['EMAIL'];
        $subject = 'Job Application Invitation Letter ['.$_REQUEST['POSITION'].']';

        $this->load->library('email');

        $this->email->from($from_email, 'LGU Carmona');
        $this->email->to($to_email);

        $this->email->subject(utf8_encode(strtoupper($subject)));
        $this->email->message($_REQUEST['MESSAGE']);

        if($this->email->send()) {
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Email Successfully Sent to: '.$_REQUEST['EMAIL']
            ));
            $notifdata = array(
                'requestnumber'=>$_REQUEST['APPLICANTCODE'],
                'notiftype'=>'JOB INVITATION',
                'levelofapproval'=>'300',
                'tonotif'=>$_REQUEST['USERNAME'],
                'fromnotif'=>$this->session->userdata('username'),
                'status'=>'0',
                'message'=>'Job Application Invitation for Position Request '.$_REQUEST['REQUESTNUMBER'],
                'notifdetails'=>$_REQUEST['MESSAGE']
            );
            $insertNotif = $this->ModelEmployeeLetterManagement->insertNotif($notifdata);

//            $insertdata = array(
//                'requestnumber'=>$_REQUEST['REQUESTNUMBER'],
//                'applicantcode'=>$_REQUEST['APPLICANTCODE'],
//                'examdate'=>$_REQUEST['EXAMDATE'],
//                'examtime'=>$_REQUEST['EXAMTIME'],
//                'email'=>base64_encode($_REQUEST['MESSAGE']),
//                'user'=>$this->session->userdata('username')
//            );

//            $insert = $this->ModelEmployeeLetterManagement->insertExamDetails($insertdata,$_REQUEST['REQUESTNUMBER'],$_REQUEST['APPLICANTCODE']);
            $auditdata = array(
                'modulename'=>'Email Module',
                'action'=>'Sent Email [QUALIFIED-EMPLOYEE]['.$_REQUEST['EMAIL'].']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Email Not Sent'
            ));
        }
        echo $result;
    }


    public function examdetails(){
        $insertdata = array(
            'requestnumber'=>$_REQUEST['REQUESTNUMBER'],
            'applicantcode'=>$_REQUEST['APPLICANTCODE'],
            'examdate'=>$_REQUEST['EXAMDATE'],
            'examtime'=>$_REQUEST['EXAMTIME'],
            'email'=>base64_encode($_REQUEST['MESSAGE']),
            'user'=>$this->session->userdata('username')
        );
        $insert = $this->ModelEmployeeLetterManagement->insertExamDetails($insertdata,$_REQUEST['REQUESTNUMBER'],$_REQUEST['APPLICANTCODE']);

        if($insert){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Recorded Exam Details'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Record Failed'
            ));
        }
        echo $result;
    }

}
