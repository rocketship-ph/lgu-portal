<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelApproveMfoPapManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getdepartments(){
        try {

            $statement = "select distinct department from tblmfopap where status='1' order by department asc;";
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

    function getmfopap($department){
        try {
            $statement = "select m.*,s.strategicobjective from tblmfopap m inner join tblso s on m.soid=s.id where upper(m.department) = '".strtoupper($department)."' and m.status='1';";
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

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->mfopapTbl, $data);
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
            $update = $this->db->update($this->mfopapTbl);

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
            $delete = $this->db->query("update tblmfopap set status='2' where id='".$id."'");
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

    public function approve($data) {
        try {
            $delete = $this->db->query("update tblmfopap set status='0' where id in (".$data.")");
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


}