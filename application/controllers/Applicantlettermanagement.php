<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicantLetterManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelApplicantLetterManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function getLetter(){
        $letter = $this->ModelApplicantLetterManagement->getLetter($_REQUEST['TYPE'],$_REQUEST['USERNAME']);

        if($letter){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $letter
            ));
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }

    public function sendemail(){
        $from_email = "recruitment@prime-hrd.info";
        $to_email = $_REQUEST['EMAIL'];
        $subject = 'Job Application Letter ['.$_REQUEST['POSITION'].']';

        $this->load->library('email');

        $this->email->from($from_email, 'LGU Carmona');
        $this->email->to($to_email);

        $this->email->subject(utf8_encode(strtoupper($subject)));
        $this->email->message($_REQUEST['MESSAGE']);

        if($this->email->send()) {
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Email Successfully Sent to: '.$_REQUEST['EMAIL']
            ));
            $auditdata = array(
                'modulename'=>'Email Module',
                'action'=>'Sent Email [NON-QUALIFIED]['.$_REQUEST['EMAIL'].']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        } else {
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Email Not Sent'
            ));
        }
        echo $result;
    }




}
