<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelConductBiManagement extends CI_Model{
    function __construct() {
        $this->biTbl = 'tblbi';
        $this->biconductTbl = 'tblconductbi';
        $this->biAssesstbl = 'tblbiassessment';
    }

    function getRequestnumbers(){
        try {

            $statement = "select distinct requestnumber from tblapplicant where forbi='YES' order by requestnumber desc;";
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
            $statement = "select u.firstname,u.middlename,u.lastname,u.userlevel,a.* from tblusers u inner join tblapplicant a on u.username=a.username where a.requestnumber='".$reqnum."' and a.forbi='YES' and a.applicantcode not in (select applicantcode from tblbiassessment);";
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

    function getQuestions($reqnum,$username){
        try {
            $statement = "select * from tblbi where requestnumber='".$reqnum."' and encodedby='".$username."';";
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

    function getAnsweredBi($reqnum,$username,$applicantcode){
        try {
            $statement = "select * from tblconductbi where requestnumber='".$reqnum."' and encodedby='".$username."' and applicantcode='".$applicantcode."';";
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
            $insert = $this->db->insert($this->biconductTbl, $data);
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
            $update = $this->db->update($this->biconductTbl);

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
            $this->db->from($this->biAssesstbl);
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblconductbi where id='".$id."'");
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