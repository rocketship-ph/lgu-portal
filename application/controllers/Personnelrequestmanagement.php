<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonnelRequestManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPersonnelRequestManagement');
        $this->load->model('ModelNotificationManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR CREATE NEW POSITION
    public function getRequestNumber(){
        $getAll = $this->ModelPersonnelRequestManagement->getNumber();

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
            $notifdata = array(
                'requestnumber'=>$requestnumber,
                'notiftype'=>'personnel request',
                'levelofapproval'=>'0',
                'tonotif'=>'HRMANAGER',
                'fromnotif'=>$this->session->userdata('username')
            );
            $notif = $this->ModelNotificationManagement->insertNotif($notifdata);
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

    public function approveRequest(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $requestor = $_REQUEST['REQUESTOR'];
        $userlevel = $this->session->userdata('userlevel');
        $username = $this->session->userdata('username');
        $name = $this->session->userdata('name');
        $approve = $this->ModelPersonnelRequestManagement->approveRequest($reqnum,$userlevel,$username,$name);
        if($approve){
            $lvl = '';
            if($userlevel == "HRMANAGER"){
                $lvl = '1';
            } else if ($userlevel == "MUNICIPALHEAD") {
                $lvl = '2';
            } else {
                $lvl = '';
            }
            $notifdata = array(
                'requestnumber'=>$reqnum,
                'notiftype'=>'personnel request',
                'levelofapproval'=>$lvl,
                'tonotif'=>$requestor,
                'fromnotif'=>$this->session->userdata('username')
            );
            $notif = $this->ModelNotificationManagement->insertNotif($notifdata);
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Approve Personnel Request',
                'user'=>$this->session->userdata('username').' - '.$this->session->userdata('userlevel'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personnel Request Successfully Approved',
                'RequestNumber'=>$reqnum
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Personnel Request Approval Failed'
            ));
        }
        echo $result;
    }

    public function rejectRequest(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $remarks = $_REQUEST['REMARKS'];
        $userlevel = $this->session->userdata('userlevel');
        $username = $this->session->userdata('username');
        $name = $this->session->userdata('name');
        $reject = $this->ModelPersonnelRequestManagement->rejectRequest($reqnum,$remarks,$userlevel,$username,$name);
        if($reject){
            $lvl = '';
            if($userlevel == "HRMANAGER"){
                $lvl = '91';
            } else if ($userlevel == "MUNICIPALHEAD") {
                $lvl = '92';
            } else {
                $lvl = '';
            }
            $notifdata = array(
                'requestnumber'=>$reqnum,
                'notiftype'=>'personnel request',
                'levelofapproval'=>$lvl,
                'tonotif'=>'',
                'fromnotif'=>$this->session->userdata('username')
            );
            $notif = $this->ModelNotificationManagement->insertNotif($notifdata);
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Reject Personnel Request',
                'user'=>$this->session->userdata('username').' - '.$this->session->userdata('userlevel'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personnel Request Rejected',
                'RequestNumber'=>$reqnum
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Personnel Request Reject Failed'
            ));
        }
        echo $result;
    }

    public function requestPublish(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');
        $name = $this->session->userdata('name');
        $data = array(
            'requestnumber' => $reqnum,
            'requestedby' => $name,
            'requestorusername' => $username,
            'status' => '0'
        );
        $reject = $this->ModelPersonnelRequestManagement->requestPublish($reqnum,$data);
        if($reject){
            $notifdata = array(
                'requestnumber'=>$reqnum,
                'notiftype'=>'personnel request',
                'levelofapproval'=>'3',
                'tonotif'=>'ITADMIN',
                'fromnotif'=>$this->session->userdata('username')
            );
            $notif = $this->ModelNotificationManagement->insertNotif($notifdata);
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Request to Publish Position',
                'user'=>$this->session->userdata('username').' - '.$this->session->userdata('userlevel'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Publish Request Submitted',
                'RequestNumber'=>$reqnum
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Request Failed'
            ));
        }
        echo $result;
    }

    public function publishPosition(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $url = $_REQUEST['URL'];
        $username = $this->session->userdata('username');
        $name = $this->session->userdata('name');
        $data = array(
            'publishedby' => $name,
            'publisherusername' => $username,
            'url' => $url
        );
        $reject = $this->ModelPersonnelRequestManagement->publishPosition($reqnum,$data);
        if($reject){
            $notifdata = array(
                'requestnumber'=>$reqnum,
                'notiftype'=>'personnel request',
                'levelofapproval'=>'4',
                'tonotif'=>'HRMANAGER',
                'fromnotif'=>$this->session->userdata('username')
            );
            $notif = $this->ModelNotificationManagement->insertNotif($notifdata);
            $auditdata = array(
                'modulename'=>'RSP Module',
                'action'=>'Publish Position',
                'user'=>$this->session->userdata('username').' - '.$this->session->userdata('userlevel'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Vacant Position Published',
                'RequestNumber'=>$reqnum
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Publish Failed'
            ));
        }
        echo $result;
    }

    public function dismissnotif(){
        $notifid = $_REQUEST['NOTIFID'];
        $username = $this->session->userdata('username');

        $data = array(
            'username' => $username,
            'notifid' => $notifid
        );
        $dismiss = $this->ModelNotificationManagement->dismissNotif($data);
        if($dismiss){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Notification Dismissed',
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Notification Dismiss Failed'
            ));
        }
        echo $result;
    }



    //FOR ANALYTICS:

    public function savetemporary(){

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
        $insert = $this->ModelPersonnelRequestManagement->insertTemporaryRequest($data,$requestnumber);
        if($insert){
            $educ = $this->ModelPersonnelRequestManagement->educationalanalytics($requestnumber);
            $pos = $this->ModelPersonnelRequestManagement->positionanalytics($requestnumber);
            $dept = $this->ModelPersonnelRequestManagement->departmentanalytics($requestnumber);
            if($educ && $pos && $dept){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Personnel Request Temporarily Created with Analytics Data Returned',
                    'educational' =>$educ,
                    'position' =>$pos,
                    'department' =>$dept
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '07',
                    'Message' => 'Personnel Request Temporarily Created with no Analytics Data available'
                ));
            }

        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Request Failed'
            ));
        }
        echo $result;
    }

public function acceptinvitation(){
        $appcode = $_REQUEST['APPCODE'];
        $notifid = $_REQUEST['NOTIFID'];
        $username = $this->session->userdata('username');

        $data = array(
            'username' => $username,
            'notifid' => $notifid
        );
        $acceptinv = $this->ModelPersonnelRequestManagement->acceptInv($appcode,$username);
        if($acceptinv){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Accepted Job Application Invitation',
            ));
            $dismiss = $this->ModelNotificationManagement->dismissNotif($data);
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Failed to Accept Job Application Invitation'
            ));
        }
        echo $result;
    }

    public function qualifiedemployees()
    {
        $data = $this->ModelPersonnelRequestManagement->getqualifiedemployees($_REQUEST['ISQUALIFIED']);
        if($data){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $data
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
