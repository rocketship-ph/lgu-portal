<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPersonnelRequestManagement extends CI_Model{
    function __construct() {
        $this->personnelrequestTbl = 'tblpersonnelrequest';
        $this->personnelrequesttempTbl = 'tblpersonnelrequesttemp';
        $this->publishrequestTbl = 'tblpublishrequest';
    }

    function getNumber(){
        try {
            $schema = $this->session->userdata('schema');
            $query = $this->db->query("CALL requestnumber('".$schema."','".$this->personnelrequestTbl."');");

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

    function insertNewRequest($data = array()){
        try {
            $insert = $this->db->insert($this->personnelrequestTbl, $data);

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

    function requestPublish($reqnum,$data = array()){
        try {
            $query = $this->db->query("update tblpersonnelrequest set levelofapproval='3' where requestnumber='".$reqnum."'");
            if($query){
                $insert = $this->db->insert($this->publishrequestTbl, $data);
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

    function publishPosition($reqnum,$data = array()){
        try {
            $query = $this->db->query("update tblpersonnelrequest set levelofapproval='4' where requestnumber='".$reqnum."'");
            if($query){
                $this->db->set($data);
                $this->db->where('requestnumber', $reqnum);
                $update = $this->db->update($this->publishrequestTbl);
                if($update){
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

    function updateRequest($data = array(),$reqnumber) {

        try {
            $this->db->set($data);
            $this->db->where('requestnumber', $reqnumber);
            $update = $this->db->update($this->personnelrequestTbl);

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

    function deleteRequest($id){
        try {
            $query = $this->db->query("update tblpersonnelrequest set status='1' where id='".$id."'");

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

    function approveRequest($reqnum,$userlevel,$username,$name){
        try {
            $statement = '';
            $insert = '';

            if($userlevel == "HRMANAGER"){
                $statement = "update tblpersonnelrequest set levelofapproval='1' where requestnumber='".$reqnum."'";
                $insert = "insert into tblhrapproved (requestnumber,approvedby,username,levelofapproval) values ('".$reqnum."','".$name."','".$username."','1')";
            } else if($userlevel == "MUNICIPALHEAD"){
                $statement = "update tblpersonnelrequest set levelofapproval='2' where requestnumber='".$reqnum."'";
                $insert = "insert into tblmayorapproved (requestnumber,approvedby,username,levelofapproval) values ('".$reqnum."','".$name."','".$username."','2')";
            } else {
                $statement = '';
            }
            $query = $this->db->query($statement);

            if($query){
                $query = $this->db->query($insert);
                if($insert){
                    return true;
                } else {
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


    function rejectRequest($reqnum,$remarks,$userlevel,$username,$name){
        try {
            $statement = '';
            $insert = '';

            if($userlevel == "HRMANAGER"){
                $statement = "update tblpersonnelrequest set levelofapproval='91' where requestnumber='".$reqnum."'";
            } else if($userlevel == "MUNICIPALHEAD"){
                $statement = "update tblpersonnelrequest set levelofapproval='92' where requestnumber='".$reqnum."'";
            } else {
                $statement = '';
            }
            $query = $this->db->query($statement);

            if($query){
                $insert = "insert into tblrejected (requestnumber,rejectedby,username,remarks,userlevel) values ('".$reqnum."','".$name."','".$username."','".$remarks."','".$this->session->userdata('userlevel')."')";
                $query = $this->db->query($insert);
                if($insert){
                    return true;
                } else {
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

    //FOR ANALYTICS:

    function insertTemporaryRequest($data = array(),$reqnum){
        try {
            $query = $this->db->query("delete from tblpersonnelrequesttemp");
            if($query){
                $insert = $this->db->insert($this->personnelrequesttempTbl, $data);

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

    function getQualifiedEmployeeAnalytics($requestNumber){
        try {
            $query = $this->db->query("select * from analytics_qualifiedemployees where requestnumber='".$requestNumber."'");

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

    function educationalanalytics($reqnum){
        try {
            $query = $this->db->query("select highesteduc,count(distinct highesteduc) as count from analytics_qualifiedemployees where requestnumber='".$reqnum."' group by highesteduc,currentdepartment;");

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

    function positionanalytics($reqnum){
        try {
            $query = $this->db->query("select currentposition,count(distinct currentposition) as count from analytics_qualifiedemployees where requestnumber='".$reqnum."' group by currentposition,currentdepartment;");

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

    function departmentanalytics($reqnum){
        try {
            $query = $this->db->query("select currentdepartment,count(distinct currentdepartment) as count from analytics_qualifiedemployees where requestnumber='".$reqnum."' group by currentdepartment;");

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


    //SPARE CODES
//
    function requests(){
        try {
            $query = $this->db->query("select * from tblpersonnelrequest where levelofapproval='0' and status='0' and createdby='".$this->session->userdata('username')."'");

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
    function getAnnouncements(){
        try {
            $this->db->select('*');
            $this->db->from($this->personnelrequestTbl);
            $this->db->where('status', '0');
            $this->db->where('levelofapproval', '2');
            $this->db->order_by("datecreated", "desc");
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
    function getPersonnelRequest($requestNumber){
        try {
            $this->db->select('*');
            $this->db->from($this->personnelrequestTbl);
            $this->db->where('status', '0');
            $this->db->where('requestnumber', ''.$requestNumber);
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

//    function insertNewCompetency($data = array()){
//        try {
//            $insert = $this->db->insert($this->competencyTbl, $data);
//
//            if($insert){
//                return true;
//            }else{
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
//    }
//

//
//    function editCompetencyIndex($data = array(),$id) {
//
//        try {
//            $this->db->set($data);
//            $this->db->where('id', $id);
//            $update = $this->db->update($this->competencyindexTbl);
//
//            if($update){
//                return true;
//            }else{
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
//    }
//


    function deletePersonnelRequest($id){
        try {
            $query = $this->db->query("update tblpersonnelrequest set status='1' where id='".$id."'");

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

    function updateApprovalLevel($id,$lvl){
        try {
            $query = $this->db->query("update tblpersonnelrequest set levelofapproval='".$lvl."' where id='".$id."'");

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

	function acceptInv($appcode,$username){
        try {
            $query = $this->db->query("insert into tblapplicant (username,requestnumber,status,applicantcode,ispds,isqualified,isbi,isrequirements,isboarding,permanentid,analyticsresult,specificaddress,province,city,brgy,email) select username,requestnumber,status,applicantcode,ispds,isqualified,isbi,isrequirements,isboarding,permanentid,analyticsresult,specificaddress,province,city,brgy,email from tblapplicanttemp where username='".$username."' and applicantcode='".$appcode."' and id=(select max(id) from tblapplicanttemp where username='".$username."' and applicantcode='".$appcode."');");
            if($query){
                $deletetemp = $this->db->query("delete from tblapplicanttemp where username='".$username."' and applicantcode='".$appcode."';");
                if($deletetemp){
                    return true;
                }else {
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


    function getqualifiedemployees($isqualified){
        try {
            $statement="select * from report_qualifiedemployeestemp where isqualified ='".$isqualified."'";
            $query = $this->db->query($statement);
            if($query){
                $result = $query->result_array();
                log_message('debug', 'success');
                log_message('debug', $statement);
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