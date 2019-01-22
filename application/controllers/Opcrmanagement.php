<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OpcrManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelOpcrManagement');
        $this->load->model('CheckExistingRecord');
    }


    public function display(){
        $ipcrdata = $this->ModelOpcrManagement->getData($_REQUEST['PERIOD']);

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

    public function submit(){
        $opcr = $_REQUEST['OPCR'];
        $period = $_REQUEST['PERIOD'];
        $periodfrom = $_REQUEST['PERIODFROM'];
        $periodto = $_REQUEST['PERIODTO'];
        $username = $this->session->userdata('username');
        $department = $this->session->userdata('department');
        $proceed = isset($_REQUEST['PROCEED']) ? $_REQUEST['PROCEED'] : "";

        $exists = $this->CheckExistingRecord->checkExistingOpcr($username,$period,$department);
        if($exists && $proceed == ""){
            $result = json_encode(array(
                'Code' => '15',
                'Message' => 'The system detected an existing OPCR submitted for the period '.$period.' under your department thus resubmission is not allowed. Note that OPCRs Evaluated and Approved by the Municipal Head is not modifiable.'
            ));
            echo $result;
        } else {
//            $existsevaluated = $this->CheckExistingRecord->checkExistingEvaluatedOpcr($username,$period,$department);
            $data = "";
            $opcrid = 'OPCR-'.trim($department).'-'.strtotime("now");
            foreach($opcr as $key=>$value){
                $data .= "('".$opcrid."','".$username."','".$department."','".$value['soid']."','".$value['ipcrid']."','".$value['mfopapid']."','".$value['mfodepartment']."','".$value['rating']."','".$value['accomplishment']."','1','".$period."'),";
            }
            $data = substr($data, 0, -1);

            $assign = $this->ModelOpcrManagement->insertopcr($data,$username,$period);

            if($assign){
                $auditdata = array(
                    'modulename'=>'PMS Module',
                    'action'=>'Submit OPCR ['.$username.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully submitted OPCR to the Municipal Head. Note that the ratings may be changed by the Municipal Head'
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




}
