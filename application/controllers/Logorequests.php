<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoRequests extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelLogoRequests');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        $data = '';
        if($this->session->userdata('userlevel') == "ADMINISTRATOR"){
            $data = array('content'=>'mods/mod_logo/managerequests');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }
        $this->load->view('templates/MasterTemplate',$data);
    }


    public function displayrequest(){
        $getAll = $this->ModelLogoRequests->getRequests($this->session->userdata('lguid'));

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


    public function newrequest(){
        $reason = $_REQUEST['REASON'];

        $requestdata = array(
            "reason"=>$reason,
            "requestorname"=>$this->session->userdata('name'),
            "requestoruserlevel"=>$this->session->userdata('userlevel'),
            "lguid"=>$this->session->userdata('lguid'),
            "status"=>"PENDING",
            "rqid"=>$_REQUEST['RQID']
        );


        $existing = $this->CheckExistingRecord->checkLogoRequest($this->session->userdata('lguid'),"PENDING");
        if($existing){
            $result = json_encode(array(
                'Code' => '02',
                'Message' => 'A pending request has been detected. Please wait for the request to be processed before submitting another request or contact the LGU Super Administrator for further assistance.'
            ));
            echo $result;
        } else {
            $dt = array(
                "token"=>base64_encode($this->session->userdata('lguid')."-".base_url()."-".$_REQUEST['RQID']),
                "status"=>"0"
            );
            $insert = $this->ModelLogoRequests->insertnewrequest($requestdata);
            if($insert){
                $auditdata = array(
                    'modulename'=>'Logo Request Module',
                    'action'=>'Create New Logo Change Request',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Submitted Logo Request. Please wait for approval of your request'
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '01',
                    'Message' => 'System is busy'
                ));
            }
            echo $result;
        }
    }


    public function cancel(){
        $rowid = $_REQUEST['ID'];

        $userdata = array(
            "status"=>"CANCELLED"
        );

        $update = $this->ModelLogoRequests->cancelRequest($userdata,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'Logo Request Module',
                'action'=>'Cancel Logo Change Request',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Logo Request Cancelled'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }


}
