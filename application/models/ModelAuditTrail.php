<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelAuditTrail extends CI_Model{
    function __construct() {
        $this->auditTbl = 'tblaudittrail';
    }

    public function getAuditTrail($datefrom,$dateto) {
        try {
            $query = $this->db->query("select * from ".$this->auditTbl." where date(timestamp) between '".$datefrom."' and '".$dateto."' order by timestamp desc");
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

    function insert($data = array()){
        try {
            $insert = $this->db->insert($this->auditTbl, $data);

            if($insert){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

}