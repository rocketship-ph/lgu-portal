<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelEvaluatorSelectionManagement extends CI_Model{
    function __construct() {
        $this->requestTbl = 'tblrequests';
        $this->mayorApproveTbl = 'tblmayorapproved';
    }

    public function insert($data,$reqnum) {
        try {
            $delete = $this->db->query("delete from tblevaluators where requestnumber='".$reqnum."'");
            log_message('debug', "delete from tblevaluators where requestnumber='".$reqnum."'");
            if($delete){
                $insert = $this->db->query("insert into tblevaluators (requestnumber,evaluatorname,evaluatorusername,userlevel,status,evalorder,isadditional) values ".$data);
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


    public function insertnotif($data) {
        try {
            $insert = $this->db->query("insert into tblnotification (requestnumber,notiftype,levelofapproval,tonotif,fromnotif,status,message) values ".$data);
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


    public function delete($reqnum) {
        try {
            $delete = $this->db->query("delete from tblevaluators where requestnumber='".$reqnum."'");
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

    function requests(){
        try {
            $query = $this->db->query("select m.*,r.*,p.name from tblmayorapproved m inner join tblpersonnelrequest r on m.requestnumber=r.requestnumber inner join tblposition p on r.positioncode=p.positioncode order by r.requestnumber desc");

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

    function defaultevals($reqnum){
        try {
            $sql = "select * from(select firstname,middlename,lastname,userlevel,username,".
                "(case when (userlevel='MUNICIPALHEAD') THEN '1'".
                "when (userlevel='HRMANAGER') then '2'".
                "end) as 'evalorder','NO' isadditional from tblusers where userlevel in ('HRMANAGER','MUNICIPALHEAD') and status = '0' ".
                "union select firstname,middlename,lastname,userlevel,username,'3' as 'evalorder','NO' isadditional from tblusers ".
                " where username in (select createdby from tblpersonnelrequest where requestnumber = '".$reqnum."' and createdby not in (select username from tblusers where userlevel='HRMANAGER'))) ".
                "as evals order by evalorder asc;";
            $query = $this->db->query($sql);

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

    function existingevals($reqnum){
        try {
            $query = $this->db->query("select u.firstname,u.middlename,u.lastname,u.userlevel,e.evalorder,u.username,e.isadditional from tblusers u inner join tblevaluators e on u.username=e.evaluatorusername where e.requestnumber='".$reqnum."' order by e.evalorder asc;");

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

    function qualifiedevals($reqnum){
        try {
            $query = $this->db->query("select * from tblusers where userlevel not in ('HRMANAGER','MUNICIPALHEAD','TEMPORARY','ADMINISTRATOR') and status ='0' and username not in (select createdby from tblpersonnelrequest where requestnumber='".$reqnum."') order by firstname asc");

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