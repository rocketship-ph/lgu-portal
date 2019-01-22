<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 class NewSession extends CI_Model {
     function __construct() {
         $this->userTbl = 'tblusers';
         $this->userdetailsTbl = 'tbluserdetails';
     }

     function getRows($params = array()){
         try {
             $this->db->select('tblusers.*,tbluserdetails.*');
             $this->db->from($this->userTbl);
             $this->db->join($this->userdetailsTbl, 'tblusers.username = tbluserdetails.username');

             foreach ($params as $key => $value) {
                 $this->db->where($key,$value);
             }
             $query = $this->db->get();
             $result = ($query->num_rows() > 0) ? $query->row_array() : false;

             //return fetched data
             return $result;
         } catch (Exception $e){
             log_message('error', $e);
             return false;
         }
     }


     function getmodules($username,$userlevel){
         try {
             $query = $this->db->query("select distinct moduleid from tbluserconfiguration where username in('".$username."','ALL') and userlevel='".$userlevel."'");

             if($query->num_rows() > 0){
                 $arr = array();
                 foreach ($query->result_array() as $row)
                 {
                     array_push($arr,$row['moduleid']);
                 }
                 log_message('debug', 'module found');
                 return $arr;
             } else {
                 log_message('debug', 'module not found');
                 $arr = array();
                 array_push($arr,0);
                 return $arr;
             }
         } catch(Exception $e){
             log_message('error', $e);
             return false;
         }
     }

     function getRequestnumber($username){
         try {
             $query = $this->db->query("select requestnumber,applicantcode from tblapplicant where username='".$username."'");

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


     function getPmt($username){
         try {
             $query = $this->db->query("select role from tblpmt where username='".$username."'");

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