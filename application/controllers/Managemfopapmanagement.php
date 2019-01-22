<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManageMfoPapManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelManageMfoPapManagement');
        $this->load->model('ModelCrudMfoPapManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function departments(){
        $departments = $this->ModelManageMfoPapManagement->getdepartments();

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

    public function availablemfopap(){
        $mfopap = $this->ModelManageMfoPapManagement->getavailablemfopap($this->session->userdata('department'));

        if($mfopap){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $mfopap
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function pendingmfopap(){
        $mfopap = $this->ModelManageMfoPapManagement->getpendingmfopap($this->session->userdata('department'));

        if($mfopap){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $mfopap
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function pendingspecialtask(){
        $mfopap = $this->ModelManageMfoPapManagement->getpendingspecialtask($this->session->userdata('department'));

        if($mfopap){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $mfopap
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

  public function approvalspecialtask(){
        $mfopap = $this->ModelManageMfoPapManagement->getapprovalspecialtask($this->session->userdata('department'));

        if($mfopap){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $mfopap
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function employees(){
        $employees = $this->ModelManageMfoPapManagement->getemployees($_REQUEST['DESIGNATION']);

        if($employees){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $employees
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function assignemployees(){
        $employees = $_REQUEST['EMPLOYEES'];
        $createdby = $this->session->userdata('username');
        $department = $this->session->userdata('department');

        $data = "";
        $mfos="";
        $status = '';
        foreach($employees as $key=>$value){
            if($value['designation'] == 'OTHER'){
                $status = '1';
            } else {
                $status = '0';
            }
            $data .= "('".$value['mfopapid']."','".$value['username']."','".$value['department']."','".$value['designation']."','".$createdby."','".$status."'),";
            $mfos .="'".$value['mfopapid']."',";
        }
        $data = substr($data, 0, -1);
        $data2 = substr($mfos, 0, -1);
        $assign = $this->ModelManageMfoPapManagement->assignmfopap($data,$data2);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Assign MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully assigned MFO/PAP to Employees. Note that MFO/PAP(s) assigned to employees from other department are subject for approval by their respective department heads before it reflects on their IPCR.'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'MFO/PAP Assign Failed. Please try again'
            ));
        }
        echo $result;
    }


    public function approvespecialtask(){
        $id = $_REQUEST['ROWID'];
        $department = $_REQUEST['DEPARTMENT'];

        $assign = $this->ModelManageMfoPapManagement->approvetask($id);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Approve Special Task ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully approved special task assigned to personnel in the department'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Special task approval failed. Please try again'
            ));
        }
        echo $result;
    }

    public function rejectspecialtask(){
        $id = $_REQUEST['ROWID'];
        $department = $_REQUEST['DEPARTMENT'];

        $assign = $this->ModelManageMfoPapManagement->rejecttask($id);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Reject Special Task ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully rejected special task assigned to personnel in the department'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Special task reject failed. Please try again'
            ));
        }
        echo $result;
    }



}
