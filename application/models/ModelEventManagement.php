<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelEventManagement extends CI_Model{
    function __construct() {
        $this->eventsTbl = 'tblevents';
        $this->competencyindexTbl = 'tblcompetencyindex';
    }

    //for competency title
    function getEvents(){
        try {
            $query = $this->db->query("select * from tblevents order by datecreated desc");
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

    function insertNewEvent($data = array()){
        try {
            $insert = $this->db->insert($this->eventsTbl, $data);

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

    function updateEvent($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $update = $this->db->update($this->eventsTbl);

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

    function delete($id){
        try {
            $query = $this->db->query("delete from tblevents where id='".$id."'");

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