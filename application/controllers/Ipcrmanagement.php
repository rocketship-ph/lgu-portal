<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IpcrManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelIpcrManagement');
        $this->load->model('CheckExistingRecord');

    }


    public function display(){
        $ipcrdata = $this->ModelIpcrManagement->getData($_REQUEST['PERIOD']);

        if($ipcrdata){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $ipcrdata
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

 public function pendingipcr(){
        $ipcrdata = $this->ModelIpcrManagement->getPendingData($_REQUEST['PERIOD'],$_REQUEST['EMPLOYEE']);

        if($ipcrdata){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $ipcrdata
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displaypersonnel(){
        $personnel = $this->ModelIpcrManagement->displaypersonnel($_REQUEST['PERIOD']);

        if($personnel){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $personnel
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displaypersonnelevaluation(){
        $personnel = $this->ModelIpcrManagement->displaypersonnelevaluation($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT']);

        if($personnel){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $personnel
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function submit(){
        $ipcr = $_REQUEST['IPCR'];
        $period = $_REQUEST['PERIOD'];
        $periodfrom = $_REQUEST['PERIODFROM'];
        $periodto = $_REQUEST['PERIODTO'];
        $username = $this->session->userdata('username');
        $department = $this->session->userdata('department');
        $proceed = isset($_REQUEST['PROCEED']) ? $_REQUEST['PROCEED'] : "";

        $exists = $this->CheckExistingRecord->checkExistingIpcr($username,$period);
        if($exists && $proceed == ""){
            $result = json_encode(array(
                'Code' => '15',
                'Message' => 'The system detected an existing IPCR submitted for the period '.$period.' under your account. Would you like to PROCEED submitting this IPCR and REPLACE the existing record?'
            ));
            echo $result;
        } else {
            $data = "";
            foreach($ipcr as $key=>$value){
                $data .= "('".$username."','".$value['soid']."','".$value['mfopapid']."','".$department."','".$value['mfopapdepartment']."','".$value['rating']."','".$value['actualaccomplishment']."','".$period."','1'),";
            }
            $data = substr($data, 0, -1);

            $assign = $this->ModelIpcrManagement->insertipcr($data,$username,$period);

            if($assign){
                $auditdata = array(
                    'modulename'=>'PMS Module',
                    'action'=>'Submit IPCR ['.$username.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully submitted IPCR to the Department Head. Note that your self-evaluation rating can be changed by your department head as well as the PMT evaluators during the final evaluation of the OPCR.'
                ));
            } else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'IPCR Submission failed. Please try again'
                ));
            }
            echo $result;
        }

    }

    public function approve(){
        $ipcr = $_REQUEST['IPCR'];
        $period = $_REQUEST['PERIOD'];
        $periodfrom = $_REQUEST['PERIODFROM'];
        $periodto = $_REQUEST['PERIODTO'];
        $username = $_REQUEST['USERNAME'];
        $department = $this->session->userdata('department');

        $data = "";
        foreach($ipcr as $key=>$value){
            $data .= "('".$value['username']."','".$value['soid']."','".$value['mfopapid']."','".$department."','".$value['department']."','".$value['rating']."','".$value['accomplishment']."','".$this->session->userdata('username')."','".$period."','0'),";
        }
        $data = substr($data, 0, -1);

        $assign = $this->ModelIpcrManagement->approveipcr($data,$username,$period);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Approve IPCR ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully approved IPCR to the Department Head. Adjustment(s) to the IPCR Rating has been recorded.'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'IPCR approval failed. Please try again'
            ));
        }
        echo $result;
    }

 public function reject(){

        $period = $_REQUEST['PERIOD'];
        $periodfrom = $_REQUEST['PERIODFROM'];
        $periodto = $_REQUEST['PERIODTO'];
        $username = $_REQUEST['USERNAME'];
        $department = $this->session->userdata('department');

        $assign = $this->ModelIpcrManagement->rejectipcr($username,$period);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Reject IPCR ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully rejected IPCR to the Department Head. Rejected IPCR(s) will be completely removed from the OPCR.'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'IPCR reject failed. Please try again'
            ));
        }
        echo $result;
    }



}
