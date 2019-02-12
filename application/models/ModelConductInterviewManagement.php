<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelConductInterviewManagement extends CI_Model{
    function __construct() {
        $this->evaluatorsTbl = 'tblevaluators';
        $this->interviewConductTbl = 'tblconductinterview';
        $this->interviewPsptTbl = 'tblinterviewpspt';
        $this->interviewAssesstbl = 'tblinterviewassessment';
    }

    function isevaluator($reqnum,$username){
        try {
            $this->db->select('*');
            $this->db->from($this->evaluatorsTbl);
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

    function getRequestnumbers(){
        try {

            $statement = "select distinct requestnumber from tblinterviewquestions order by requestnumber desc;";
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

    function getRequestdetails($reqnum){
        try {
            $statement = "select * from tblposition where positioncode in (select positioncode from tblpersonnelrequest where requestnumber = '".$reqnum."');";
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
    function getEvaluators($reqnum){
        try {
            $statement = "select * from tblusers where username in (select distinct encodedby from tblbi where requestnumber='".$reqnum."');";
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

    function getApplicants($reqnum){
        try {
            $statement = "select u.firstname,u.middlename,u.lastname,u.userlevel,a.*,pd.currentposition from tblusers u inner join tblapplicant a on u.username=a.username inner join tblpdsdetails pd on a.username=pd.username where a.requestnumber='".$reqnum."' and a.isqualified='YES' and a.applicantcode not in (select applicantcode from tblinterviewpspt where evaluator='".$this->session->userdata('username')."');";
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

    function getQuestions($reqnum){
        try {
            $statement = "select * from tblinterviewquestions where requestnumber='".$reqnum."';";
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

    function getAnsweredInterview($reqnum,$username,$applicantcode){
        try {
            $statement = "select * from tblinterviewpspt where requestnumber='".$reqnum."' and evaluator='".$username."' and applicantcode='".$applicantcode."';";
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
            $insert = $this->db->insert($this->interviewPsptTbl, $data);
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

    public function update($data = array(),$id) {

        try {
            $this->db->set($data);
            $this->db->where('id', $id);
            $update = $this->db->update($this->interviewPsptTbl);

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

    function isanswered($reqnum,$username,$applicantcode){
        try {
            $this->db->select('*');
            $this->db->from($this->interviewAssesstbl);
            $this->db->where('assessedby',$username);
            $this->db->where('requestnumber',$reqnum);
            $this->db->where('applicantcode',$applicantcode);
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

    function isbi($reqnum,$username,$applicantcode){
        try {
            $this->db->select('*');
            $this->db->from('tblapplicant');
            $this->db->where('applicantcode',$applicantcode);
            $this->db->where('isbi','YES');
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblinterviewpspt where id='".$id."'");
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