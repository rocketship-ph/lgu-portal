<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelUtilities extends CI_Model{
    function __construct() {
        $this->backupsTbl = 'tblbackups';
    }

    function createBackup($data = array()){
        try {
            $insert = $this->db->insert($this->backupsTbl, $data);

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

    function getDatabaseBackups(){
        try {
            $query = $this->db->query("select * from tblbackups where status='0'");

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

    function deleteBackup($id){
        try {
            $query = $this->db->query("delete from tblbackups where id='".$id."'");

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