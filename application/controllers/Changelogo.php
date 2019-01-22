<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeLogo extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelLogoRequests');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = '';
        $data = array('content'=>'mods/mod_logo/logochange');
//        $this->load->view('templates/MasterTemplate',$data);
    }

    public function requests(){
        $getrequest = $this->ModelRequestManagement->getRows();

        if($getrequest){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getrequest
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function approve(){
        $domain = $_REQUEST['DOMAIN'];
        $reqid = $_REQUEST['REQUESTID'];
        $lguid = $_REQUEST['LGUID'];
        $arr = array(
            "DOMAIN"=>$domain,
            "LGU"=>$lguid,
            "REQID"=>$reqid
        );
        $token = base64_encode(json_encode($arr));
        $userData = array(
            'status' => 'APPROVED',
            'token' => $token
        );
        $approve = $this->ModelRequestManagement->updateRequest($userData,$reqid);
        if($approve){
            $auditdata = array(
                'modulename'=>'Logo Request Module',
                'action'=>'Approve Logo Change Request ['.$domain.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Approved Request'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function resetpassword(){
        $userid = $_REQUEST['USERNAME'];
        $firstname = $_REQUEST['FIRSTNAME'];
        $middlename = $_REQUEST['MIDDLENAME'];
        $lastname = $_REQUEST['LASTNAME'];
        $string = str_replace(' ', '', $lastname);
        $pass = $firstname[0].$middlename[0].$string;
        $userData = array(
            'password' => md5($this->genPass(strtoupper($pass),$userid))
        );

        $update = $this->ModelUserManagement->resetPassword($userData,$userid);
        if($update){
            $auditdata = array(
                'modulename'=>'Account Module',
                'action'=>'Reset User Password ['.$userid.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Reset Password'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Reset Password Failed'
            ));
        }
        echo $result;
    }

    function genPass($val,$val2){
        return base64_encode($val.$GLOBALS['crypt'].$val2);
    }
}
