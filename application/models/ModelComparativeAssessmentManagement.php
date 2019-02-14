<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelComparativeAssessmentManagement extends CI_Model{
    function __construct() {
        $this->ratingTbl = 'applicant_summary';
    }

    function getRequestnumbers(){
        try {

            $statement = "select distinct requestnumber from applicant_summary order by requestnumber desc;";
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

    function getSummary($reqnum){
        try {
            $statement = "select * from applicant_summary where requestnumber='".$reqnum."' order by field(applicanttype,'INTERNAL','EXTERNAL'),lastname asc;";
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

    function getSignatories($reqnum){
        try {
            $statement = "select concat('[',GROUP_CONCAT(JSON_OBJECT('name',fullname,'position',currentposition,'department',department,'username',username)),']') as signatories from csc_signatories where username in (select evaluatorusername from tblevaluators where requestnumber='".$reqnum."');";
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
            $insert = $this->db->insert($this->ratingTbl, $data);
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


    public function update($data = array(),$rowid) {
        try {
            $this->db->where('id',$rowid);
            $query = $this->db->update($this->ratingTbl,$data);
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblpotentialrating where id='".$id."'");
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