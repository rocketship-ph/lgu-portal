<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelJobApplicationReport extends CI_Model{
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
        $res = '[{"TIMESTAMP":"2018-02-22 22:48:45","NAME":"Juan Dela Cruz","ADDRESS":"Carmona Cavite","HIGHESTDEGREE":"B.S. Psychology Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Emilio Aquino","ADDRESS":"Calamba, Laguna","HIGHESTDEGREE":"B.S. Psychology Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Marie Claire Santos","ADDRESS":"Carmona Cavite","HIGHESTDEGREE":"B.S. Psychology Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Jhoanna Delos Santos","ADDRESS":"Carmona Cavite","HIGHESTDEGREE":"B.S. Psychology Graduate","POSITIONAPPLIED":"Administrative Aide I"}]';
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
        $res = '[{"TIMESTAMP":"2018-02-22 22:48:45","TOTALAPPLICANTS":"18","MUNICIPALAPPLICANT":"12","OUTSIDEAPPLICANT":"6"}]';
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
        $res = '[{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Rosario Del Pilar","ADDRESS":"Sto. Tomas, Batangas","HIGHESTDEGREE":"Associate in Book Keeping Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Babylyn Aguinaldo","ADDRESS":"Carmona Cavite","HIGHESTDEGREE":"Diploma in Accounting Technology Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Francis Mabini","ADDRESS":"Carmona Cavite","HIGHESTDEGREE":"A.B. Mass Communication Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Earl Ibarra","ADDRESS":"Rosario, Batangas","HIGHESTDEGREE":"B.S. Information Technology Graduate","POSITIONAPPLIED":"Administrative Aide I"}]';
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
        $res = '[{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Rosario Del Pilar","ADDRESS":"Sto. Tomas, Batangas","HIGHESTDEGREE":"Associate in Book Keeping Graduate","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-26 22:48:45","NAME":"Earl Ibarra","ADDRESS":"Rosario, Batangas","HIGHESTDEGREE":"B.S. Information Technology Graduate","POSITIONAPPLIED":"Administrative Aide I"}]';
        return json_decode($res);
    }

    function hasRows5(){
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
        $res = '[{"NAME":"Grace Del Pilar","ADDRESS":"Carmona, Cavite","AVAILABLEPOSITION":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide I"},{"NAME":"Crisostomo Dalida","ADDRESS":"Carmona, Cavite","AVAILABLEPOSITION":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide I"},{"NAME":"Rogelio Francisco","ADDRESS":"Carmona, Cavite","AVAILABLEPOSITION":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide II"},{"NAME":"Maja Salvacion","ADDRESS":"Carmona, Cavite","AVAILABLEPOSITION":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide I"}]';
        return json_decode($res);
    }

    function hasRows6(){
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
        $res = '[{"NAME":"Rogelio Francisco","ADDRESS":"Carmona, Cavite","POSITIONAPPLIED":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide II"},{"NAME":"Maja Salvacion","ADDRESS":"Carmona, Cavite","POSITIONAPPLIED":"Administrative Aide III","CURRENTPOSITION":"Administrative Aide I"}]';
        return json_decode($res);
    }

    function hasRows7(){
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
        $res = '[{"NAME":"Grace Del Pilar","ADDRESS":"Carmona, Cavite","REASON":"Reason for not applying","CURRENTPOSITION":"Administrative Aide I"},{"NAME":"Crisostomo Dalida","ADDRESS":"Carmona, Cavite","REASON":"Reason for not applying","CURRENTPOSITION":"Administrative Aide I"}]';
        return json_decode($res);
    }
}