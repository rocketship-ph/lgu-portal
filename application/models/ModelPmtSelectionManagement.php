<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPmtSelectionManagement extends CI_Model{
    function __construct() {
        $this->pmtTbl = 'tblpmt';
    }

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->pmtTbl, $data);
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

    public function update($data = array()) {
        try {
            $where = array('role' => 'PMT_HEAD', 'status' => 0);
            $this->db->set($data);
            $this->db->where($where);
            $update = $this->db->update($this->pmtTbl);
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
            $delete = $this->db->query("delete from ".$this->pmtTbl." where id='".$id."'");
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

    function getUsers(){
        try {
            
            $query = $this->db->query("select u.username,concat(u.firstname,' ',u.middlename, ' ',u.lastname) name,u.userlevel,d.department,p.currentposition, t.role, t.status as rolestatus, t.id from tblusers u inner join tbluserdetails d on u.username=d.username left join tblpdsdetails p on u.username=p.username left join tblpmt t on u.username=t.username where u.userlevel not in ('MUNICIPALHEAD','ADMINISTRATOR','TEMPORARY') and u.status=0 order by u.firstname asc;");

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

     function getEvaluators(){
        try {
            
            $query = $this->db->query("select * from tblpmt where role != 'PMT_HEAD'");

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