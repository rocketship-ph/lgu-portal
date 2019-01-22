<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelExaminationManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
    }

    function getRequestnumbers($username){
        try {

            $statement = "select distinct requestnumber from tblevaluators where evaluatorusername='".$username."' and requestnumber in (select requestnumber from tblpersonnelrequest where positioncode in (select positioncode from tblposition where status='0')) order by requestnumber desc;";
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

    function getGrouptable($reqnum){
        try {
            $statement = "select r.requestnumber,p.positioncode,p.name as positionname,p.description,p.groupposition,p.groupdesc,p.cbiskills,g.* from tblpersonnelrequest r inner join tblposition p on r.positioncode = p.positioncode left outer join tblgrouptable g on p.groupcode = g.groupcode where r.requestnumber='".$reqnum."';";
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

    function getExistingExam($reqnum,$username){
        try {
            $statement = "select r.requestnumber,p.positioncode,p.name as positionname,p.description,p.groupposition,p.groupdesc,p.groupcode,e.exam,e.grouptbl as criteria from tblpersonnelrequest r inner join tblposition p on r.positioncode = p.positioncode inner join tblexamination e on e.requestnumber = r.requestnumber where e.requestnumber='".$reqnum."' and e.createdby='".$username."';";
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

    public function insert($data = array(),$reqnum,$username) {
        try {
            $sql = "delete from tblexamination where requestnumber='".$reqnum."' and createdby='".$username."'";
            $delete = $this->db->query($sql);
            if($delete){
                $insert = $this->db->insert($this->examTbl, $data);
                if($insert){
                    return true;
                }else{
                    return false;
                }
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