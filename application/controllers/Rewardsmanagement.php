<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewardsmanagement extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('ModelRewardsManagement');
        $this->load->model('ModelAuditTrail');
    }

    public function loyaltyaward(){
        $loyalty = $this->ModelRewardsManagement->getLoyaltyAwardees("35");

        if($loyalty){
            $result = json_encode(array(
                'Code' => '00',
                'Message' => 'Successfully Fetched Data',
                'details' => $loyalty
            ));
            $auditdata = array(
                'modulename'=>'Rewards and Recognition',
                'action'=>'Generate Loyalty Awardees',
                'user'=>$this->session->userdata('username'),
                'ipaddress'=> $_SERVER['REMOTE_ADDR']
            );
            $audit = $this->ModelAuditTrail->insert($auditdata);
        }else{
            $result = json_encode(array(
                'Code' => '99',
                'Message' => 'No Data Found'
            ));
        }
        echo $result;
    }
}
