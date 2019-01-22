<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Strategicobjectivemanagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelStrategicObjectiveManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR DEPARTMENT PROFILE
    public function displayStrategicObjectives(){
        $so = $this->ModelStrategicObjectiveManagement->getStrategicObjectives();

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

 public function evaluationperiod(){
        $so = $this->ModelStrategicObjectiveManagement->getPeriod();

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

    public function newStrategicObjectives(){
        $so = strtoupper($_REQUEST['STRATEGICOBJECTIVE']);
        $description = $_REQUEST['DESCRIPTION'];
        $period = $_REQUEST['PERIOD'];
        $from = $_REQUEST['PERIODFROM'];
        $to = $_REQUEST['PERIODTO'];

        $existing = $this->CheckExistingRecord->checkStrategicObjectives($so);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Strategic Objective Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'period' => $period,
                'periodfrom' => $from,
                'periodto' => $to,
                'strategicobjective' => $so,
                'description' => $description,
                'addedby' => $this->session->userdata('username')
            );
            $insert = $this->ModelStrategicObjectiveManagement->insert($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Strategic Objective Module',
                    'action'=>'Create New Strategic Objective ['.$so.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Strategic Objective Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Strategic Objective Registration Failed'
                ));
            }
            echo $result;
        }
    }

    public function updateStrategicObjective(){
        $so = strtoupper($_REQUEST['STRATEGICOBJECTIVE']);
        $description = $_REQUEST['DESCRIPTION'];
        $id = $_REQUEST['ROWID'];
        $period = $_REQUEST['PERIOD'];
        $from = $_REQUEST['PERIODFROM'];
        $to = $_REQUEST['PERIODTO'];

        $data = array(
            'period' => $period,
            'periodfrom' => $from,
            'periodto' => $to,
            'description' => $description
        );
        $update = $this->ModelStrategicObjectiveManagement->update($data,$id);
        if($update){
            $auditdata = array(
                'modulename'=>'Strategic Objective Module',
                'action'=>'Update Strategic Objective ['.$so.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Strategic Objective Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Strategic Objective Update Failed'
            ));
        }
        echo $result;
    }

    public function deleteStrategicObjective(){
        $data = array(
            'status' => 1
        );
        $id = $_REQUEST['ROWID'];
        $delete = $this->ModelStrategicObjectiveManagement->update($data,$id);
        if($delete){
            $auditdata = array(
                'modulename'=>'Strategic Objective Module',
                'action'=>'Delete Strategic Objective',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Strategic Objective Successfully Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Strategic Objective Delete Failed'
            ));
        }
        echo $result;
    }


}
