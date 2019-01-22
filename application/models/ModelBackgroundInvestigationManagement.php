<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelBackgroundInvestigationManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
        $this->biTbl = 'tblbi';
        $this->biconductTbl = 'tblconductbi';
    }

    function getRequestnumbers($username){
        try {

            $statement = "select distinct e.requestnumber from tblevaluators e inner join tblpublishrequest p on e.requestnumber=p.requestnumber where e.evaluatorusername='".$username."' and e.requestnumber in (select requestnumber from tblpersonnelrequest where positioncode in (select positioncode from tblposition where status='0')) order by e.requestnumber desc;";
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

    function getEncodedBi($reqnum,$username){
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