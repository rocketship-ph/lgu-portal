<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PositionManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPosition');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR CREATE NEW POSITION
    public function getPositions(){
        $getAll = $this->ModelPosition->positions();

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

    public function getSalaryGrade(){
        $getAll = $this->ModelPosition->salaryGrade();

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

    public function getGroupPosition(){
        $getAll = $this->ModelPosition->groupPosition();

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

    public function groupTable(){
        $groupcode = $this->ModelPosition->getgroupTable($_REQUEST['GROUPCODE']);

        if($groupcode){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $groupcode
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function getCompetencyItems(){
        $level = $_REQUEST['LEVEL'];
        $type = $_REQUEST['TYPE'];
        $compid = $_REQUEST['COMPID'];
        $getAll = $this->ModelPosition->competencyItems($compid,$level,$type);

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

    public function addPosition(){

        $skills = json_encode($_REQUEST['SKILLS']);
        $name = $_REQUEST['POSITIONTITLE'];
        $description = ($_REQUEST['DESCRIPTION']);
        $groupposition = $_REQUEST['GROUPPOSITION'];
        $groupcode = $_REQUEST['GROUPCODE'];
        $salarygrade = $_REQUEST['SALARYGRADE'];
        $salaryequivalent = $_REQUEST['SALARYEQUIVALENT'];
        $mindeducbackground = $_REQUEST['EDUCATION'];
        $positioncode = $_REQUEST['POSITIONCODE'];
        $groupdesc = $_REQUEST['GROUPDESCRIPTION'];
        $experience = $_REQUEST['EXPERIENCE'];
        $training = $_REQUEST['TRAINING'];
        $eligibility = $_REQUEST['ELIGIBILITY'];

        $existing = $this->CheckExistingRecord->checkPositions(strtoupper($name));
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Position Title Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'cbiskills' => base64_encode($skills),
                'name' => strtoupper($name),
                'description' => base64_encode($description),
                'groupposition' => $groupposition,
                'groupcode' => $groupcode,
                'salarygrade' => $salarygrade,
                'salaryequivalent' => $salaryequivalent,
                'mineducbackground' => $mindeducbackground,
                'positioncode' => strtoupper($positioncode),
                'groupdesc' => base64_encode($groupdesc),
                'addedby' => $this->session->userdata('username'),
                'experience' => $experience,
                'training' => $training,
                'eligibility' => $eligibility,
            );
            $insert = $this->ModelPosition->insertNewPosition($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Position Profile Module',
                    'action'=>'Create New Position ['.strtoupper($positioncode).']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Position Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Position Creation Failed'
                ));
            }
            echo $result;
        }
    }

    public function updatePosition(){
        $skills = json_encode($_REQUEST['SKILLS']);
        $description = ($_REQUEST['DESCRIPTION']);
        $groupposition = $_REQUEST['GROUPPOSITION'];
        $groupcode = $_REQUEST['GROUPCODE'];
        $salarygrade = $_REQUEST['SALARYGRADE'];
        $salaryequivalent = $_REQUEST['SALARYEQUIVALENT'];
        $mindeducbackground = $_REQUEST['EDUCATION'];
        $groupdesc = $_REQUEST['GROUPDESCRIPTION'];
        $rowid = $_REQUEST['ROWID'];
        $experience = $_REQUEST['EXPERIENCE'];
        $training = $_REQUEST['TRAINING'];
        $eligibility = $_REQUEST['ELIGIBILITY'];
        $poscode = $_REQUEST['POSITIONCODE'];

        $data = array(
            'cbiskills' => base64_encode($skills),
            'description' => base64_encode($description),
            'groupposition' => $groupposition,
            'groupcode' => $groupcode,
            'salarygrade' => $salarygrade,
            'salaryequivalent' => $salaryequivalent,
            'mineducbackground' => $mindeducbackground,
            'groupdesc' => base64_encode($groupdesc),
            'experience' => $experience,
            'training' => $training,
            'eligibility' => $eligibility
        );

        $requestdata = array(
            'experience' => $experience,
            'training' => $training,
            'eligibility' => $eligibility
        );
        $update = $this->ModelPosition->updatePosition($data,$rowid,$requestdata,$poscode);
        if($update){
            $auditdata = array(
                'modulename'=>'Position Profile Module',
                'action'=>'Update Position',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Position Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Position Update Failed'
            ));
        }
        echo $result;
    }

    public function deletePosition(){
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelPosition->deletePosition($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'Position Profile Module',
                'action'=>'Delete Position',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Position Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Position Delete Failed'
            ));
        }
        echo $result;
    }
}
