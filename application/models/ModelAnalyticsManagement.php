<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelAnalyticsManagement extends CI_Model{
    function __construct() {
        $this->personnelrequestTbl = 'tblpersonnelrequest';

    }
    function getReq($requestnumber){
        try {
            $query = $this->db->query("select r.requestnumber,r.experience,r.training,r.eligibility,p.mineducbackground,p.name as positionname from tblpersonnelrequest r inner join tblposition p on r.positioncode=p.positioncode where requestnumber='".$requestnumber."'");

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

    function getrawdata(){
        try {
            $query = $this->db->query("select * from analytics_pds");

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

    function getapplicantprofile($month,$year){
        try {
            $query = $this->db->query("SELECT * FROM csc_applicantsprofile WHERE YEAR(dateapplied) = ".$year." AND MONTH(dateapplied) = ".$month);

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
    function getprofiles(){
        try {
            $query = $this->db->query("SELECT * FROM csc_individualapplicantprofile ORDER BY lastname");

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
    function getcompetencyrequirement(){
        try {
            $query = $this->db->query("SELECT * FROM csc_competencyrequirementperposition ORDER BY csc_competencyrequirementperposition.requestnumber DESC");

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
    function getcbiskills($data){
        try {
            $query = $this->db->query("select title,type,description from tblcompetency where title in (".$data.")");

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