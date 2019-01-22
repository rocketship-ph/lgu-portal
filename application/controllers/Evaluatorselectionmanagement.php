<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EvaluatorSelectionManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelEvaluatorSelectionManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function getRequests(){
        $requests = $this->ModelEvaluatorSelectionManagement->requests();

        if($requests){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $requests
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function displayConstantEvals(){



        $exists = $this->ModelEvaluatorSelectionManagement->existingevals($_REQUEST['REQUESTNUMBER']);
        if($exists){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $exists
            ));
            echo $result;
        } else {
            $requests = $this->ModelEvaluatorSelectionManagement->defaultevals($_REQUEST['REQUESTNUMBER']);

            if($requests){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $requests
                ));
            }else{
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        }
    }

    public function displayEvals(){

        $requests = $this->ModelEvaluatorSelectionManagement->qualifiedevals($_REQUEST['REQUESTNUMBER']);

        if($requests){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $requests
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function insert(){
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $evals = $_REQUEST['EVALUATORS'];
        $data = "";
        $notifdata = "";

        foreach($evals as $key=>$value){
            $data .= "('".$requestnumber."','".$value['name']."','".$value['username']."','".$value['userlevel']."','0','".$value['order']."'),";
            $notifdata.="('".$requestnumber."','EVALUATOR ASSIGNMENT','100','".$value['username']."','".$this->session->userdata('username')."','0','You have been assigned by ".$this->session->userdata('name')." to be an Evaluator on Position Request: ".$requestnumber."'),";
        }
        $data = substr($data, 0, -1);
        $notifdata = substr($notifdata, 0, -1);

        $insert = $this->ModelEvaluatorSelectionManagement->insert($data,$requestnumber);
        if($insert){
            $auditdata = array(
                'modulename'=>'Evaluator Selection Module',
                'action'=>'Assign Evaluators ['.$requestnumber.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $notif = $this->ModelEvaluatorSelectionManagement->insertnotif($notifdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Evaluators Successfully Assigned'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Failed to Assign Evaluators'
            ));
        }
        echo $result;
    }

    public function delete(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $delete = $this->ModelEvaluatorSelectionManagement->delete($reqnum);
        if($delete){
            $auditdata = array(
                'modulename'=>'Evaluator Selection Module',
                'action'=>'Delete Evaluators',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Evaluators Successfully Removed'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Evaluators Removal Failed'
            ));
        }
        echo $result;
    }


}
