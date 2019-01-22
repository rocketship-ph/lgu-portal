<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPdsManagement extends CI_Model{
    function __construct() {
        $this->detailsTbl = 'tblpdsdetails';
    }

    public function insert($username,$pdsdetails=array()) {
        try {
            $delpdsdetails = $this->db->query("delete from tblpdsdetails where username='".$username."'");
            if($delpdsdetails){
                $insertdetails = $this->db->insert($this->detailsTbl, $pdsdetails);
                if($insertdetails){
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

    function getData($username){
        try {
            $query = $this->db->query("select * from tblpdsdetails where username='".$username."'");

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

    public function deletepds($username) {

        try {
            $delpdsdetails = $this->db->query("delete from tblpdsdetails where username='".$username."'");

            if($delpdsdetails){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function deleteSubject($data,$id) {

        try {
            $this->db->set($data);
            $this->db->where('ID', $id);
            $delete = $this->db->update($this->subjectsTbl);

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

    function getRows(){
        try {
            $query = $this->db->query("select * from tblmodules where isallowed='0'");

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