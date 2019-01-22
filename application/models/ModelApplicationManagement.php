<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelApplicationManagement extends CI_Model{
    function __construct() {
        $this->applicantTbl = 'tblapplicant';
        $this->userTbl = 'tblusers';
        $this->detailsTbl = 'tbluserdetails';
        $this->configtbl = 'tbluserconfiguration';
    }

    function getApplicantNumber(){
        try {
            $username = $this->session->userdata('username');
            $query = $this->db->query("select lpad(id,4,'0') as appnumber from tblapplicant where username='".$username."';");
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

    function updateApplicant($data = array()) {
        $username = $this->session->userdata('username');
        try {
            $this->db->set($data);
            $this->db->where('username', $username);
            $update = $this->db->update($this->applicantTbl);

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

    function insertApplicant($applicant=array(),$userdata=array(),$userdetails=array(),$userconfig=array()){
        try {
            $applicant = $this->db->insert($this->applicantTbl, $applicant);
            if($applicant){
                $insertuserdata = $this->db->insert($this->userTbl, $userdata);
                if($insertuserdata){
                    $insertdetails = $this->db->insert($this->detailsTbl, $userdetails);
                    if($insertdetails){
                        $insertconfig = $this->db->insert($this->configtbl, $userconfig);
                        if($insertconfig){
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return false;
                    }
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

    function deleteFailedApplication($username){
        try {
            $query = $this->db->query("delete t1,t2,t3,t4 from tblapplicant t1 inner join tblusers t2 on t1.username=t2.username inner join tbluserdetails t3 on t1.username=t3.username inner join tbluserconfiguration t4 on t1.username=t4.username where t1.username='".$username."'");

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