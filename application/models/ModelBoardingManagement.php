<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelBoardingManagement extends CI_Model{
    function __construct() {
        $this->applicantTbl = 'tblapplicant';
    }

    function getApplicantCode(){
        try {

            $statement = "select u.firstname,u.lastname,a.*,r.department,p.name as position from tblapplicant a inner join tblusers u on a.username=u.username inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode where isboarding <> 'YES' and isrequirements='YES';";
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

    function getFocalPerson($department){
        try {

            $statement = "select upper(d.department),p.firstname,p.middlename,p.lastname,p.username,p.currentposition from tbluserdetails d inner join tblpdsdetails p on d.username=p.username where (d.department != '' and d.department is not null and d.department <> '') and upper(d.department)='".strtoupper($department)."' order by p.firstname asc;";
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

    public function boardApplicant($data=array(),$appcode) {

        try {
            $this->db->set($data);
            $this->db->where('applicantcode', $appcode);
            $board = $this->db->update($this->applicantTbl);

            if($board){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function checkExistingId($permanentid){
        try {
            $this->db->select('*');
            $this->db->from($this->applicantTbl);
            $this->db->where('permanentid',$permanentid);
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



}