<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPosition extends CI_Model{
    function __construct() {
        $this->positionTbl = 'tblposition';
        $this->salaryTbl = 'tblsalary';
        $this->competencyIndexTbl = 'tblcompetencyindex';
        $this->groupPositionTbl = 'tblgroupposition';
        $this->groupTbl = 'tblgrouptable';
    }

    function positions(){
        try {
            $this->db->select('*');
            $this->db->from($this->positionTbl);
            $this->db->where('status', '0');
	    $this->db->order_by("name", "asc");
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

    function getgroupTable($groupcode){
        try {
            $this->db->select('*');
            $this->db->from($this->groupTbl);
            $this->db->where('groupcode', $groupcode);
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

    function competencyItems($id,$level,$type){
        try {
            $this->db->select('*');
            $this->db->from($this->competencyIndexTbl);
            $this->db->where('competencyid', $id);
            $this->db->where('level', $level);
            $this->db->where('type', $type);
	    $this->db->order_by("competencytitle", "asc");
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

    function salaryGrade(){
        $admindb = $this->load->database('dbadmin', TRUE);
        try {
            $admindb->select('*');
            $admindb->from($this->salaryTbl);
            $admindb->order_by("cast(equivalent as unsigned)", "asc");
            $query = $admindb->get();

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

    function groupPosition(){
        $admindb = $this->load->database('dbadmin', TRUE);
        try {
            $admindb->select('*');
            $admindb->from($this->groupPositionTbl);
	    $admindb->order_by("groupname", "asc");
            $query = $admindb->get();

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
    function insertNewPosition($data = array()){
        try {
            $insert = $this->db->insert($this->positionTbl, $data);

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

    function updatePosition($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $update = $this->db->update($this->positionTbl);

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

    function deletePosition($id){
        try {
            $query = $this->db->query("delete from tblposition where id='".$id."'");

            if($query){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }
}