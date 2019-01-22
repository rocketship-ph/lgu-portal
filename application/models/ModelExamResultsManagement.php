<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelExamResultsManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
    }

    function getRequestnumbers(){
        try {

            $statement = "select distinct requestnumber,to_base64(grouptbl) as grouptable from tblexamassessment order by requestnumber desc;";
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

    function getExamResults($reqnum,$applicantcode){
        try {
            if($applicantcode == "ALL"){
                $statement = "select s.*,concat(u.firstname,' ',u.lastname) applicantname from (select requestnumber,applicantcode,count(distinct evaluator) as evalcount, competency, type, count(type) as comptypecount,weight,sum(score) as total from tblcompetencyscores where requestnumber='".$reqnum."' group by applicantcode,weight,competency,type) s inner join tblapplicant a on s.applicantcode = a.applicantcode inner join tblusers u on u.username=a.username;";
            } else {
                $statement = "select s.*,concat(u.firstname,' ',u.lastname) applicantname from (select requestnumber,applicantcode,count(distinct evaluator) as evalcount, competency, type, count(type) as comptypecount,weight,sum(score) as total from tblcompetencyscores where requestnumber='".$reqnum."' and applicantcode='".$applicantcode."' group by applicantcode,weight,competency,type) s inner join tblapplicant a on s.applicantcode = a.applicantcode inner join tblusers u on u.username=a.username;";
            }
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
            $statement = "select a.applicantcode,a.requestnumber,u.firstname,u.middlename,u.lastname from tblapplicant a inner join tblusers u on a.username=u.username where a.applicantcode in (select applicantcode from tblexamanswers where requestnumber='".$reqnum."' and evaluatorusername='".$username."');";
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

    function getCounts($reqnum){
        try {
            $statement = "select round(count(type)/(select count(id) as count from tblexamassessment where requestnumber='".$reqnum."')) as count,type from tblcompetencyscores where requestnumber='".$reqnum."' group by type;";
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

    function getGroup($reqnum){
        try {
            $statement = "select distinct grouptbl from tblexamassessment where requestnumber='".$reqnum."';";
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

    function getApplicantExamDetails($appcode){
        try {
            $statement = "select requestnumber,applicantcode,competency,type,group_concat(score) as scores,computetotal(group_concat(score)) as total from tblcompetencyscores where applicantcode='".$appcode."' group by applicantcode,competency,type,requestnumber;";
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

    function getExamResultsNew($reqnum,$appcode){
        try {
            $statement = "";
            if($appcode == "ALL"){
                $statement = "select * from report_examresults_consolidated where requestnumber='".$reqnum."'";
            } else {
                $statement = "select * from report_examresults_consolidated where applicantcode='".$appcode."';";
            }
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

}