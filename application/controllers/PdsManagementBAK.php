<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdsManagementbak extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPdsManagement');
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


    public function insert(){
        $pdsdetails = array(
            'username' => $this->session->userdata('username'),
            'firstname' => $_REQUEST['FIRSTNAME'],
            'middlename' => $_REQUEST['MIDDLENAME'],
            'lastname' => $_REQUEST['SURNAME'],
            'nameextension' => $_REQUEST['NAMEEXTENSION'],
            'dateofbirth' => $_REQUEST['DOB'],
            'placeofbirth' => $_REQUEST['PLACEOFBIRTH'],
            'sex' => $_REQUEST['SEX'],
            'civilstatus' => $_REQUEST['CIVILSTATUS'],
            'citizenship' => $_REQUEST['CITIZENSHIP'],
            'height' => $_REQUEST['HEIGHT'],
            'weight' => $_REQUEST['WEIGHT'],
            'bloodtype' => $_REQUEST['BLOODTYPE'],
            'gsisidno' => $_REQUEST['GSISNO'],
            'pagibigidno' => $_REQUEST['PAGIBIGNO'],
            'philhealthidno' => $_REQUEST['PHILHEALTHNO'],
            'sssidno' => $_REQUEST['SSSNO'],
            'tin' => $_REQUEST['TIN'],
            'residentialzipcode' => $_REQUEST['RESIDENTIALZIP'],
            'residentialtelno' => $_REQUEST['RESIDENTIALTELNO'],
            'residentialaddress' => $_REQUEST['RESIDENTIALADDRESS'],
            'permanentaddress' => $_REQUEST['PERMANENTADDRESS'],
            'permanentzipcode' => $_REQUEST['PERMANENTZIP'],
            'permanenttelno' => $_REQUEST['PERMANENTTELNO'],
            'email' => $_REQUEST['EMAIL'],
            'cellphoneno' => $_REQUEST['CELLPHONENO'],
            'agencyemployeeno' => $_REQUEST['AGENCYNO'],
            'spouselastname' => $_REQUEST['SPOUSELNAME'],
            'spousefirstname' => $_REQUEST['SPOUSEFNAME'],
            'spousemiddlename' => $_REQUEST['SPOUSEMNAME'],
            'occupation' => $_REQUEST['SPOUSEOCCUPATION'],
            'employer' => $_REQUEST['SPOUSEEMPLOYER'],
            'businessaddress' => $_REQUEST['SPOUSEBUSINESSADDRESS'],
            'telno' => $_REQUEST['SPOUSETELNO'],
            'fatherlastname' => $_REQUEST['FATHERLNAME'],
            'fatherfirstname' => $_REQUEST['FATHERFNAME'],
            'fathermiddlename' => $_REQUEST['FATHERMNAME'],
            'motherlastname' => $_REQUEST['MOTHERLNAME'],
            'motherfirstname' => $_REQUEST['MOTHERFNAME'],
            'childrendetails' => json_encode($_REQUEST['CHILDREN']),
            'elementary' => json_encode($_REQUEST['ELEMENTARY']),
            'highschool' => json_encode($_REQUEST['HIGHSCHOOL']),
            'vocational' => json_encode($_REQUEST['COLLEGE']),
            'college' => json_encode($_REQUEST['COLLEGE']),
            'graduate' => json_encode($_REQUEST['GRADUATE'])
        );

        $username = $this->session->userdata('username');
        $pdscivilservice = "";
        $cse = $_REQUEST['CIVILSERVICE'];
        foreach ($cse as $key => $json) {
            $careerservice = $json['careerservice'];
            $rating = $json['rating'];
            $examdate = $json['examdate'];
            $place = $json['examplace'];
            $licenseno = $json['licenseno'];
            $licensedate = $json['licensedate'];
            $pdscivilservice .= "('".$username."','".$careerservice."','".$rating."','".$examdate."','".$place."','".$licenseno."','".$licensedate."'),";
        }
        $csedata = substr($pdscivilservice, 0, -1);

        $workexp = "";
        $wrk = $_REQUEST['WORKEXPERIENCE'];
        foreach ($wrk as $key => $json) {
            $fromdate = $json['fromdate'];
            $todate = $json['todate'];
            $position = $json['position'];
            $company = $json['company'];
            $salary = $json['salary'];
            $salarygrade = $json['salarygrade'];
            $appointmentstatus = $json['appointmentstatus'];
            $govtservice = $json['govtservice'];
            $workexp .= "('".$username."','".$fromdate."','".$todate."','".$position."','".$company."','".$salary."','".$salarygrade."','".$appointmentstatus."','".$govtservice."'),";
        }
        $wrkdata = substr($workexp, 0, -1);

        $volwrk = "";
        $vwrk = $_REQUEST['VOLUNTARYWORK'];
        foreach ($vwrk as $key => $json) {
            $organization = $json['organization'];
            $fromdate = $json['fromdate'];
            $todate = $json['todate'];
            $hours = $json['hours'];
            $position = $json['position'];
            $volwrk .= "('".$username."','".$organization."','".$fromdate."','".$todate."','".$hours."','".$position."'),";
        }
        $volwrkdata = substr($volwrk, 0, -1);

        $trainingprogs = "";
        $tp = $_REQUEST['TRAININGPROGRAMS'];
        foreach ($tp as $key => $json) {
            $title = $json['title'];
            $fromdate = $json['fromdate'];
            $todate = $json['todate'];
            $hours = $json['hours'];
            $conductedby = $json['conductedby'];
            $trainingprogs .= "('".$username."','".$title."','".$fromdate."','".$todate."','".$hours."','".$conductedby."'),";
        }
        $trainingprodsdata = substr($trainingprogs, 0, -1);

        $other1 = "";
        $oth = $_REQUEST['OTHER1'];
        foreach ($oth as $key => $json) {
            $specialskills = $json['specialskills'];
            $recognitions = $json['recognitions'];
            $membership = $json['membership'];
            $other1 .= "('".$username."','".$specialskills."','".$recognitions."','".$membership."'),";
        }
        $other1data = substr($other1, 0, -1);

        $otherdata2 = array(
            'username'=>$username,
            'questions'=>json_encode($_REQUEST['QAS']),
            'characterreferences'=>json_encode($_REQUEST['CHARACTERREF'])
        );
        $insert = $this->ModelPdsManagement->insert($username,$pdsdetails,$csedata,$other1data,$otherdata2,$trainingprodsdata,$volwrkdata,$wrkdata);
        if($insert){
            $auditdata = array(
                'modulename'=>'PDS Module',
                'action'=>'Create Personal Data Sheet ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Personal Data Sheet Created'
            ));
        }else{
            $deleteinserted = $this->ModelPdsManagement->deletefailed($username);
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Record Failed'
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
        $userlevel = $this->session->userdata('userlevel');
        $username = $this->session->userdata('username');
        $name = $this->session->userdata('name');
        $approve = $this->ModelPersonnelRequestManagement->approveRequest($reqnum,$userlevel,$username,$name);
        if($approve){
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
}
