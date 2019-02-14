<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPotentialRatingManagement extends CI_Model{
    function __construct() {
        $this->ratingTbl = 'tblpotentialrating';
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
            $username = $this->session->userdata('username');
            $statement = "select a.applicantcode,p.username,p.firstname,p.middlename,p.lastname,p.currentposition,d.department,pt.rating,pt.eps,pt.id as rowid from tblapplicant a inner join tblpdsdetails p on a.username=p.username  inner join tbluserdetails d on a.username=d.username  left join tblpotentialrating pt on a.applicantcode=pt.applicantcode and pt.evaluator='".$username."' where upper(a.applicantcode) like '%PRO%' and a.requestnumber='".$reqnum."'  and a.requestnumber in (select requestnumber from tblevaluators where evaluatorusername='".$username."')  order by p.firstname asc;";
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

    public function delete($id) {
        try {
            $delete = $this->db->query("delete from tblpotentialrating where id='".$id."'");
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