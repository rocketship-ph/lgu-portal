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

}