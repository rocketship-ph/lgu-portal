<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelChangePassword');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = array('content'=>'mods/mod_usermanagement/changepassword');
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function changepassword(){
        $rowid = $this->session->userdata('id');
        $oldpass = $_REQUEST['OLDPASSWORD'];
        $newpass = $_REQUEST['NEWPASSWORD'];
        $checkpass = $this->ModelChangePassword->check(md5($this->genPass($oldpass,$this->session->userdata('username'))),$rowid);
        if($checkpass){
            $userData = array(
                'password' => md5($this->genPass($newpass,$this->session->userdata('username')))
            );
            $change = $this->ModelChangePassword->change($userData,$rowid);
            if($change){
                $auditdata = array(
                    'modulename'=>'Account Module',
                    'action'=>'Change User Password ['.$this->session->userdata("username").']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Changed Password'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'System is busy'
                ));
            }
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Invalid old password'
            ));
        }
        echo $result;
    }

    function genPass($val,$val2){
        return base64_encode($val.$GLOBALS['crypt'].$val2);
    }

}
