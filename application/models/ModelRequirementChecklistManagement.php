<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelRequirementChecklistManagement extends CI_Model{
    function __construct() {
        $this->positionTbl = 'tblposition';
        $this->salaryTbl = 'tblsalary';
        $this->competencyIndexTbl = 'tblcompetencyindex';
        $this->groupPositionTbl = 'tblgroupposition';
    }

    function getrequestnumbers(){
        try {
            $statement = "select * from view_requestnumbers_checklist;";
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

    function getrequestnumbersapplicant(){
        try {
            $statement = "select * from tblpersonnelrequest where status=0 order by id desc;";
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
    function getchecklistreqnums(){
        try {
            $statement = "select distinct r.requestnumber,p.name,p.groupdesc,p.groupposition from tblrequirements r inner join tblpersonnelrequest q on r.requestnumber=q.requestnumber inner join tblposition p on q.positioncode=p.positioncode order by requestnumber desc;";
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

function getapplicants($reqnum){
        try {
            $statement = "select a.applicantcode,concat(u.firstname,' ',u.middlename,' ' ,u.lastname) applicantname from tblapplicant a inner join tblusers u on a.username=u.username where a.requestnumber='".$reqnum."' and a.applicantcode <> '' and a.isbi='YES' order by a.applicantcode desc;";
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

    function getrequirementchecklist($reqnum){
        try {
            $statement = "select distinct * from tblrequirements where requestnumber='".$reqnum."' order by reqid asc;";
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

    function getapplicantsubmittedreqs($reqnum,$appcode){
        try {
            $statement = "select * from tblsubmittedrequirements where requestnumber='".$reqnum."' and applicantcode='".$appcode."';";
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
    function insertrequirements($data){
        try {
            $insert = $this->db->query("insert into tblrequirements (requirement,requestnumber) values ".$data);
            if($insert){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function updaterequirements($data){
        try {
            $insert = $this->db->query("insert into tblrequirements (reqid,requirement,requestnumber) values ".$data." ON DUPLICATE KEY UPDATE requirement = VALUES(requirement);");
            if($insert){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }


    function deleterequirements($data){
        try {
            $insert = $this->db->query("delete from tblrequirements where requestnumber='".$data."';");
            if($insert){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    function checklist($data,$requestnumber,$applicantcode){
        try {
            $delete = $this->db->query("delete from tblsubmittedrequirements where requestnumber='".$requestnumber."' and applicantcode='".$applicantcode."';");
            if($delete){
                $insert = $this->db->query("insert into tblsubmittedrequirements (requestnumber,applicantcode,requirementid) values ".$data." ;");
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

function completerequirements($applicantcode){
        try {
            $insert = $this->db->query("update tblapplicant set isrequirements='YES' where applicantcode='".$applicantcode."'");
            if($insert){
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