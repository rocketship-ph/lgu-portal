<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmsEvaluation extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPmsEvaluationManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function index()
    {
        if($this->session->userdata('pmt') == "PMT_HEAD"){
            $data = array('content'=>'mods/mod_pms/evaluation/opcr');
        } else if($this->session->userdata('pmt') == "PMT_EVALUATOR"){
            $data = array('content'=>'mods/mod_pms/evaluation/ipcr');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }


    public function opcr()
    {
        if($this->session->userdata('pmt') == "PMT_HEAD"){
        $data = array('content'=>'mods/mod_pms/evaluation/opcr');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }

    public function ipcr()
    {
        if($this->session->userdata('pmt') == "PMT_HEAD" || $this->session->userdata('pmt') == "PMT_EVALUATOR"){
            $data = array('content'=>'mods/mod_pms/evaluation/ipcr');
        } else {
            $data = array('content'=>'mods/unauthorizedpage');
        }

        $this->load->view('templates/MasterTemplate',$data);
    }






//    =================
//    || FOR IPCR    ||
//    =================

    //display for IPCR Evaluation
    public function ipcrdata(){
        $ipcrdata = $this->ModelPmsEvaluationManagement->getipcrdata($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT'],$_REQUEST['USERNAME']);

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

    public function submitipcr(){
        $ipcr = $_REQUEST['IPCR'];
        $period = $_REQUEST['PERIOD'];
        $department = $_REQUEST['DEPARTMENT'];
        $employee = $_REQUEST['EMPLOYEE'];
        $username = $this->session->userdata('username');
        $proceed = isset($_REQUEST['PROCEED']) ? $_REQUEST['PROCEED'] : "";

        $exists = $this->CheckExistingRecord->checkExistingIpcrEvaluation($username,$period,$employee);
        if($exists && $proceed == ""){
            $result = json_encode(array(
                'Code' => '15',
                'Message' => 'The system detected an existing IPCR evaluation of the selected employee for the period '.$period.' under your account, thus changes on the rating are no longer permitted. IPCR evaluations can be viewed by going to PMS Reports'
            ));
            echo $result;
        } else {
            $mfopapids = "";
            foreach($ipcr as $key=>$value){
                $mfopapids .=  "'".$value['mfopapid']."',";
            }
            $mfopapids = substr($mfopapids, 0, -1);
            $opcrstatus = $this->CheckExistingRecord->checkOpcrStatus($employee,$period,$mfopapids);
            if($opcrstatus){
                $result = json_encode(array(
                    'Code' => '15',
                    'Message' => 'The system detected that the OPCR for this was already evaluated and approved by the designated OPCR evaluator thus further change on the IPCR rating is no longer allowed. IPCR and OPCR evaluations can be viewed by going to PMS Reports'
                ));
                echo $result;
            } else {
                $dataipcr = "";
                $updateipcr = "";
                $updateopcr = "";
                $ipcrrating = "";
                foreach($ipcr as $key=>$value){
                    $rating = json_decode(base64_decode($value['rating']));
                    $ipcrrating .="('".$value['username']."','".$value['mfopapid']."','".$value['iopcrid']."','".$value['period']."','".$username."','".$rating->Q."','".$rating->E."','".$rating->T."','".$rating->A."'),";
                    $dataipcr .= "('".$value['iopcrid']."','".$username."','".$value['rating']."','".$value['remarks']."','".$value['type']."','".$value['username']."','".$value['period']."','".$value['soid']."','".$value['mfopapid']."'),";
                    $updateipcr .=  "'".$value['iopcrid']."',";
                    $updateopcr .=" WHEN ipcrid='".$value['iopcrid']."' THEN '".$value['rating']."' ";
                }
                $dataipcr = substr($dataipcr, 0, -1);
                $updateipcr = substr($updateipcr, 0, -1);
                $updateopcr = substr($updateopcr, 0, -1);
                $ipcrrating = substr($ipcrrating, 0, -1);


                $assign = $this->ModelPmsEvaluationManagement->evaluateipcr($dataipcr,$updateipcr,$updateopcr,$employee,$period,$ipcrrating);

                if($assign){
                    $auditdata = array(
                        'modulename'=>'PMS Module',
                        'action'=>'Evaluate IPCR ['.$username.']',
                        'user'=>$this->session->userdata('username'),
                        'ipaddress'=> $_SERVER['REMOTE_ADDR']
                    );
                    $audit = $this->ModelAuditTrail->insert($auditdata);
                    $result = json_encode(array(
                        'Code' => '00',
                        'Message' => 'Successfully submitted evaluation for IPCR. View evaluation by going to PMS Reports'
                    ));
                } else{
                    $result = json_encode(array(
                        'Code' => '99',
                        'Message' => 'IPCR Evaluation failed. Please try again'
                    ));
                }
                echo $result;
            }

        }

    }







//    =================
//    || FOR OPCR    ||
//    =================


    public function opcrdata(){
        $ipcrdata = $this->ModelPmsEvaluationManagement->getopcrdata($_REQUEST['PERIOD'],$_REQUEST['DEPARTMENT']);

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

    public function submitopcr(){
        $opcr = $_REQUEST['OPCR'];
        $opcrid = $_REQUEST['OPCRID'];
        $period = $_REQUEST['PERIOD'];
        $department = $_REQUEST['DEPARTMENT'];
        $username = $this->session->userdata('username');

        $exists = $this->CheckExistingRecord->checkExistingOpcrEvaluation($opcrid);
        if($exists){
            $result = json_encode(array(
                'Code' => '15',
                'Message' => 'The system detected an existing OPCR evaluation of this department for the period '.$period.', thus changes on the OPCR rating are no longer permitted. OPCR evaluations can be viewed by going to PMS Reports'
            ));
            echo $result;
        } else {
            $dataopcr = "";
            $opcrrating = "";
            $ipcrids = "";
            $updateopcrrating = "";
            foreach($opcr as $key=>$value){
                $rating = json_decode(base64_decode($value['rating']));

                $opcrrating .="('".$value['username']."','".$value['ipcrid']."','".$value['opcrid']."','".$value['mfopapid']."','".$value['period']."','".$username."','".$rating->Q."','".$rating->E."','".$rating->T."','".$rating->A."'),";
                $dataopcr .= "('".$value['ipcrid']."','".$username."','".$value['rating']."','".$value['remarks']."','OPCR','".$value['username']."','".$value['period']."','".$value['soid']."','".$value['mfopapid']."','".$value['opcrid']."'),";
                $ipcrids .=  "'".$value['ipcrid']."',";
                $updateopcrrating .=" WHEN ipcrid='".$value['ipcrid']."' THEN '".$value['rating']."' ";
            }

            $opcrrating = substr($opcrrating, 0, -1);
            $dataopcr = substr($dataopcr, 0, -1);
            $ipcrids = substr($ipcrids, 0, -1);
            $updateopcrrating = substr($updateopcrrating, 0, -1);


            $evaluate = $this->ModelPmsEvaluationManagement->evaluateopcr($dataopcr,$opcrrating,$ipcrids,$updateopcrrating,$period);

            if($evaluate){
                $auditdata = array(
                    'modulename'=>'PMS Module',
                    'action'=>'Evaluate OPCR ['.$username.']',
                    'user'=>$this->session->userdata('username'),
                    'ipaddress'=> $_SERVER['REMOTE_ADDR']
                );
                $audit = $this->ModelAuditTrail->insert($auditdata);
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully submitted evaluation for OPCR. View evaluation by going to PMS Reports'
                ));
            } else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'OPCR Evaluation failed. Please try again'
                ));
            }
            echo $result;

        }

    }

}
