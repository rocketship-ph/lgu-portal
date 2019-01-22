<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelOpcrManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getData($period){
        try {

            //submit IPCRs that are evaluated
            $statement = "select i.id ipcrid,i.mfopapid,s.id soid,i.username,v.*,i.accomplishment,s.strategicobjective,s.period,s.periodfrom,s.periodto,m.department mfodepartment,m.mfopap,m.category,m.successindicator,m.allottedbudget,rate.Q,rate.E,rate.T,rate.A from tblipcr i inner join tblso s on i.soid=s.id inner join tblmfopap m on i.mfopapid=m.id inner join vw_departmentemployees v on i.username=v.username left join (select ipcrid,avg(q) Q,avg(e) E,avg(t) T,round(avg(a),3) A from tblipcrrating group by ipcrid,employee) rate on i.id=rate.ipcrid where i.mfopapid=m.id and i.status='100' and s.period='".$period."' and m.department='".$this->session->userdata('department')."';";
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


    function insertopcr($data,$username,$period){
        try {
            $delete = $this->db->query("delete from tblopcr where username='".$username."' and period='".$period."'");
            if($delete){
                $insert = $this->db->query("insert into tblopcr (opcrid,username,department,soid,ipcrid,mfopapid,mfodepartment,rating,accomplishment,status,period) values ".$data);
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



}