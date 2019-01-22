<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelRewardsManagement extends CI_Model{
    function __construct() {
        $this->vw_loyalty = 'vw_loyaltyaward';
    }

    function getLoyaltyAwardees($yrs){
        try {
            $this->db->select('*');
            $this->db->from($this->vw_loyalty);
            $this->db->where("yearsofservice >= ".$yrs);
            $query = $this->db->get();

            if($query){
                $result = $query->result_array();
                return $result;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }
}