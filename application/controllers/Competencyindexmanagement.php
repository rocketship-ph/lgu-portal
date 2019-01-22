<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CompetencyIndexManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelCompetencies');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR COMPETENCY DROPDOWN
    public function competencies(){
        $getAll = $this->ModelCompetencies->getCompetencies();

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

public function competencydetails(){
        $getAll = $this->ModelCompetencies->getCompetencyDetails($_REQUEST["COMPETENCY"]);

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

    public function newCompetency(){
        $title = strtoupper($_REQUEST['TITLE']);
        $description = $_REQUEST['DESCRIPTION'];
        $type = $_REQUEST['TYPE'];

        $existing = $this->CheckExistingRecord->checkCompetencyTitles(strtoupper($title));
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Competency Title Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'title' => $title,
                'description' => base64_encode($description),
                'type' => strtoupper($type),
                'createdby' => $this->session->userdata('username')
            );
            $insert = $this->ModelCompetencies->insertNewCompetency($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Competency Index Module',
                    'action'=>'Create New Competency Title',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'New Competency Title Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Competency Title Creation Failed'
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



    //FOR COMPETENCY BASED INDEX
    public function editDetails(){
        $id = $_REQUEST['COMPETENCYID'];
        $level = $_REQUEST['LEVEL'];
        $type = $_REQUEST['TYPE'];
        $getAll = $this->ModelCompetencies->getEditDetails($id,$level,$type);

        if($getAll){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $getAll
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }


    public function newCompetencyIndex(){
        $title = strtoupper($_REQUEST['COMPETENCYTITLE']);
        $description = $_REQUEST['DESCRIPTION'];
        $id = $_REQUEST['COMPETENCYID'];
        $level = $_REQUEST['LEVEL'];
        $type = $_REQUEST['TYPE'];

        $existing = false;
        if($type == "CORE"){
            $existing = $this->CheckExistingRecord->checkCompetencyIndices($id,$level,$type);
        }
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'A Core Description for '.strtoupper($level).' Competency Level already exists.'
            ));
            echo $result;
        } else {
            $insertData = array(
                'competencyid' => $id,
                'competencytitle' => $title,
                'level' => $level,
                'type' => $type,
                'description' => base64_encode($description),
                'createdby' => $this->session->userdata('username')
            );
            $insert = $this->ModelCompetencies->insertNewCompetencyIndex($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Competency Index Module',
                    'action'=>'Add New Competency Index Profile',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Competency Index Profile Successfully Added'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Competency Index Profile Failed'
                ));
            }
            echo $result;
        }
    }


    public function saveChanges(){
        $title = strtoupper($_REQUEST['TITLE']);
        $compid = $_REQUEST['COMPETENCYID'];
        $arr = $_REQUEST['FIELDS'];
        $update = $this->ModelCompetencies->updateCompetencyIndex($arr);
        if($update){
            $auditdata = array(
                'modulename'=>'Competency Index Module',
                'action'=>'Update Competency Index',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Competency Based Index Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Competency Based Index Update Failed'
            ));
        }
        echo $result;
    }


    public function deleteCompetencyIndex(){
        $id = $_REQUEST['COMPETENCYID'];
        $level = $_REQUEST['LEVEL'];
        $type = $_REQUEST['TYPE'];

        $delete = $this->ModelCompetencies->deleteCbi($id,$level,$type);

        if($delete){
            $auditdata = array(
                'modulename'=>'Competency Index Module',
                'action'=>'Delete Competency Index',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Competency Index Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System busy'
            ));
        }
        echo $result;
    }
}
