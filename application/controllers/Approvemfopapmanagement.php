<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApproveMfoPapManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelApproveMfoPapManagement');
        $this->load->model('ModelCrudMfoPapManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function departments(){
        $departments = $this->ModelApproveMfoPapManagement->getdepartments();

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

    public function mfopap(){
        $mfopap = $this->ModelApproveMfoPapManagement->getmfopap($_REQUEST['DEPARTMENT']);

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

    public function strategicobjectives(){
        $strategicobjectives = $this->ModelCrudMfoPapManagement->getso($_REQUEST['DEPARTMENT']);

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

    public function editmfopap(){
        $id = $_REQUEST['ROWID'];
        $mfopap = $_REQUEST['MFOPAP'];
        $successindicator = $_REQUEST['SUCCESSINDICATOR'];
        $budget = $_REQUEST['BUDGET'];
        $department = $_REQUEST['DEPARTMENT'];

        $data = array(
            'mfopap' => base64_encode($mfopap),
            'successindicator' => base64_encode($successindicator),
            'allottedbudget' => str_replace(",","",$budget)
        );
        $update = $this->ModelApproveMfoPapManagement->update($data,$id);
        if($update){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Update MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated MFO/PAP of '.$department.' Department'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'MFO/PAP Update Failed'
            ));
        }
        echo $result;
    }

     public function addmfopap(){
        $soid = $_REQUEST['SOID'];
        $mfopap = $_REQUEST['MFOPAP'];
        $successindicator = $_REQUEST['SUCCESSINDICATOR'];
        $budget = $_REQUEST['BUDGET'];
        $department = $_REQUEST['DEPARTMENT'];
        $so = $_REQUEST['STRATEGICOBJECTIVE'];
        $category = $_REQUEST['CATEGORY'];

        $data = array(
            'soid' => $soid,
            'createdby' => $this->session->userdata('username'),
            'department' => $department,
            'mfopap' => base64_encode($mfopap),
            'category' => $category,
            'successindicator' => base64_encode($successindicator),
            'allottedbudget' => str_replace(",","",$budget),
            'status' => '1'
        );
        $insert = $this->ModelApproveMfoPapManagement->insert($data);
        if($insert){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Add MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Added MFO/PAP for '.$department.' Department'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'MFO/PAP Add Failed'
            ));
        }
        echo $result;
    }

    public function deletemfopap(){
        $id = $_REQUEST['ROWID'];
        $department = $_REQUEST['DEPARTMENT'];

        $delete = $this->ModelApproveMfoPapManagement->delete($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Delete MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Deleted MFO/PAP of '.$department.' Department'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'MFO/PAP Delete Failed'
            ));
        }
        echo $result;
    }

    public function approvemfopap(){
        $department = $_REQUEST['DEPARTMENT'];
        $ids = $_REQUEST['IDS'];

        $data = "";
        for($i=0;$i<sizeof($ids);$i++){
            $data .= "'".$ids[$i]."',";
        }
        $data = substr($data, 0, -1);

        $assign = $this->ModelApproveMfoPapManagement->approve($data);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Approve MFO/PAP ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Approved MFO/PAP submitted by '.$department.' Department'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'MFO/PAP Approve Failed'
            ));
        }
        echo $result;
    }



}
