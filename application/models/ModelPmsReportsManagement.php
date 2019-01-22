<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPmsReportsManagement extends CI_Model{
    function __construct() {
        $this->soTbl = 'tblso';
        $this->mfopapTbl = 'tblmfopap';
    }

    function getIpcrReport($period,$department,$employee){
        try {

            $statement = "select * from vw_ipcrreport where period='".$period."' and department='".$department."' and username='".$employee."' ";
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


    function getEmployees($period,$department){
        try {

            $statement = "select distinct username,name from vw_ipcrreport where period='".$period."' and department='".$department."'";
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


    function getOpcrReport($period,$department){
        try {

            $statement = "select * from vw_opcrreport where period='".$period."' and department='".$department."'";
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

  function getOpcrAverageRating($opcrid){
        try {

            $statement = "select * from vw_averagerating where opcrid='".$opcrid."'";
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

function getOpcrPmt(){
        try {

            $statement = "select * from tblpmt";
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


}