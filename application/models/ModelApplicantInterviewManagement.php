<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelApplicantInterviewManagement extends CI_Model{
    function __construct() {
        $this->examTbl = 'tblexamination';
        $this->ansTbl = 'tblexamanswers';
        $this->interviewTbl = 'tblinterviewquestions';
        $this->interviewConductTbl = 'tblconductinterview';
    }

    function getRequestnumbers(){
        try {

            $statement = "select r.requestnumber,r.positioncode,p.name as position,p.description,p.groupposition,p.groupdesc,p.groupcode,g.criteria from tblpersonnelrequest r inner join tblposition p on r.positioncode=p.positioncode inner join tblgrouptable g on p.groupcode=g.groupcode where r.requestnumber in (select distinct requestnumber from tblapplicant where isboarding <> 'YES' and isrequirements <> 'YES' and status=0) order by r.requestnumber desc;";
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

    function getRequestdetails($technical){
        try {
            if($technical == "ALL"){
                $statement = "select * from tblcompetencyindex where competencyid in (select id from tblcompetency where type='TECHNICAL') and type='BEHAVIORAL'";
            } else {
                $t = explode(",",$technical);
                $titles = "";
                foreach($t as $value){
                    $titles .= "'".$value."',";
                }
                $tdata = substr($titles, 0, -1);
                $statement = "select * from tblcompetencyindex where competencytitle in (".$tdata.") and type='BEHAVIORAL'";
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

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->interviewTbl, $data);
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
            $update = $this->db->update($this->interviewTbl);

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
            $this->db->from($this->interviewConductTbl);
            $this->db->where('conductedby',$username);
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
            $delete = $this->db->query("delete from tblinterviewquestions where id='".$id."'");
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