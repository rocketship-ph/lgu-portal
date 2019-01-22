<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelIpcrManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getData($period){
        try {

            $statement = "select ac.mfopapid,s.id,ac.username,v.*,ac.actualaccomplishment,ac.rating,s.strategicobjective,s.period,s.periodfrom,s.periodto,s.id soid,m.department mfopapdepartment,m.mfopap,m.category,m.successindicator,m.allottedbudget from tblactualaccomplishment ac inner join tblmfopap m on ac.mfopapid = m.id inner join tblso s on ac.soid =s.id inner join vw_departmentemployees v on ac.username=v.username where upper(ac.username)='".strtoupper($this->session->userdata('username'))."' and ac.mfopapid=m.id and s.period='".$period."';";
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


    function getPendingData($period,$username){
        try {

            $statement = "select i.soid,i.mfopapid,s.strategicobjective,s.periodfrom,s.periodto,i.period,i.username,i.employeedepartment,i.mfodepartment,i.rating,i.accomplishment,m.mfopap,m.category,m.successindicator,m.allottedbudget,i.status,v.*,i.id ipcrid from tblipcr i inner join tblso s on i.soid=s.id inner join tblmfopap m on i.mfopapid=m.id inner join vw_departmentemployees v on v.username=i.username where i.username='".$username."' and i.period='".$period."' and i.status='1';";
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

  function displaypersonnel($period){
        try {

            $statement = "select distinct i.username,(select concat(firstname,' ',middlename,' ',lastname)  from tblusers where username=i.username) name from tblipcr i where i.period='".$period."' and i.status='1';";
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

            $statement = "select distinct i.username,(select concat(firstname,' ',middlename,' ',lastname)  from tblusers where username=i.username) name,i.mfodepartment from tblipcr i where i.period='".$period."' and upper(i.mfodepartment)='".$department."' and i.id not in (select ipcrid from tblipcrrating where evaluator='".$this->session->userdata("username")."') order by username desc;";
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


    function insertipcr($data,$username,$period){
        try {
            $delete = $this->db->query("delete from tblipcr where username='".$username."' and period='".$period."'");
            if($delete){
                $insert = $this->db->query("insert into tblipcr (username,soid,mfopapid,employeedepartment,mfodepartment,rating,accomplishment,period,status) value ".$data);
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