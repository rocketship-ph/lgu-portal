<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelStrategicObjectiveManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
    }

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->soTbl, $data);
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

    public function update($data = array(),$id) {
        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $update = $this->db->update($this->soTbl);
            if($update){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tbldepartments where id='".$id."'");
            if($delete){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function getStrategicObjectives(){
        try {
            $this->db->select('*');
            $this->db->from($this->soTbl);
            $this->db->where("status = 0");
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


    function getPeriod(){
        $admindb = $this->load->database('dbadmin', TRUE);

        try {
            $lguid = $GLOBALS['lguid'];
            $statement = "select * from tblpmsperiod where lguid='".$lguid."'";
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
}