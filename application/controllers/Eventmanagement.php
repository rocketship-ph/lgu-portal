<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelEventManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    //FOR COMPETENCY DROPDOWN
    public function eventscollection(){
        $getAll = $this->ModelEventManagement->getEvents();

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

    public function add(){
        $event = strtoupper($_REQUEST['NAME']);
        $description = $_REQUEST['DESCRIPTION'];
        $speaker = strtoupper($_REQUEST['SPEAKER']);
        $venue = strtoupper($_REQUEST['VENUE']);
        $address = strtoupper($_REQUEST['ADDRESS']);
        $start = strtoupper($_REQUEST['START']);
        $end = strtoupper($_REQUEST['END']);
        $time = strtoupper($_REQUEST['TIME']);

        $existing = $this->CheckExistingRecord->checkExistingEvents($event,$venue,$start,$end);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Event Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'name' => $event,
                'description' => base64_encode($description),
                'datefrom' => $start,
                'dateto' => $end,
                'time' => $time,
                'speaker' => $speaker,
                'venue' => $venue,
                'address' => $address,
                'createdby' => $this->session->userdata('username')
            );
            $insert = $this->ModelEventManagement->insertNewEvent($insertData);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Learning and Development',
                    'action'=>'Create New Event',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Learning and Development Event Successfully Created'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Event Creation Failed'
                ));
            }
            echo $result;
        }
    }

    public function edit(){
        $event = strtoupper($_REQUEST['NAME']);
        $description = $_REQUEST['DESCRIPTION'];
        $id = $_REQUEST['ID'];
        $speaker = strtoupper($_REQUEST['SPEAKER']);
        $venue = strtoupper($_REQUEST['VENUE']);
        $address = strtoupper($_REQUEST['ADDRESS']);
        $start = strtoupper($_REQUEST['START']);
        $end = strtoupper($_REQUEST['END']);
        $time = strtoupper($_REQUEST['TIME']);

        $existing = $this->CheckExistingRecord->checkExistingEvents($event,$venue,$start,$end);
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'The Event Already Exists'
            ));
            echo $result;
        } else {
            $insertData = array(
                'name' => $event,
                'description' => base64_encode($description),
                'datefrom' => $start,
                'dateto' => $end,
                'time' => $time,
                'speaker' => $speaker,
                'venue' => $venue,
                'address' => $address
            );
            $insert = $this->ModelEventManagement->updateEvent($insertData,$id);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Learning and Development',
                    'action'=>'Update Event',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Learning and Development Event Successfully Updated'
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'Event Update Failed'
                ));
            }
            echo $result;
        }
    }

    public function delete(){
        $id = $_REQUEST['ID'];
        $delete = $this->ModelEventManagement->delete($id);
        if($delete){
            $auditdata = array(
                'modulename'=>'Learning and Development Module',
                'action'=>'Delete Event',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Learning and Development Event Deleted'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Learning and Development Event Delete Failed'
            ));
        }
        echo $result;
    }
}
