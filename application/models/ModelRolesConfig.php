<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelRolesConfig extends CI_Model{
    function __construct() {
        $this->subjectsTbl = 'TBLSUBJECTS';
        $this->pdsTbl = 'tblpdsdetails';
    }

    public function assign($data,$username,$userlevel) {
        try {
            $delete = $this->db->query("delete from tbluserconfiguration where username='".$username."' and userlevel='".$userlevel."'");
            if($delete){
                $insert = $this->db->query("insert into tbluserconfiguration (username,userlevel,moduleid) values ".$data);
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

    function getConf($username,$userlevel){
        try {
            $query = $this->db->query("select distinct moduleid from tbluserconfiguration where username in ('ALL','".$username."') and userlevel='".$userlevel."'");

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


    function pdsBinding($username){
        try {
            $this->db->select('*');
            $this->db->from($this->pdsTbl);
            $this->db->where('username',$username);
            $query = $this->db->get();
            if($query->num_rows() > 0){
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