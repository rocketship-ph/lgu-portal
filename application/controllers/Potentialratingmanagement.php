<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PotentialRatingManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelPotentialRatingManagement');
        $this->load->model('ModelAuditTrail');
    }


    public function getrequests(){
        $req = $this->ModelPotentialRatingManagement->getRequestnumbers();
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
        $internalapplicants = $this->ModelPotentialRatingManagement->getInternalApplicants($_REQUEST['REQUESTNUMBER']);
        if($internalapplicants){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $internalapplicants
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Either the user is not tagged as evaluator for the selected position request number or there are no available internal applicants to rate at the moment.',
            ));

        }
        echo $result;
    }

    public function submit(){
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $total = $_REQUEST['RATING'];
        $eps = floatval($total)*.10;
        $data = array(
            'applicantcode'=>$applicantcode,
            'evaluator'=>$this->session->userdata('username'),
            'rating'=>$total,
            'eps'=>$eps,
            'requestnumber'=>$reqnum
        );

        $board = $this->ModelPotentialRatingManagement->insert($data);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully submitted Potential Rating for internal applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Potential Rating Module',
                'action'=>'Submit Potential Rating for Internal Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Potential Rating Failed'
            ));

        }
        echo $result;

    }

    public function update(){
        $id = $_REQUEST['ROWID'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $total = $_REQUEST['RATING'];
        $eps = floatval($total)*.10;
        $data = array(
            'applicantcode'=>$applicantcode,
            'evaluator'=>$this->session->userdata('username'),
            'rating'=>$total,
            'eps'=>$eps,
            'requestnumber'=>$reqnum
        );

        $board = $this->ModelPotentialRatingManagement->update($data,$id);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully updated Potential Rating for internal applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Potential Rating Module',
                'action'=>'Update Potential Rating for Internal Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Update of Potential rating Failed'
            ));

        }
        echo $result;

    }

    public function delete(){
        $id = $_REQUEST['ROWID'];
        $applicantcode = $_REQUEST['APPLICANTCODE'];

        $board = $this->ModelPotentialRatingManagement->delete($id);
        if($board){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully delete Potential Rating for internal applicant '.$applicantcode
            ));
            $auditdata = array(
                'modulename'=>'Potential Rating Module',
                'action'=>'Delete Potential Rating for Internal Applicant: '.$applicantcode,
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Delete of Potetial rating Failed'
            ));

        }
        echo $result;

    }


}
