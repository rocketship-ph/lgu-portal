<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPmsEvaluationManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getipcrdata($period,$deparment,$username){
        try {

            $statement = "select i.soid,i.mfopapid,s.strategicobjective,s.periodfrom,s.periodto,i.period,i.username,i.employeedepartment,i.mfodepartment, case when (select count(*) from tblpmsevaluation where soid=i.soid and mfopapid=i.mfopapid and username=i.username and evaluator='".$this->session->userdata('username')."' and type='IPCR') > 0 then (select rating from tblpmsevaluation where soid=i.soid and mfopapid=i.mfopapid and username=i.username and evaluator='".$this->session->userdata('username')."'and type='IPCR') else i.rating end rating,i.accomplishment,m.mfopap,m.category,m.successindicator,m.allottedbudget,i.status,v.*,i.id ipcrid from tblipcr i inner join tblso s on i.soid=s.id inner join tblmfopap m on i.mfopapid=m.id inner join vw_departmentemployees v on v.username=i.username where i.username='".$username."' and i.period='".$period."' and upper(i.mfodepartment)='".strtoupper($deparment)."';";
            log_message('debug', $statement);
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

    function getopcrdata($period,$deparment){
        try {
            $maxlength = $this->db->query("SET SESSION group_concat_max_len = 1000000;");
            $statement = "select * from vw_evaluateopcr where department='".$deparment."' and period='".$period."';";
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

    function getiopcrdata($period,$deparment){
        try {

            $statement = "select i.soid,i.mfopapid,s.strategicobjective,s.periodfrom,s.periodto,i.period,i.username,i.employeedepartment,i.mfodepartment, case when (select count(*) from tblpmsevaluation where soid=i.soid and mfopapid=i.mfopapid and username=i.username and evaluator='".$this->session->userdata('username')."' and type='IPCR') > 0 then (select rating from tblpmsevaluation where soid=i.soid and mfopapid=i.mfopapid and username=i.username and evaluator='".$this->session->userdata('username')."'and type='IPCR') else i.rating end rating,i.accomplishment,m.mfopap,m.category,m.successindicator,m.allottedbudget,i.status,v.*,i.id ipcrid from tblipcr i inner join tblso s on i.soid=s.id inner join tblmfopap m on i.mfopapid=m.id inner join vw_departmentemployees v on v.username=i.username where i.username='".$username."' and i.period='".$period."' and upper(i.mfodepartment)='".strtoupper($deparment)."';";
            log_message('debug', $statement);
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

    function displaypersonnelevaluation($period,$department){
        try {

            $statement = "select distinct i.username,(select concat(firstname,' ',middlename,' ',lastname)  from tblusers where username=i.username) name,i.mfodepartment from tblipcr i where i.period='".$period."' and i.status='0' and upper(i.mfodepartment)='".strtoupper($department)."' order by username desc;";
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


    function evaluateipcr($data,$updatedata,$updateopcr,$employee,$period,$ipcrrating){
        try {
            $insert = $this->db->query("insert into tblpmsevaluation (iopcrid,evaluator,rating,remarks,type,username,period,soid,mfopapid) value ".$data);
            if($insert){
                $insertrating = $this->db->query("insert into tblipcrrating (employee,mfopapid,ipcrid,period,evaluator,q,e,t,a) value ".$ipcrrating);
                $update = $this->db->query("update tblipcr set status='100' where id in (".$updatedata.")");
//                $udopcr = $this->db->query("UPDATE tblopcr SET rating = CASE ".$updateopcr." END WHERE ipcrid IN (".$updatedata.") AND username = '".$employee."' and period='".$period."'");
                $stmt = "UPDATE tblopcr SET rating = CASE ".$updateopcr." END WHERE ipcrid IN (".$updatedata.") AND username = '".$employee."' and period='".$period."'";
                log_message('debug',$stmt);
                return true;
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


    function evaluateopcr($dataopcr,$opcrrating,$ipcrids,$updateopcrrating,$period){
        try {
            $insert = $this->db->query("insert into tblpmsevaluation (iopcrid,evaluator,rating,remarks,type,username,period,soid,mfopapid,tblopcrid) value ".$dataopcr);
            if($insert){
                $insertrating = $this->db->query("insert into tblopcrrating (employee,ipcrid,opcrid,mfopapid,period,evaluator,q,e,t,a) value ".$opcrrating);
                $udopcr = $this->db->query("UPDATE tblopcr SET status='100',approvedby='".$this->session->userdata('username')."', rating = CASE ".$updateopcrrating." END WHERE ipcrid IN (".$ipcrids.") AND period='".$period."'");
//                log_message('debug',$stmt);
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