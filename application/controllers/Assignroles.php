<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignRoles extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelRolesConfig');
        $this->load->model('ModelUserManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = '';
        if($this->session->userdata('userlevel') == "ADMINISTRATOR"){
            $data = array('content'=>'mods/mod_recruitment/utilities/assignroles');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }

    public function users(){
        $userlevel = $_REQUEST['USERLEVEL'];
        $getusers = $this->ModelUserManagement->getUsers($userlevel);

        if($getusers){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getusers
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function modules(){
        $getmodules = $this->ModelRolesConfig->getRows();

        if($getmodules){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getmodules
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function getConfig(){
        $username = $_REQUEST['USERNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];

        $getconfig = $this->ModelRolesConfig->getConf($username,$userlevel);
        if($getconfig){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getconfig
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function assign(){
        $username = $_REQUEST['USERNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];
        $modules = $_REQUEST['MODULES'];

        $data = "";
        $subdata = ""; //no take exam module;
        $istakeexam = false;
        for($i=0;$i<sizeof($modules);$i++){
            if($modules[$i] == '3005' || $modules[$i] == 3005){
                $istakeexam = true;
            } else {
                $subdata .= "('".$username."','".$userlevel."','".$modules[$i]."'),";
            }
            $data .= "('".$username."','".$userlevel."','".$modules[$i]."'),";
        }
        $data = substr($data, 0, -1);
        $subdata = substr($subdata, 0, -1);


        if($istakeexam){
            $ispds = $this->ModelRolesConfig->pdsBinding($username);
            if($ispds){
                $assign = $this->ModelRolesConfig->assign($data,$username,$userlevel);
                if($assign){
                    $auditdata = array(
                        'modulename'=>'Account Module',
                        'action'=>'Assign Roles ['.$username.']',
                        'user'=>$this->session->userdata('username'),
                        'ipaddress'=> $_SERVER['REMOTE_ADDR']
                    );
                    $audit = $this->ModelAuditTrail->insert($auditdata);
                    $result = json_encode(array(
                        'Code' => '00',
                        'Message' => 'Successfully Assigned Roles'
                    ));
                } else{
                    $result = json_encode(array(
                        'Code' => '99',
                        'Message' => 'Role Assign Failed'
                    ));
                }
            } else {
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'Unable to assign role(s). Take Examination module requires Personnel Data Sheet (PDS) to be filled out first.'
                ));
            }
        } else {
            $assign = $this->ModelRolesConfig->assign($data,$username,$userlevel);
            if($assign){
                $auditdata = array(
                    'modulename'=>'Account Module',
                    'action'=>'Assign Roles ['.$username.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Assigned Roles'
                ));
            } else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'Role Assign Failed'
                ));
            }
        }
        echo $result;
    }
}
