<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelLogoRequests extends CI_Model{
    function __construct() {
        $this->requestTbl = 'tblrequest';
        $this->authTbl = 'tblauth';
    }

    function getRequests($lguid){
        $admindb = $this->load->database('dbadmin', TRUE);

        try {
            $statement = "select * from tblrequest where lguid='".$lguid."' and status not in ('USED')";
            $query = $admindb->query($statement);
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

    public function insertnewrequest($data = array()) {
        try {
            $admindb = $this->load->database('dbadmin', TRUE);
            $insert = $admindb->insert($this->requestTbl, $data);

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

    public function cancelRequest($data,$id) {
        $admindb = $this->load->database('dbadmin', TRUE);
        try {

            $admindb->set($data);
            $admindb->where('id', $id);
            $cancel = $admindb->update($this->requestTbl);

            if($cancel){
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