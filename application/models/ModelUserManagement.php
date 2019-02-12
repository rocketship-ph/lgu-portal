<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelUserManagement extends CI_Model{
    function __construct() {
        $this->userTbl = 'tblusers';
        $this->detailsTbl = 'tbluserdetails';
        $this->departmentsTbl = 'tbldepartments';
    }

    public function insert($data = array(),$details = array()) {
        try {
            $insert = $this->db->insert($this->userTbl, $data);

            if($insert){
                $details = $this->db->insert($this->detailsTbl, $details);
                if($details){
                    return true;
                }
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function updateUser($data = array(),$details=array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('USERNAME', $id);
            $update = $this->db->update($this->userTbl);

            if($update){
                $this->db->set($details);
                $this->db->where('USERNAME', $id);
                $userdetails = $this->db->update($this->detailsTbl, $details);
                if($userdetails){
                    return true;
                }
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function resetPassword($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('username', $id);
            $update = $this->db->update($this->userTbl);

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


    public function deleteUser($id,$data) {

        try {
            $this->db->set($data);
            $this->db->where('username', $id);
            $delete = $this->db->update($this->userTbl);

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
            $query = $this->db->query("select * from tbldepartments order by department asc");
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

    function getRows($userlevel){
        try {
            if($userlevel == "ALL"){
                $query = $this->db->query("select u.*,d.* from tblusers u inner join tbluserdetails d on u.username=d.username where u.userlevel != 'ADMINISTRATOR' and u.status='0'");
            } else {
                $query = $this->db->query("select u.*,d.* from tblusers u inner join tbluserdetails d on u.username=d.username where u.userlevel='".$userlevel."' and u.status='0'");
            }

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

    function getUsers($userlevel){
        try {
            $query = $this->db->query("select * from tblusers where userlevel='".$userlevel."' and status='0'");

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

    function getStudents($data){
        try {
            $this->db->select('*');
            $this->db->from($this->studentsTbl);
            $this->db->where($data);
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