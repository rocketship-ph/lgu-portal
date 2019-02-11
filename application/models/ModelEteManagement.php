<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelEteManagement extends CI_Model{
    function __construct() {
        $this->eteTbl = 'tblete';
    }

    function getApplicantCode(){
        try {

            $statement = "select u.firstname,u.lastname,a.*,r.department,p.name as position,pd.currentposition from tblapplicant a inner join tblusers u on a.username=u.username inner join tblpersonnelrequest r on a.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode inner join tblpdsdetails pd on a.username=pd.username where isboarding <> 'YES' and isqualified='YES';";
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

    function isEditable($applicantcode){
        try {

            $statement = "select * from tblapplicant where applicantcode='".$applicantcode."' and isboarding != 'YES'";
            $query = $this->db->query($statement);
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

function getExistingdata($applicantcode){
        try {

            $statement = "select * from tblete where applicantcode='".$applicantcode."'";
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
            $insert = $this->db->insert($this->eteTbl, $data);
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
            $update = $this->db->update($this->eteTbl);

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



}