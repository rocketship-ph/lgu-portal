<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmtselectionmanagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPmtSelectionManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR DEPARTMENT PROFILE
    public function displayUsers(){
        $so = $this->ModelPmtSelectionManagement->getUsers();

        if($so){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $so
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function newPmtLead(){
        $name = $_REQUEST['EVALUATORNAME'];
        $username = $_REQUEST['USERNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];
        $position = $_REQUEST['POSITION'];
        $department = $_REQUEST['DEPARTMENT'];
        $role = "PMT_HEAD";

        $existing = $this->CheckExistingRecord->checkPmtLead($username, $role);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The selected user is already the PMT lead'
            ));
            echo $result;
        } else {
            $insertData = array(
                'evaluatorname' => $name,
                'username' => $username,
                'assignedby' => $this->session->userdata('username'),
                'userlevel'=> $userlevel,
                'position'=> $position,
                'department'=>$department,
                'status'=>0,
                'role'=>$role
            );
            $insert = $this->ModelPmtSelectionManagement->insert($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'PMT Selection Module',
                    'action'=>'Create New PMT Lead ['.$name.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'PMT Lead Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'PMT Lead Registration Failed'
                ));
            }
            echo $result;
        }
    }

    public function updatepmtlead(){
        $name = $_REQUEST['EVALUATORNAME'];
        $username = $_REQUEST['USERNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];
        $position = $_REQUEST['POSITION'];
        $department = $_REQUEST['DEPARTMENT'];
        $role = "PMT_HEAD";
        $data = array(
                'evaluatorname' => $name,
                'username' => $username,
                'assignedby' => $this->session->userdata('username'),
                'userlevel'=> $userlevel,
                'position'=> $position,
                'department'=>$department,
                'status'=>0,
                'role'=>$role
            );
        $update = $this->ModelPmtSelectionManagement->update($data);
        if($update){
            $auditdata = array(
                'modulename'=>'PMT Selection Module',
                'action'=>'Update PMT Selection ['.$name.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'PMT Selection Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'PMT Selection Update Failed'
            ));
        }
        echo $result;
    }

    public function deletePmtLead(){
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelPmtSelectionManagement->delete($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'PMT Selection Module',
                'action'=>'Delete PMT Lead',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'PMT Lead Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'PMT Lead Delete Failed'
            ));
        }
        echo $result;
    }

    public function deletePmtEvaluator(){
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelPmtSelectionManagement->delete($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'PMT Selection Module',
                'action'=>'Delete PMT Evaluator',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'PMT Evaluator Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'PMT Evaluator Delete Failed'
            ));
        }
        echo $result;
    }

    public function displayEvaluators(){
        $so = $this->ModelPmtSelectionManagement->getEValuators();

        if($so){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $so
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function newpmtevaluator(){
        $name = $_REQUEST['EVALUATORNAME'];
        $username = $_REQUEST['USERNAME'];
        $userlevel = $_REQUEST['USERLEVEL'];
        $position = $_REQUEST['POSITION'];
        $department = $_REQUEST['DEPARTMENT'];
        $role = "PMT_EVALUATOR";

        $existing = $this->CheckExistingRecord->checkPmtLead($username, $role);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The selected user is already on the PMT evaluators list'
            ));
            echo $result;
        } else {
            $insertData = array(
                'evaluatorname' => $name,
                'username' => $username,
                'assignedby' => $this->session->userdata('username'),
                'userlevel'=> $userlevel,
                'position'=> $position,
                'department'=>$department,
                'status'=>0,
                'role'=>$role
            );
            $insert = $this->ModelPmtSelectionManagement->insert($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'PMT Selection Module',
                    'action'=>'Create New PMT Evaluator ['.$name.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'PMT Evaluator Successfully Added'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'PMT Evaluator Registration Failed'
                ));
            }
            echo $result;
        }
    }

}
