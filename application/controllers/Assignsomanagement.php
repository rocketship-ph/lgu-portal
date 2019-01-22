<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignSoManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAssignSoManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function departments(){
        $departments = $this->ModelAssignSoManagement->getdepartments();

        if($departments){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $departments
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function strategicobjectives(){
        $strategicobjectives = $this->ModelAssignSoManagement->getstrategicobjectives();

        if($strategicobjectives){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $strategicobjectives
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
        $department = $_REQUEST['DEPARTMENT'];
        $getconfig = $this->ModelAssignSoManagement->getConf($department);
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
        $department = $_REQUEST['DEPARTMENT'];
        $objectives = $_REQUEST['OBJECTIVES'];
        $assignedby = $this->session->userdata('username');

        $data = "";
        for($i=0;$i<sizeof($objectives);$i++){
            $data .= "('".$assignedby."','".$department."','".$objectives[$i]."'),";
        }
        $data = substr($data, 0, -1);

        $assign = $this->ModelAssignSoManagement->assign($data,$department);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Assign Strategic Objectives ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Assigned Strategic Objectives to '.$department.' Department'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Strategic Objectives Assign Failed'
            ));
        }
        echo $result;
    }
}
