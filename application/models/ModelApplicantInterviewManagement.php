<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelApplicantInterviewManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
        $this->biTbl = 'tblbi';
        $this->biconductTbl = 'tblconductbi';
    }

    function getRequestnumbers(){
        try {

            $statement = "select r.requestnumber,r.positioncode,p.name as position,p.description,p.groupposition,p.groupdesc,p.groupcode from tblpersonnelrequest r inner join tblposition p on r.positioncode=p.positioncode where r.requestnumber in (select distinct requestnumber from tblapplicant where isboarding <> 'YES' and isrequirements <> 'YES' and status=0) order by r.requestnumber desc";
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

    function getRequestdetails($reqnum,$groupcode){
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

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->biTbl, $data);
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
            $update = $this->db->update($this->biTbl);

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

    function getEncodedInterview($reqnum){
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



    function isanswered($reqnum,$username){
        try {
            $this->db->select('*');
            $this->db->from($this->biconductTbl);
            $this->db->where('encodedby',$username);
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblbi where id='".$id."'");
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