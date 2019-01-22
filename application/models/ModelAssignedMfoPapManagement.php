<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelAssignedMfoPapManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getassignedmfopap($username){
        try {
            $statement = "select a.id,s.strategicobjective,m.department,m.mfopap,m.category,m.successindicator,m.allottedbudget,a.username employee_username,a.department employee_department,s.id soid,m.id mfopapid, aa.actualaccomplishment,aa.rating from tblassignedmfopap a inner join tblmfopap m on a.mfopapid=m.id inner join tblso s on m.soid=s.id left join tblactualaccomplishment aa on a.mfopapid=aa.mfopapid and a.username=aa.username where m.status=0 and a.status=0 and a.username='".$username."'";
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




    function insertaccomplishment($data,$username,$mfopapids){
        try {
            $delete = $this->db->query("delete from tblactualaccomplishment where username='".$username."' and mfopapid in (".$mfopapids.")");
            $stmt = "delete from tblactualaccomplishment where username='".$username."' and mfopapid in (".$mfopapids.")";
            log_message('debug', $stmt);
            if($delete){
                $insert = $this->db->query("insert into tblactualaccomplishment (username,soid,mfopapid,actualaccomplishment,rating) value ".$data);
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

    function approveipcr($data,$username,$period){
        try {
            $delete = $this->db->query("delete from tblipcr where username='".$username."' and period='".$period."'");
            if($delete){
                $insert = $this->db->query("insert into tblipcr (username,soid,mfopapid,employeedepartment,mfodepartment,rating,accomplishment,approvedby,period,status) value ".$data);
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

    function rejectipcr($username,$period){
        try {
            $update = $this->db->query("update tblipcr set status='2' where username='".$username."' and period='".$period."'");
            if($update){
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