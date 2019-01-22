<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudMfoPapManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelCrudMfoPapManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function strategicobjectives(){
        $userlevel = $this->session->userdata('userlevel');
        if($userlevel == 'HRMANAGER' || $userlevel == 'DEPARTMENTHEAD'){
            $strategicobjectives = $this->ModelCrudMfoPapManagement->getso(strtoupper($this->session->userdata('department')));
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
        } else {
            $result = json_encode(array(
                'Code' => '98',
                'Message' => 'Unauthorized account'
            ));
            echo $result;
        }
    }

    public function submitmfo(){
        $mfopap = $_REQUEST['MFOPAP'];
        $createdby = $this->session->userdata('username');
        $department = $this->session->userdata('department');

        $data = "";
        foreach($mfopap as $key=>$value){
            $data .= "('".$value['soid']."','".$createdby."','".$department."','".base64_encode($value['mfopap'])."','".$value['category']."','".base64_encode($value['successindicator'])."','1'),";
        }
        $data = substr($data, 0, -1);

        $assign = $this->ModelCrudMfoPapManagement->createmfopap($data);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Create MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Create MFO/PAP under the assigned Strategic Objective(s) for '.$department.' Department. Note that MFO/PAP(s) classified under Strategic Priorities are subject for approval before assigning to the employees of the department.'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'MFO/PAP Creation Failed. Please try again'
            ));
        }
        echo $result;
    }
}
