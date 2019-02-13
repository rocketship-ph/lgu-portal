<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPmsRatingManagement extends CI_Model{
    function __construct() {
        $this->ratingTbl = 'tblpmsperformance';
        $this->ansTbl = 'tblexamanswers';
    }

    function getRequestnumbers(){
        try {

            $statement = "select r.requestnumber,r.department,p.name as position,p.groupposition,p.groupdesc from tblpersonnelrequest r inner join tblposition p on r.positioncode=p.positioncode where r.requestnumber in (select requestnumber from tblapplicant where upper(applicantcode) like '%PRO%' and isboarding <> 'YES' and status=0) and p.status=0 order by r.requestnumber desc;";
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

    function getInternalApplicants($reqnum){
        try {
            $statement = "select a.applicantcode,p.username,p.firstname,p.middlename,p.lastname,p.currentposition,d.department,pms.rating,pms.eps,pms.id as rowid from tblapplicant a inner join tblpdsdetails p on a.username=p.username inner join tbluserdetails d on a.username=d.username left join tblpmsperformance pms on a.applicantcode=pms.applicantcode where upper(a.applicantcode) like '%PRO%' and a.requestnumber='".$reqnum."' order by p.firstname asc;";
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
            $statement = "select r.requestnumber,p.positioncode,p.name as positionname,p.description,p.groupposition,p.groupdesc,p.groupcode,e.exam,e.grouptbl as criteria from tblpersonnelrequest r inner join tblposition p on r.positioncode = p.positioncode inner join tblexamination e on e.requestnumber = r.requestnumber where e.requestnumber='".$reqnum."'";
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


    public function update($data = array(),$rowid) {
        try {
            $this->db->where('id',$rowid);
            $query = $this->db->update($this->ratingTbl,$data);
            if($query){
                return true;
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblpmsperformance where id='".$id."'");
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