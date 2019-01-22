<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelAssignSoManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
    }

    function getdepartments(){
        try {

            $statement = "select distinct department from tbluserdetails where department != '' order by department asc;";
            $query = $this->db->query($statement);
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

    function getstrategicobjectives(){
        try {
            $statement = "select * from tblso where status='0';";
            $query = $this->db->query($statement);
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

    function getConf($department){
        try {
            $statement = "select * from tblassignedso where upper(department)='".strtoupper($department)."'";
            $query = $this->db->query($statement);
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

    public function assign($data,$department) {
        try {
            $delete = $this->db->query("delete from tblassignedso where upper(department)='".strtoupper($department)."'");
            if($delete){
                $insert = $this->db->query("insert into tblassignedso (assignedby,department,soid) values ".$data);
                if($insert){
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

}