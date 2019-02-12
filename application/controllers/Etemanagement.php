<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EteManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelEteManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function displayapplicantcode(){
        $appcode = $this->ModelEteManagement->getApplicantCode();
        if($appcode){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $appcode
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));

        }
        echo $result;
    }


    public function displaydetails(){
        $editable = $this->ModelEteManagement->isEditable($_REQUEST['APPLICANTCODE']);
        $existingdata = $this->ModelEteManagement->getExistingdata($_REQUEST['APPLICANTCODE']);
        if($existingdata){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $existingdata,
                'Editable' => $editable ? 'YES' : 'NO'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found',
                'Editable' => 'YES'
            ));

        }
        echo $result;
    }

    public function submit(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $total = $_REQUEST['TOTAL'];
        $details = $_REQUEST['ETEDETAILS'];
        $data = array(
            'applicantcode'=>$applicantcode,
            'evaluator'=>$this->session->userdata('username'),
            'totalrating'=>$total,
            'etedetails'=>$details
        );

        $board = $this->ModelEteManagement->insert($data);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully submitted ETE rating for applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'ETE Module',
                'action'=>'Submit Evaluation for Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Evaluation of ETE Failed'
            ));

        }
        echo $result;

    }

    public function update(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $total = $_REQUEST['TOTAL'];
        $details = $_REQUEST['ETEDETAILS'];
        $id = $_REQUEST['ROWID'];
        $data = array(
            'applicantcode'=>$applicantcode,
            'lastmodifiedby'=>$this->session->userdata('username'),
            'totalrating'=>$total,
            'etedetails'=>$details
        );

        $board = $this->ModelEteManagement->update($data,$id);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully updated ETE rating for applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'ETE Module',
                'action'=>'Update Evaluation for Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Update of ETE rating Failed'
            ));

        }
        echo $result;

    }


}
