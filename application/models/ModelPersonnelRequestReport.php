<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelPersonnelRequestReport extends CI_Model{
    function __construct() {
        $this->inventoryTbl = 'TBLINVENTORY';
    }

    function hasRows1(){
//        try {
//
//            $statement = "SELECT TR.*,TU.NAME FROM TBLREQUESTS TR INNER JOIN TBLUSERS TU ON TR.USERID = TU.USERID WHERE TR.ISACTIVE=1 AND TR.DEPARTMENTTAG = '".$tag."'";
//            $query = $this->db->query($statement);
//            if($query){
//                $result = $query->result_array();
//                return $result;
//            } else {
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
        $res = '[{"TIMESTAMP":"2018-02-23 22:48:45","DEPARTMENT":"Human Resource","POSITION":"Help Desk 1","STATUS":"APPROVED"},{"TIMESTAMP":"2018-02-20 22:48:45","DEPARTMENT":"Cooperative Section","POSITION":"Office Staff 1","STATUS":"REJECTED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Building and Construction","POSITION":"Admin Aide 1","STATUS":"APPROVED"}]';
        return json_decode($res);
    }

    function hasRows2(){
//        try {
//
//            $statement = "SELECT TR.*,TU.NAME FROM TBLREQUESTS TR INNER JOIN TBLUSERS TU ON TR.USERID = TU.USERID WHERE TR.ISACTIVE=1 AND TR.DEPARTMENTTAG = '".$tag."'";
//            $query = $this->db->query($statement);
//            if($query){
//                $result = $query->result_array();
//                return $result;
//            } else {
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
        $res = '[{"TIMESTAMP":"2018-02-25 22:48:45","DEPARTMENT":"Human Resource","POSITION":"Help Desk 2","STATUS":"APPROVED"},{"TIMESTAMP":"2018-02-24 22:48:45","DEPARTMENT":"Cooperative Section","POSITION":"Office Staff 2","STATUS":"APPROVED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Building and Construction","POSITION":"Admin Aide 1","STATUS":"APPROVED"}]';
        return json_decode($res);
    }

    function hasRows3(){
//        try {
//
//            $statement = "SELECT TR.*,TU.NAME FROM TBLREQUESTS TR INNER JOIN TBLUSERS TU ON TR.USERID = TU.USERID WHERE TR.ISACTIVE=1 AND TR.DEPARTMENTTAG = '".$tag."'";
//            $query = $this->db->query($statement);
//            if($query){
//                $result = $query->result_array();
//                return $result;
//            } else {
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
        $res = '[{"TIMESTAMP":"2018-02-22 22:48:45","DEPARTMENT":"Human Resource","POSITION":"Help Desk 3","REMARKS":"No Budget for New Personnel","STATUS":"REJECTED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Cooperative Section","POSITION":"Office Staff 3","REMARKS":"No Budget for New Personnel","STATUS":"REJECTED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Building and Construction","POSITION":"Admin Aide 2","REMARKS":"No Budget for New Personnel","STATUS":"REJECTED"}]';
        return json_decode($res);
    }

    function hasRows4(){
//        try {
//
//            $statement = "SELECT TR.*,TU.NAME FROM TBLREQUESTS TR INNER JOIN TBLUSERS TU ON TR.USERID = TU.USERID WHERE TR.ISACTIVE=1 AND TR.DEPARTMENTTAG = '".$tag."'";
//            $query = $this->db->query($statement);
//            if($query){
//                $result = $query->result_array();
//                return $result;
//            } else {
//                return false;
//            }
//        } catch(Exception $e){
//            log_message('error', $e);
//            return false;
//        }
        $res = '[{"TIMESTAMP":"2018-02-22 22:48:45","DEPARTMENT":"Human Resource","NAME":"Juana Santos Dela Cruz","DESCRIPTION":"This is a description","POSITION":"Help Desk 3","STATUS":"APPROVED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Cooperative Section","POSITION":"Office Staff 3","NAME":"Juana Santos Dela Cruz","DESCRIPTION":"This is a description","STATUS":"APPROVED"},{"TIMESTAMP":"2018-02-26 22:48:45","DEPARTMENT":"Building and Construction","POSITION":"Admin Aide 2","NAME":"Juana Santos Dela Cruz","DESCRIPTION":"This is a description","STATUS":"REJECTED"}]';
        return json_decode($res);
    }
}