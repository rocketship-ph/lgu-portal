<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelAnnouncementsManagement extends CI_Model{
    function __construct() {
        $this->publishedTbl = 'tblpublishrequest';
        $this->competencyindexTbl = 'tblcompetencyindex';
    }

    function get(){
        try {
            $query = $this->db->query("select pub.url,pub.datepublished,pub.requestnumber,req.positioncode,pos.name from tblpublishrequest pub inner join tblpersonnelrequest req on pub.requestnumber=req.requestnumber inner join tblposition pos on req.positioncode = pos.positioncode where pub.publishedby <> null or pub.publishedby <> '' order by pub.datepublished desc");

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

    function insertNewCompetency($data = array()){
        try {
            $insert = $this->db->insert($this->competencyTbl, $data);

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

    function editCompetency($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $update = $this->db->update($this->competencyTbl);

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

    function deleteCompetency($id){
        try {
            $query = $this->db->query("delete from tblcompetency where id='".$id."'");

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


    //for competency index

    function getEditDetails($id,$level,$type){
        try {
            $this->db->select('*');
            $this->db->from($this->competencyindexTbl);
            $this->db->where('competencyid',$id);
            $this->db->where('level',$level);
            $this->db->where('type',$type);
            $query = $this->db->get();

            if($query->num_rows() > 0){
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

    function getCompetencyIndex(){
        try {
            $this->db->select('*');
            $this->db->from($this->competencyindexTbl);
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

    function insertNewCompetencyIndex($data = array()){
        try {
            $insert = $this->db->insert($this->competencyindexTbl, $data);

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

    function updateCompetencyIndex($data = array()) {

        try {
            $ret = true;
            foreach ($data as $obj) {
                $desc = base64_encode($obj['desc']);
                $rowid = $obj['rowid'];
                $update = $this->db->query("update tblcompetencyindex set description='".$desc."' where id='".$rowid."' ");
                if($update){
                    $ret = true;
                } else {
                    $ret = false;
                }
            }
            if($ret){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function deleteCbi($id,$level,$type){
        try {
            $query = $this->db->query("delete from tblcompetencyindex where competencyid='".$id."' and level='".$level."' and type='".$type."'");

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