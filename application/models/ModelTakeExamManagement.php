<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelTakeExamManagement extends CI_Model{
    function __construct() {
        $this->ansTbl = 'tblexamanswers';
    }

    function getEvaluators($requestnumber){
        try {
            $statement = "select evaluatorusername from tblevaluators where requestnumber='".$requestnumber."'";
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

    function getExam($reqnum){
        try {
            $applicantcode = $this->session->userdata('applicantcode');
            $statement = "select r.requestnumber,p.positioncode,p.name as positionname,p.description,p.groupposition,p.groupdesc,p.groupcode,e.exam,e.grouptbl as criteria from tblpersonnelrequest r inner join tblposition p on r.positioncode = p.positioncode inner join tblexamination e on e.requestnumber = r.requestnumber where e.requestnumber='".$reqnum."' and e.requestnumber not in (select requestnumber from tblexamanswers where applicantcode='".$applicantcode."')";
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

    function hasAnswers($reqnum){
        try {
            $applicantcode = $this->session->userdata('applicantcode');
            $statement = "select * from tblexamanswers where applicantcode='".$applicantcode."' and requestnumber='".$reqnum."'";
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
            $insert = $this->db->insert($this->ansTbl, $data);
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