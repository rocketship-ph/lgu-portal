<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelExamAssessmentManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
        $this->assessmentTbl = 'tblexamassessment';
    }

    function getRequestnumbers($username){
        try {

            $statement = "select distinct requestnumber from tblexamanswers where requestnumber in (select requestnumber from tblevaluators where evaluatorusername='".$username."') order by requestnumber desc;";
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

    function getRequestDetails($reqnum){
        try {
            $statement = "select r.requestnumber,p.positioncode,p.name as positionname,p.description,p.groupposition,p.groupdesc from tblpersonnelrequest r inner join tblposition p on r.positioncode = p.positioncode where r.requestnumber='".$reqnum."';";
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

    function getApplicantCode($reqnum){
        try {
            $username = $this->session->userdata('username');
            $statement = "select a.applicantcode,a.requestnumber,u.firstname,u.middlename,u.lastname from tblapplicant a inner join tblusers u on a.username=u.username where a.applicantcode in (select applicantcode from tblexamanswers where requestnumber='".$reqnum."') and a.applicantcode not in (select applicantcode from tblexamassessment where requestnumber='".$reqnum."' and evaluatorusername='".$username."');";
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

    function getExamAnswer($reqnum,$username,$applicantcode){
        try {
            $statement = "select requestnumber,evaluatorusername,applicantcode,exam,groupposition,grouptbl as criteria from tblexamanswers where requestnumber='".$reqnum."' and applicantcode='".$applicantcode."';";
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
            $insert = $this->db->insert($this->assessmentTbl, $data);
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

    public function insertScores($data) {
        try {
            $insert = $this->db->query("insert into tblcompetencyscores (requestnumber,applicantcode,evaluator,competency,type,level,weight,score)  values ".$data);
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

    function isanswered($reqnum,$username){
        try {
            $this->db->select('*');
            $this->db->from($this->ansTbl);
            $this->db->where('evaluatorusername',$username);
            $this->db->where('requestnumber',$reqnum);
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

    public function delete($reqnum,$username) {
        try {
            $delete = $this->db->query("delete from tblexamination where requestnumber='".$reqnum."' and createdby='".$username."'");
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