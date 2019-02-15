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

    public function checkRecord($appcode) {
        try {
            $check = $this->db->query("select * from tblapplicant where applicantcode='".$appcode."' and (isbi='YES' || forbi='YES')");
            if($check->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function forBackground($appcode) {
        try {
            $update = $this->db->query("update tblapplicant set forbi='YES' where applicantcode='".$appcode."'");
            if($update){
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