<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModelExamResultReport extends CI_Model{
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
        $res = '[{"TIMESTAMP":"2018-02-23 22:48:45","APPLICANTCODE":"GraDel2018-001","NAME":"Grace Del Pilar","ADDRESS":"Carmona, Cavite","REQUESTNUMBER":"2018-001","POSITION":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","ADDRESS":"Carmona, Cavite","REQUESTNUMBER":"2018-001","POSITION":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"EmiAqu2018-001","NAME":"Emilio Aquino","ADDRESS":"Carmona, Cavite","REQUESTNUMBER":"2018-001","POSITION":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"JuaDel2018-001","NAME":"Juan Dela Cruz","ADDRESS":"Carmona, Cavite","REQUESTNUMBER":"2018-001","POSITION":"Administrative Aide I"}]';
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
        $res = '[{"TIMESTAMP":"2018-02-23 22:48:45","APPLICANTCODE":"GraDel2018-001","NAME":"Grace Del Pilar","GRADE":"93","RANK":"1","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","GRADE":"91.3","RANK":"2","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"EmiAqu2018-001","NAME":"Emilio Aquino","GRADE":"88.9","RANK":"3","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"JuaDel2018-001","NAME":"Juan Dela Cruz","GRADE":"86.36","RANK":"4","POSITIONAPPLIED":"Administrative Aide I"}]';
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
        $res = '[{"TIMESTAMP":"2018-02-23 22:48:45","APPLICANTCODE":"GraDel2018-001","NAME":"Grace Del Pilar","GRADE":"93","RANK":"1","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","GRADE":"91.3","RANK":"2","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"EmiAqu2018-001","NAME":"Emilio Aquino","GRADE":"88.9","RANK":"3","POSITIONAPPLIED":"Administrative Aide I"},{"TIMESTAMP":"2018-02-23 21:48:45","APPLICANTCODE":"JuaDel2018-001","NAME":"Juan Dela Cruz","GRADE":"86.36","RANK":"4","POSITIONAPPLIED":"Administrative Aide I"}]';
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
        $res = '[{"COMPETENCY":"Exemplifying Integrity","PROFICIENCYLEVEL":"Intermediate","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"56"},{"COMPETENCY":"Delivering Service Excellence","PROFICIENCYLEVEL":"Basic","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"61"},{"COMPETENCY":"Solving Problems and Making Decisions","PROFICIENCYLEVEL":"Basic","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"59"},{"COMPETENCY":"Demonstrating Personal Effectiveness","PROFICIENCYLEVEL":"Intermediate","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"66"},{"COMPETENCY":"Speaking Effectively","PROFICIENCYLEVEL":"Basic","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"67"},{"COMPETENCY":"Writing Effectively","PROFICIENCYLEVEL":"Intermediate","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"64"},{"COMPETENCY":"Championing and Applying Innovation","PROFICIENCYLEVEL":"Basic","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"67"},{"COMPETENCY":"Planning and Delivering","PROFICIENCYLEVEL":"Basic","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"72"},{"COMPETENCY":"Managing Information","PROFICIENCYLEVEL":"Intermediate","APPLICANTCODE":"CriDal2018-001","NAME":"Crisostomo Dalida","RATING":"67"}]';
        return json_decode($res);
    }
}