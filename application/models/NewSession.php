<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

 class NewSession extends CI_Model {
     function __construct() {
         $this->userTbl = 'tblusers';
         $this->userdetailsTbl = 'tbluserdetails';
     }

     function getRows($username){
         try {
             $this->db->query("SET GLOBAL group_concat_max_len=1500000;");
             $query = $this->db->query("select u.*,d.*,p.currentposition from tblusers u inner join tbluserdetails d on u.username=d.username left join tblpdsdetails p on u.username=p.username where u.username='".$username."' and u.status='0'");
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