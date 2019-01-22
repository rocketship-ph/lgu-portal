<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelNotificationManagement extends CI_Model{
    function __construct() {
        $this->personnelrequestTbl = 'tblpersonnelrequest';
        $this->notifTbl = 'tblnotification';
        $this->dismissTbl = 'tbldismissednotif';

    }



    function getNotifs($userlevel){
        try {
            $type = "";
            if($userlevel == "HRMANAGER"){
                $type = "HR";
            } else if($userlevel == "DEPARTMENTHEAD"){
                $type = "DEPT";
            } else if($userlevel == "MUNICIPALHEAD"){
                $type = "MAYOR";
            } else if($userlevel == "ITADMIN"){
                $type = "IT";
            } else {
                $type = "NOMATCH";
            }
            $username = $this->session->userdata('username');
            $query = $this->db->query("select n.*,t.id as notifid,'' message from notification n inner join tblnotification t on n.requestnumber=t.requestnumber where n.levelofapproval=t.levelofapproval and t.status='0' and t.id not in (select notifid from tbldismissednotif where username='".$username."') and n.notiftype like '%".$type."%' union all select requestnumber,levelofapproval,fromnotif,'HRMANAGER' as notiftype,id as notifid,message from tblnotification where notiftype in ('EVALUATOR ASSESSMENT','EVALUATOR ASSIGNMENT','APPLICATION REQUIREMENT') and id not in (select notifid from tbldismissednotif where username='".$username."') and fromnotif <>'".$username."' and tonotif  in ('".$userlevel."','".$username."');");

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

    function getReqDetails($reqnum){
        try {
            $this->db->select('*');
            $this->db->from('approvedrequestdetailshr');
            $this->db->where('requestnumber',$reqnum);
            $query = $this->db->get();

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

    function getApprovedReqDetails($reqnum){
        try {
            $this->db->select('*');
            $this->db->from('approvedrequestdetails');
            $this->db->where('requestnumber',$reqnum);
            $query = $this->db->get();

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

    function insertNotif($data = array()){
        try {
            $insert = $this->db->insert($this->notifTbl, $data);

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

    function dismissNotif($data = array()){
        try {
            $insert = $this->db->insert($this->dismissTbl, $data);

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




//    ===================================
//    ||  GET APPLICANT EMAIL,USERNAME ||
//    ===================================


    function getApplicantData($appcode){
        try {
            $query = $this->db->query("select * from tblapplicant where applicantcode='".$appcode."';");

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


//    =======================================
//    ||  END GET APPLICANT EMAIL,USERNAME ||
//    =======================================


//    ===================================
//    ||  UPDATE APPLICANT ISBI==YES   ||
//    ===================================


    function updateisbi($appcode){
        try {
            $query = $this->db->query("update tblapplicant set isbi='YES' where applicantcode='".$appcode."';");

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


//    =======================================
//    ||  END UPDATE APPLICANT ISBI==YES   ||
//    =======================================


	function getJobInvitationNotifs(){
        try {
            $username = $this->session->userdata('username');
            $query = $this->db->query("select requestnumber,levelofapproval,fromnotif,notiftype,id as notifid,message,notifdetails from tblnotification where id not in (select notifid from tbldismissednotif where username='".$username."') and tonotif='".$username."' and levelofapproval='300';");
 
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
}

