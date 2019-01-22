<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignedmfopapmanagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelAuditTrail');
        $this->load->model('ModelAssignedMfoPapManagement');
    }


    public function assignedmfopap(){

        $mfopap = $this->ModelAssignedMfoPapManagement->getassignedmfopap($this->session->userdata('username'));

        if($mfopap){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $mfopap
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
        $rating = $_REQUEST['RATING'];
        $username = $this->session->userdata('username');
        $department = $this->session->userdata('department');

        $data = "";
        $mfopapids = "";
        foreach($rating as $key=>$value){
            $data .= "('".$username."','".$value['soid']."','".$value['mfopapid']."','".$value['accomplishment']."','".$value['rating']."'),";
            $mfopapids .= "'".$value['mfopapid']."',";

        }
        $data = substr($data, 0, -1);
        $data2 = substr($mfopapids, 0, -1);

        $assign = $this->ModelAssignedMfoPapManagement->insertaccomplishment($data,$username,$data2);

        if($assign){
            $auditdata = array(
                'modulename'=>'PMS Module',
                'action'=>'Submit Personal Evaluation ['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully submitted actual accomplishment and self-evaluation rating. Note that personal ratings can be changed by the department head as well as the PMT evaluators whenever they see fit'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Submit failed. Please try again'
            ));
        }
        echo $result;
    }


}
