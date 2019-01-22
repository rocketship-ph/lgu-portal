<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotificationManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelNotificationManagement');
        $this->load->model('ModelAuditTrail');
    }

    //FOR NOTIFICATION
    public function display(){
        $getAll = '';
        $userlevel = $this->session->userdata('userlevel');
        $getAll = $this->ModelNotificationManagement->getNotifs($userlevel);
        if($userlevel =='DEPARTMENTHEAD'){
            $n = array();
            foreach($getAll as $key){
                if($key['levelofapproval'] == '100'){
                    array_push($n, $key);
                } else if ($key['createdby'] == $this->session->userdata('username') && (!($key['levelofapproval'] == '100'))){
                    array_push($n, $key);
                }
            }
            $notif = $n;
        } else {
            $notif = $getAll;
        }

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $notif
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displayRequestDetails(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $details = $this->ModelNotificationManagement->getReqDetails($reqnum);

        if($details){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $details
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displayApprovedRequestDetails(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $details = $this->ModelNotificationManagement->getApprovedReqDetails($reqnum);

        if($details){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $details
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function testbest(){
        $appcode = $_REQUEST['APPLICANTCODE'];
        $reqs = json_decode($_REQUEST['REQUIREMENTS']);

        foreach($reqs as $val){
            echo 'HEYEYEYE';
            echo $val;
        }
//        $appdetails = $this->ModelNotificationManagement->getApplicantData($appcode);
//
//        var_dump($appdetails);
//        foreach($appdetails as $key=>$value){
//           echo $value['username'];
//           echo $value['email'];
//        }

//        if($appdetails){
//            $this->composeEmail('345634343',$appdetails);
//        }

    }



//    =====================================
//    ||  SEND REQUIREMENT NOTIFICATION  ||
//    =====================================

    public function insertNotif(){

        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $notiftype = $_REQUEST['NOTIFTYPE'];
        $appcode = $_REQUEST['APPLICANTCODE'];
        $position = $_REQUEST['POSITION'];
        $letter = $_REQUEST['LETTER'];
        $applicant = $_REQUEST['APPLICANT'];

        $appdetails = $this->ModelNotificationManagement->getApplicantData($appcode);
        if($appdetails){
            foreach($appdetails as $key=>$value){
                $appusername = $value['username'];
                $appemail = $value['email'];
            }
        } else {
            $appusername = '';
            $appemail = '';
        }

        $data = array(
            'requestnumber' => $requestnumber,
            'notiftype' => $notiftype,
            'levelofapproval' => '200',
            'tonotif'=>$appusername,
            'fromnotif'=>$this->session->userdata('username'),
            'status'=>'0',
            'message'=>'Requirements to be submitted for application request: '.$requestnumber
        );
        $insert = $this->ModelNotificationManagement->insertNotif($data);
        if($insert){
            $auditdata = array(
                'modulename'=>'Notification Module',
                'action'=>'Send Requirement Notification ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $updateisbi = $this->ModelNotificationManagement->updateisbi($appcode);

            if(!($appemail == null || $appemail == "")){
                $this->composeEmail($requestnumber,$appemail,$letter,$position,$applicant);
            }
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Requirement notification successfully delivered to applicant '.$appcode
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Request Failed'
            ));
        }
        echo $result;
    }



    public function composeEmail($requestnumber,$appemail,$letter,$position,$applicant){

        $from_email = "recruitment@prime-hrd.info";
        $subject = 'Applicant Requirements List ['.$position.']';
        $message = 'Dear '.$applicant.',<br><br><br>Congratulations! You have passed the background investigation for the position <b>'.$position.'</b> under request number <b>'.$requestnumber.'</b>.<br> In line with this, kindly take note of the following details and submit the requirements listed below:<br><br><hr>'.$letter.'<br><br>Sincerely,<br><br><br><b>'.$this->session->userdata('name').'</b><br>Manager<br>Human Resource Department<br><br><br><br>***This is a system generated email. Please do not reply.***';

        $this->load->library('email');

        $this->email->from($from_email, 'LGU Carmona');
        $this->email->to($appemail);

        $this->email->subject(utf8_encode(strtoupper($subject)));
        $this->email->message($message);

        try {
            $this->email->send();
            log_message('info', 'email sent: '.$appemail);
        } catch(Exception $e){
            log_message('error', $e);
        }
    }

//    =====================================
//    || END OF REQUIREMENT NOTIFICATION ||
//    =====================================

    public function getRequests(){
        $getAll = $this->ModelPersonnelRequestManagement->requests();

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


    public function newRequest(){

        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $positionid = $_REQUEST['POSITIONID'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $departmentid = $_REQUEST['DEPARTMENTID'];
        $department = $_REQUEST['DEPARTMENT'];
        $experience = $_REQUEST['EXPERIENCE'];
        $training = $_REQUEST['TRAINING'];
        $eligibility = $_REQUEST['ELIGIBILITY'];

        $data = array(
            'requestnumber' => $requestnumber,
            'positionid' => $positionid,
            'positioncode' => $positioncode,
            'departmentid' => $departmentid,
            'department' => $department,
            'experience' => $experience,
            'training' => $training,
            'eligibility' => $eligibility,
            'requestorname' => $this->session->userdata('name'),
            'levelofapproval' => '0',
            'status' => '0',
            'createdby' => $this->session->userdata('username')
        );
        $insert = $this->ModelPersonnelRequestManagement->insertNewRequest($data);
        if($insert){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Create New Requesrt ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personnel Request Created'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Request Failed'
            ));
        }
        echo $result;
    }

    public function updateRequest(){
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $positionid = $_REQUEST['POSITIONID'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $departmentid = $_REQUEST['DEPARTMENTID'];
        $department = $_REQUEST['DEPARTMENT'];
        $experience = $_REQUEST['EXPERIENCE'];
        $training = $_REQUEST['TRAINING'];
        $eligibility = $_REQUEST['ELIGIBILITY'];

        $data = array(
            'positionid' => $positionid,
            'positioncode' => $positioncode,
            'departmentid' => $departmentid,
            'department' => $department,
            'experience' => $experience,
            'training' => $training,
            'eligibility' => $eligibility
        );
        $update = $this->ModelPersonnelRequestManagement->updateRequest($data,$requestnumber);
        if($update){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Update Personnel Request Details',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personnel Request Details Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Personnel Request Update Failed'
            ));
        }
        echo $result;
    }

    public function deleteRequest(){
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelPersonnelRequestManagement->deleteRequest($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Delete Personnel Request',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personnel Request Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Personnel Request Delete Failed'
            ));
        }
        echo $result;
    }

	public function displayinvitations(){
        $getInv = $this->ModelNotificationManagement->getJobInvitationNotifs();
        if($getInv){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getInv
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }
}
