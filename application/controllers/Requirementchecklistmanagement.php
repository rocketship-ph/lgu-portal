<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RequirementChecklistManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelRequirementChecklistManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequestnumbers()
    {
        $report = $this->ModelRequirementChecklistManagement->getrequestnumbers();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displayapplicantreqnum()
    {
        $report = $this->ModelRequirementChecklistManagement->getrequestnumbersapplicant();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function displaychecklistreqnum()
    {
        $report = $this->ModelRequirementChecklistManagement->getchecklistreqnums();
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function requirementchecklist()
    {
        $report = $this->ModelRequirementChecklistManagement->getrequirementchecklist($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

 public function displayapplicantcode()
    {
        $report = $this->ModelRequirementChecklistManagement->getapplicants($_REQUEST['REQUESTNUMBER']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

public function getapplicantsubmittedreqs()
    {
        $report = $this->ModelRequirementChecklistManagement->getapplicantsubmittedreqs($_REQUEST['REQUESTNUMBER'],$_REQUEST['APPLICANTCODE']);
        if($report){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $report
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'System is busy'
            ));
        }
        echo $result;
    }

    public function addnewrequirements(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $requirements = $_REQUEST['REQUIREMENTS'];
        $username = $this->session->userdata('username');
        $data = "";
        for($i=0;$i<sizeof($requirements);$i++){
            $data .= "('".$requirements[$i]."','".$reqnum."'),";
        }
        $data = substr($data, 0, -1);

        $insert = $this->ModelRequirementChecklistManagement->insertrequirements($data);

        if($insert){
            $auditdata = array(
                'modulename'=>'Transaction Module',
                'action'=>'Create New Set of Requirements',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Created New Set of Requirements for Request Number: '.$reqnum
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Requirements Creation Failed'
            ));
        }
        echo $result;
    }

    public function updaterequirements(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $reqs = $_REQUEST['REQS'];

        $data = "";
        foreach($reqs as $key=>$i_value){
            $data .= "('".$i_value['rowid']."','".$i_value['req']."','".$reqnum."'),";
        }
        $data = substr($data, 0, -1);

        $insert = $this->ModelRequirementChecklistManagement->updaterequirements($data);

        if($insert){
            $auditdata = array(
                'modulename'=>'Transaction Module',
                'action'=>'Update Existing Set of Requirements ['.$reqnum.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Updated Requirements for Request Number: '.$reqnum
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Requirements Update Failed'
            ));
        }
        echo $result;
    }


    public function deleterequirements(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];

        $delete = $this->ModelRequirementChecklistManagement->deleterequirements($reqnum);

        if($delete){
            $auditdata = array(
                'modulename'=>'Transaction Module',
                'action'=>'Delete Existing Set of Requirements ['.$reqnum.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Deleted Requirements for Request Number: '.$reqnum
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Requirements Delete Failed'
            ));
        }
        echo $result;
    }


public function completerequirements(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];

        $complete = $this->ModelRequirementChecklistManagement->completerequirements($applicantcode);

        if($complete){
            $auditdata = array(
                'modulename'=>'Transaction Module',
                'action'=>'Completed Requirements ['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Applicant '.$applicantcode.' Successfully completed Requirements'
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Requirements Complete Failed'
            ));
        }
        echo $result;
    }


    public function updatechecklist(){
        $requestnumber = $_REQUEST['REQUESTNUMBER'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $req = $_REQUEST['REQUIREMENTS'];

        $data = "";
        for($i=0;$i<sizeof($req);$i++){
            $data .= "('".$requestnumber."','".$applicantcode."','".$req[$i]."'),";
        }
        $data = substr($data, 0, -1);

        $assign = $this->ModelRequirementChecklistManagement->checklist($data,$requestnumber,$applicantcode);

        if($assign){
            $auditdata = array(
                'modulename'=>'Transaction Module',
                'action'=>'Update Requirement Checklist ['.$applicantcode.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Update Requirement Checklist of applicant '.$applicantcode
            ));
        } else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Checklist update failed'
            ));
        }
        echo $result;
    }
}
