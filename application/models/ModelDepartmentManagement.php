<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelDepartmentManagement extends CI_Model{
    function __construct() {
        $this->departmentsTbl = 'tbldepartments';
    }

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->departmentsTbl, $data);
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
            $update = $this->db->update($this->departmentsTbl);
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

    function getDepartments(){
        try {
            $this->db->select('*');
            $this->db->from($this->departmentsTbl);
            $this->db->order_by("department", "asc");
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