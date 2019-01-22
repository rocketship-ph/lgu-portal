<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackgroundInvestigationManagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelBackgroundInvestigationManagement');
        $this->load->model('CheckExistingRecord');
        $this->load->model('ModelAuditTrail');
    }

    public function displayrequests(){
        $requests = $this->ModelBackgroundInvestigationManagement->getRequestnumbers($this->session->userdata('username'));

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

    public function displayrequestdetails(){
        $existing = $this->ModelBackgroundInvestigationManagement->getEncodedBi($_REQUEST['REQUESTNUMBER'],$this->session->userdata('username'));
        if($existing){
            $details = $this->ModelBackgroundInvestigationManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
            if($details){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details,
                    'existing'=>$existing
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        } else {
            $details = $this->ModelBackgroundInvestigationManagement->getRequestdetails($_REQUEST['REQUESTNUMBER']);
            if($details){
                $result = json_encode(array(
                    'Code' => '00',
                    'Message' => 'Successfully Fetched Data',
                    'details' => $details
                ));
            } else {
                $result = json_encode(array(
                    'Code' => '99',
                    'Message' => 'No Data Found'
                ));
            }
            echo $result;
        }

    }

    public function newquestion(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $username = $this->session->userdata('username');

        $insertData = array(
            'question' => base64_encode($question),
            'requestnumber' => $reqnum,
            'encodedby' => $username
        );

        $insert = $this->ModelBackgroundInvestigationManagement->insert($insertData);
        if($insert){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Create New Question ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Question Successfully Created'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Question Creation Failed'
            ));
        }
        echo $result;
    }

    public function editquestion(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $question = $_REQUEST['QUESTION'];
        $username = $this->session->userdata('username');

        $data = array(
            'question' => base64_encode($question)
        );

        $update = $this->ModelBackgroundInvestigationManagement->update($data,$rowid);
        if($update){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Edit Question ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Question Successfully Updated'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Question Updated Failed'
            ));
        }
        echo $result;
    }

    public function inquirechanges(){
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');

        $isanwered = $this->ModelBackgroundInvestigationManagement->isanswered($reqnum,$username);
        if(!$isanwered){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Change applicable'
            ));
        } else {
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'Background investigation for this request number has started thus, further changes are prohibited.'
            ));
        }
        echo $result;
    }

    public function deletequestion(){
        $rowid = $_REQUEST['ROWID'];
        $reqnum = $_REQUEST['REQUESTNUMBER'];
        $username = $this->session->userdata('username');
        $delete = $this->ModelBackgroundInvestigationManagement->delete($rowid);
        if($delete){
            $auditdata = array(
                'modulename'=>'Background Investigation Module',
                'action'=>'Delete Exam ['.$reqnum.']['.$username.']',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Background Investigation Question Deleted Successfully'
            ));
        }else{
            $result = json_encode(array(
                'Code' => '01',
                'Message' => 'Background Investigation Question Delete Failed'
            ));
        }
        echo $result;
    }


}
