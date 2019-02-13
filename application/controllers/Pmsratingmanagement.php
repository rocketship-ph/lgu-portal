<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmsRatingManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPmsRatingManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function getrequests(){
        $req = $this->ModelPmsRatingManagement->getRequestnumbers();
        if($req){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $req
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
        $internalapplicants = $this->ModelPmsRatingManagement->getInternalApplicants($_REQUEST['REQUESTNUMBER']);
        if($internalapplicants){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $internalapplicants
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found',
            ));

        }
        echo $result;
    }

    public function submit(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $total = $_REQUEST['RATING'];
        $eps = floatval($total)*.40;
        $data = array(
            'applicantcode'=>$applicantcode,
            'encodedby'=>$this->session->userdata('username'),
            'rating'=>$total,
            'eps'=>$eps,
            'requestnumber'=>$reqnum
        );

        $board = $this->ModelPmsRatingManagement->insert($data);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully submitted Performance Rating for applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Performance Rating Module',
                'action'=>'Submit Performance Rating for Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Rating of Performance Failed'
            ));

        }
        echo $result;

    }

    public function update(){
        $id = $_REQUEST['ROWID'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $total = $_REQUEST['RATING'];
        $eps = floatval($total)*.40;
        $data = array(
            'applicantcode'=>$applicantcode,
            'encodedby'=>$this->session->userdata('username'),
            'rating'=>$total,
            'eps'=>$eps,
            'requestnumber'=>$reqnum
        );

        $board = $this->ModelPmsRatingManagement->update($data,$id);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully updated Performance Rating for applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Performance Rating Module',
                'action'=>'Update Peformance Rating for Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Update of Performance rating Failed'
            ));

        }
        echo $result;

    }

    public function delete(){
        $id = $_REQUEST['ROWID'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];

        $board = $this->ModelPmsRatingManagement->delete($id);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully updated Performance Rating for applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Performance Rating Module',
                'action'=>'Delete Peformance Rating for Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Delete of Performance rating Failed'
            ));

        }
        echo $result;

    }


}
