<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelDepartmentManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR DEPARTMENT PROFILE
    public function displaydepartments(){
        $departments = $this->ModelDepartmentManagement->getDepartments();

        if($departments){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $departments
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function newDepartment(){
        $department = strtoupper($_REQUEST['DEPARTMENT']);
        $description = $_REQUEST['DESCRIPTION'];

        $existing = $this->CheckExistingRecord->checkDepartments($department);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Department Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'department' => $department,
                'description' => $description,
                'createdby' => $this->session->userdata('username')
            );
            $insert = $this->ModelDepartmentManagement->insert($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Department Module',
                    'action'=>'Create New Department ['.$department.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Department Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Department Registration Failed'
                ));
            }
            echo $result;
        }
    }

    public function updateDepartment(){
        $department = strtoupper($_REQUEST['DEPARTMENT']);
        $description = $_REQUEST['DESCRIPTION'];
        $id = $_REQUEST['ROWID'];

        $data = array(
            'department' => $department,
            'description' => $description
        );
        $update = $this->ModelDepartmentManagement->update($data,$id);
        if($update){
            $auditdata = array(
                'modulename'=>'Department Module',
                'action'=>'Update Department ['.$department.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Department Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Department Update Failed'
            ));
        }
        echo $result;
    }

    public function deleteDepartment(){
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelDepartmentManagement->delete($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'Department Module',
                'action'=>'Delete Department',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Department Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Department Delete Failed'
            ));
        }
        echo $result;
    }


}
