<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class CheckExistingRecord extends CI_Model{
    function __construct() {
        $this->usersTbl = 'tblusers';
        $this->requestTbl = 'tblrequest';
        $this->departmentTbl = 'tbldepartments';
        $this->competencyTbl = 'tblcompetency';
        $this->competencyindexTbl = 'tblcompetencyindex';
        $this->positionTbl = 'tblposition';
        $this->applicantTbl = 'tblapplicant';
        $this->soTbl = 'tblso';
        $this->pmtTbl = 'tblpmt';
        $this->ipcrTbl = 'tblipcr';
        $this->opcrTbl = 'tblopcr';
        $this->pmsEvaluationTbl = 'tblpmsevaluation';
	$this->eventsTbl = 'tblevents';
    }

    //for user registration 
    function checkUsers($userId){
        try {
            $this->db->select('*');
            $this->db->from($this->usersTbl);
            $this->db->where('username',$userId);
            $this->db->where('status','0');
            $query = $this->db->get();
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

	function checkMayorManagerUsers($userlevel){
        try {
            $this->db->select('*');
            $this->db->from($this->usersTbl);
            $this->db->where('userlevel',$userlevel);
            $this->db->where('status','0');
            $query = $this->db->get();
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

    //for logo change requests 
    function checkLogoRequest($lguid,$status){
        $admindb = $this->load->database('dbadmin', TRUE);

        try {
            $admindb->select('*');
            $admindb->from($this->requestTbl);
            $admindb->where('lguid',$lguid);
            $admindb->where('status',$status);
            $query = $admindb->get();
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

    //for department profile
    function checkDepartments($dept){
        try {
            $this->db->select('*');
            $this->db->from($this->departmentTbl);
            $this->db->where('department',$dept);
            $query = $this->db->get();
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

    function checkCompetencyTitles($title){
        try {
            $this->db->select('*');
            $this->db->from($this->competencyTbl);
            $this->db->where('title',$title);
            $query = $this->db->get();
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

    function checkCompetencyIndices($id,$level,$type){
        try {
            $this->db->select('*');
            $this->db->from($this->competencyindexTbl);
            $this->db->where('competencyid',$id);
            $this->db->where('level',$level);
            $this->db->where('type',$type);
            $query = $this->db->get();
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


    function checkPositions($name){
        try {
            $this->db->select('*');
            $this->db->from($this->positionTbl);
            $this->db->where('name',$name);
            $this->db->where('status','0');
            $query = $this->db->get();
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

    function checkApplicants($username,$reqnum){
        try {
            $this->db->select('*');
            $this->db->from($this->applicantTbl);
            $this->db->where('username',$username);
            $this->db->where('requestnumber',$reqnum);
            $this->db->where('status','0');
            $query = $this->db->get();
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

    //for strategic objectives
    function checkStrategicObjectives($so){
        try {
            $this->db->select('*');
            $this->db->from($this->soTbl);
            $this->db->where('strategicobjective',$so);
            $query = $this->db->get();
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

    //for PMT lead
    function checkPmtLead($username, $role){
        try {
            $where = array('username' => $username, 'role' => $role, 'status' => 0);
            $this->db->select('*');
            $this->db->from($this->pmtTbl);
            $this->db->where($where);
            $query = $this->db->get();
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


    //for Existing IPCR
    function checkExistingIpcr($username, $period){
        try {
            $where = array('username' => $username, 'period' => $period);
            $this->db->select('*');
            $this->db->from($this->ipcrTbl);
            $this->db->where($where);
            $query = $this->db->get();
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

    //for existing OPCR
    function checkExistingOpcr($username,$period,$department){
        try {
            $where = array('username' => $username, 'period' => $period,'department'=>$department);
            $this->db->select('*');
            $this->db->from($this->opcrTbl);
            $this->db->where($where);
            $query = $this->db->get();
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

     //for Existing IPCR Evaluation
    function checkExistingIpcrEvaluation($username,$period,$employee){
        try {
            $where = array('username' => $employee, 'period' => $period,'evaluator'=>$username, 'type'=>'IPCR');
            $this->db->select('*');
            $this->db->from($this->pmsEvaluationTbl);
            $this->db->where($where);
            $query = $this->db->get();
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

    //for Evaluated OPCR
    function checkOpcrStatus($username,$period,$mfopapids){
        try {
            $query = $this->db->query("select * from tblpmsevaluation where type ='OPCR' and username='".$username."' and period='".$period."' and mfopapid in (".$mfopapids.");");
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

 function checkExistingOpcrEvaluation($opcrid){
        try {
            $query = $this->db->query("select * from tblopcr where status ='100' and opcrid='".$opcrid."'");
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

	//FOR LEARNING AND DEVELOPMENT
    function checkExistingEvents($event,$venue,$start,$end){
        try {
            $where = array('name' => $event, 'venue' => $venue, 'datefrom' => $start, 'dateto' => $end);
            $this->db->select('*');
            $this->db->from($this->eventsTbl);
            $this->db->where($where);
            $query = $this->db->get();
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



}