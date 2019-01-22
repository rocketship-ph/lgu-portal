<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelManageMfoPapManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getdepartments(){
        try {

            $statement = "select distinct department from tblmfopap where status='1' order by department asc;";
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

    function getavailablemfopap($department){
        try {
            $statement = "select m.*,s.strategicobjective,(select group_concat(JSON_OBJECT('username',v.username,'name',v.name,'userlevel',v.userlevel,'department',v.department,'currentposition',v.currentposition,'employmenttype',v.employmenttype,'designation',a.designation)) employees from vw_departmentemployees v inner join tblassignedmfopap a on v.username=a.username where a.mfopapid=m.id and a.status != '2' and v.username in (select username from tblassignedmfopap where mfopapid=m.id group by mfopapid)) employees from tblmfopap m inner join tblso s on m.soid=s.id where upper(m.department) = '".strtoupper($department)."' and m.status='0';";
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

 function getpendingmfopap($department){
        try {
            $statement = "select m.*,s.strategicobjective from tblmfopap m inner join tblso s on m.soid=s.id where m.status='1' and upper(m.department)  = '".strtoupper($department)."'";
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


    function getpendingspecialtask($department){
        try {
            $statement = "select a.id,a.mfopapid,a.username,a.department,a.assignedby,a.status,a.dateassigned,s.strategicobjective,v.name,v.userlevel,v.department,v.currentposition,v.employmenttype,m.mfopap,m.category,m.successindicator,allottedbudget from tblassignedmfopap a inner join tblmfopap m on a.mfopapid=m.id inner join tblso s on m.soid=s.id inner join vw_departmentemployees v on a.username=v.username where upper(m.department)='".strtoupper($department)."' and a.designation='OTHER' and a.status='1';";
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

    function getapprovalspecialtask($department){
        try {
            $statement = "select a.id,a.mfopapid,(select concat(u.firstname,' ',u.middlename, ' ',u.lastname,' [',d.department,']') assignedby from tblusers u inner join tbluserdetails d on u.username=d.username where u.username=a.assignedby) assigned,a.department,a.assignedby,a.status,a.dateassigned,s.strategicobjective,v.name,v.userlevel,v.department,v.currentposition,v.employmenttype,m.mfopap,m.category,m.successindicator,allottedbudget from tblassignedmfopap a inner join tblmfopap m on a.mfopapid=m.id inner join tblso s on m.soid=s.id inner join vw_departmentemployees v on a.username=v.username where upper(a.department)='".strtoupper($department)."' and a.designation='OTHER' and a.status='1';";
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


    function getemployees($designation){
        try {
            if($designation == 'WITHIN'){
                $statement = "select * from vw_departmentemployees where department='".$this->session->userdata('department')."' and department != ''";
            } else {
                $statement = "select * from vw_departmentemployees where department!='".$this->session->userdata('department')."' and department != ''";
            }

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


    public function assignmfopap($data,$mfos) {
        try {
            $delete = $this->db->query("delete from tblassignedmfopap where mfopapid in (select id from tblmfopap where upper(department)='".$this->session->userdata('department')."' and status=0)");
            if($delete){
                $insert = $this->db->query("insert into tblassignedmfopap (mfopapid,username,department,designation,assignedby,status) values ".$data);
                if($insert){
                    return true;
                } else {
                    return false;
                }
            }else{
                return false;
            }

        } catch(Exception $e){
            log_message('error', $e);
            return false;
        }
    }

    public function insert($data = array()) {
        try {
            $insert = $this->db->insert($this->mfopapTbl, $data);
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

    public function approvetask($id) {

        try {
            $statement = "update tblassignedmfopap set status='0' where id='".$id."'";
            $query = $this->db->query($statement);
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


    public function rejecttask($id) {

        try {
            $statement = "update tblassignedmfopap set status='2' where id='".$id."'";
            $query = $this->db->query($statement);
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
            $delete = $this->db->query("update tblmfopap set status='2' where id='".$id."'");
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

    public function approve($data) {
        try {
            $delete = $this->db->query("update tblmfopap set status='0' where id in (".$data.")");
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